<?php

namespace App\Packages\Usecases\Diary;

use App\Http\Services\Base64Service;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Presentations\Requests\Diary\GetDiariesRequest;
use App\Packages\Usecases\Dto\Diary\DiariesWrapDto;
use App\Packages\Usecases\Dto\Diary\DiaryDto;
use Illuminate\Support\Facades\Log;

class GetDiariesAction
{
    /**
     * @var DiaryRepositoryInterface
     */
    private DiaryRepositoryInterface $diaryRepository;

    /**
     * @param DiaryRepositoryInterface $diaryRepository
     */
    public function __construct(DiaryRepositoryInterface $diaryRepository)
    {
        $this->diaryRepository = $diaryRepository;
    }

    /**
     * @param GetDiariesRequest $getDiaryRequest
     * @return DiariesWrapDto
     */
    public function __invoke(GetDiariesRequest $getDiaryRequest
    ): DiariesWrapDto
    {
        Log::info(__METHOD__, ['開始']);
        $plantUnitId = new PlantUnitId($getDiaryRequest->getPlantUnitId());
        $diaries = $this->diaryRepository->findByPlantUnitId($plantUnitId);

        $diaryCollection = new DiaryCollection($diaries);

        $diaryDtos = [];

        foreach ($diaryCollection->toArray() as $diary) {
            $diaryImageData= $diary->getDiaryImage()->getValue();
            $diaryImage=Base64Service::base64FileEncode($diaryImageData,'diaryImage');
            $diaryDtos[] =
                new DiaryDto(
                    $diary->getDiaryId()->getId(),
                    $diary->getDiaryContent()->getValue(),
                    $diaryImage,
                    $diary->getcomments(),
                    $diary->getCreateDate()->format('Y/m/d'),
                );
        }
        Log::info(__METHOD__, ['終了']);

        return new DiariesWrapDto($diaryDtos);
    }
}
