<?php

namespace App\Packages\Usecases\Diary;

use App\Http\Services\Base64Service;
use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryContent;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryImage;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\CreateDiaryRequest;
use App\Packages\Usecases\Dto\Diary\DiaryDto;
use App\Packages\Usecases\Dto\Diary\DiaryWrapDto;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CreateDiaryAction
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
     * @param CreateDiaryRequest $createDiaryRequest
     * @return DiaryWrapDto
     * @throws Exception
     */
    public function __invoke(
        CreateDiaryRequest $createDiaryRequest
    ): DiaryWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $plantUnitId=$createDiaryRequest->getPlantUnitId();
        $diaryContent = $createDiaryRequest->getDiaryContent();

        try {
            $diaryId = new DiaryId();
            $diaryContent = new DiaryContent($diaryContent);
            $plantImageData = $createDiaryRequest->getPlantImage();
            if($plantImageData!==null){
                $plantImageFileName = Base64Service::base64FileDecode($plantImageData, 'diaryImage');
            }else{
                $plantImageFileName='';
            }

            $plantImage = new DiaryImage($plantImageFileName);
            $diary = new Diary(
                $diaryId,
                $diaryContent,
                $plantImage
            );
            $diaryCollection = new DiaryCollection();
            $diaryCollection->addDiary($diary);
            $this->diaryRepository->save($diaryCollection,$plantUnitId);
            Session::flash('successMessage', '投稿に成功しました');

        } catch (\DomainException $e) {
            Session::flash('failMessage', '投稿に失敗しました');

            Log::error(__METHOD__, ['エラー']);
            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return DiaryDtoFactory::create($diary);
    }
}
