<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\UpdateDiaryRequest;
use App\Packages\Usecases\Dto\Diary\DiaryWrapDto;

class UpdateDiaryAction
{
    public function __construct(DiaryRepositoryInterface $diaryRepository)
    {
        $this->diaryRepository = $diaryRepository;
    }

    public function __invoke(
        UpdateDiaryRequest $updateDiaryRequest,
        string                    $DiaryId
    ): DiaryWrapDto
    {
        $requestArray = [
            'diary.content' => $updateDiaryRequest->getDiaryContent(),
        ];

        $diary = $this->diaryRepository->findById(new DiaryId($DiaryId));

        $updateContent = $diary->getDiaryContent()->update($requestArray['diary.content']);

        try {
            $updateDiary = new Diary(
                new DiaryId($DiaryId),
                $updateContent,
                $diary->getComments(),
                $diary->getCreateDate()
            );
            $diaryCollection = new DiaryCollection();
            $this->diaryRepository->save($diaryCollection);
        } catch (Exception $e) {
            throw  $e;
        }
        return DiaryDtoFactory::create($updateDiary);
    }
}
