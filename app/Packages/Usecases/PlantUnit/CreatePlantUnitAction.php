<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\Presentations\Requests\PlantUnit\CreatePlantUnitRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitWrapDto;
use Exception;
use Illuminate\Support\Facades\Log;

class CreatePlantUnitAction
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
     * @param CreatePlantUnitRequest $createPlantUnitRequest
     * @return PlantUnitWrapDto
     * @throws Exception
     */
    public function __invoke(
        CreatePlantUnitRequest $createPlantUnitRequest
    ): PlantUnitWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        try {
            $plantUnitId = new PlantUnitId();
            $plantId = new PlantId($createPlantUnitRequest->getPlantUnitPlantId());
            $userId = new UserId($createPlantUnitRequest->getPlantUnitUserId());
            $plantUnitCheckSeatId = new CheckSeatId();
            //Todo PlantRepositoryを作ったら植物ユニットIDから名前を取得するように改良
            $plantName = new PlantName('');
            $plantDiaries = [];

            $plantUnit = new PlantUnit(
                $plantUnitId,
                $plantId,
                $userId,
                $plantUnitCheckSeatId,
                $plantName,
                $plantDiaries
            );
            $plantUnitCollection = new PlantUnitCollection();
            $this->plantUnitRepository->save($plantUnitCollection);
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(400, $e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return PlantUnitDtoFactory::create($plantUnit);
    }
}
