<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitWrapDto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class GetPlantUnitAction
{
    /**
     * @var PlantUnitRepositoryInterface
     */
    private PlantUnitRepositoryInterface $plantUnitRepository;
    private DiaryRepositoryInterface $diaryRepository;

    /**
     * @param PlantUnitRepositoryInterface $plantUnitRepository
     * @param DiaryRepositoryInterface $diaryRepository
     */
    public function __construct(PlantUnitRepositoryInterface $plantUnitRepository,DiaryRepositoryInterface $diaryRepository)
    {
        $this->plantUnitRepository = $plantUnitRepository;
        $this->diaryRepository=$diaryRepository;
    }

    /**
     * @param GetPlantUnitRequest $getPlantUnitRequest
     * @return PlantUnitWrapDto
     */
    public function __invoke(
        GetPlantUnitRequest $getPlantUnitRequest,
    ): PlantUnitWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $plantUnitId = $getPlantUnitRequest->getId();
        $hitPlantUnit = $this->plantUnitRepository->findById(new PlantUnitId($plantUnitId));

        $diaries = $this->diaryRepository->find();
        $diaryCollection = new DiaryCollection($diaries);
        $newDate = $diaryCollection->getFirstDate();
        $hitPlantUnit->getNewDate(new Carbon($newDate));

        Log::info(__METHOD__, ['終了']);

        return PlantUnitDtoFactory::create($hitPlantUnit);
    }
}
