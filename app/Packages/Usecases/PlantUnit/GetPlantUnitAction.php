<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\infrastructures\Diary\MockDiaryRepository;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitDto;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitWrapDto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class GetPlantUnitAction
{
    /**
     * @var PlantUnitRepositoryInterface
     */
    private PlantUnitRepositoryInterface $plantUnitRepository;

    /**
     * @param PlantUnitRepositoryInterface $plantUnitRepository
     */
    public function __construct(PlantUnitRepositoryInterface $plantUnitRepository)
    {
        $this->plantUnitRepository = $plantUnitRepository;
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
        $repository = new MockDiaryRepository();
        $diaries = $repository->find();
        $diaryCollection = new DiaryCollection($diaries);
        $newDate = $diaryCollection->getFirstDate();
        $hitPlantUnit->getNewDate(new Carbon($newDate));


        Log::info(__METHOD__, ['終了']);

        return PlantUnitDtoFactory::create($hitPlantUnit);
    }
}
