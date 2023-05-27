<?php

namespace App\Packages\Usecases\Diary;

use App\Http\Services\Base64Service;
use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryContent;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryImage;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\UpdateDiaryRequest;
use App\Packages\Usecases\Dto\Diary\DiaryWrapDto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UpdateDiaryAction
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
     * @param UpdateDiaryRequest $updateDiaryRequest
     * @return DiaryWrapDto
     */
    public function __invoke(
        UpdateDiaryRequest $updateDiaryRequest,
    ): DiaryWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $diaryId = $updateDiaryRequest->getId();
        $plantUnitId=$updateDiaryRequest->getPlantUnitId();
        $plantImageData = $updateDiaryRequest->getPlantImage();
        $createDate=Carbon::create($updateDiaryRequest->getCreateDate());
        if($plantImageData!==null){
            $plantImageFileName = Base64Service::base64FileDecode($plantImageData, 'diaryImage');
        }else{
            $plantImageFileName='';
        }
        $diary = $this->diaryRepository->findById(new DiaryId($diaryId));
        $updateContent = $diary->getDiaryContent()->update($updateDiaryRequest->getDiaryContent());
        $plantImage = new DiaryImage($plantImageFileName);
        try {
            $updateDiary = new Diary(
                $diary->getDiaryId(),
                $updateContent,
                $plantImage,
                $diary->getComments(),
                $createDate,
            );
            $diaryCollection = new DiaryCollection();
            $diaryCollection->addDiary($updateDiary);
            $this->diaryRepository->save($diaryCollection,$plantUnitId);
            Session::flash('successMessage', '編集に成功しました');

        } catch (\DomainException $e) {
            Session::flash('failMessage', '編集に失敗しました');
            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return DiaryDtoFactory::create($updateDiary);
    }
}
