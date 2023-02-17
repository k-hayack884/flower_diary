<?php

namespace App\Packages\Domains\PlantUnit;

use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\User\UserId;
use Carbon\Carbon;

class PlantUnit
{
    private PlantUnitId $plantUnitId;
    private UserId $userId;
    private PlantId $plantId;
    private CheckSeatId $checkSeatId;
    private PlantName $plantName;
    private array $diaries = [];
    private Carbon $createDate;
    private Carbon $updateDate;

    public function __construct(
        PlantUnitId $plantUnitId,
        PlantId     $plantId,
        UserId      $userId,
        CheckSeatId $checkSeatId,
        PlantName   $plantName,
        array       $diaries
    )
    {
        $this->plantUnitId = $plantUnitId;
        $this->plantId = $plantId;
        $this->userId = $userId;
        $this->checkSeatId = $checkSeatId;
        $this->plantName = $plantName;
        $this->diaries = $diaries;
        $this->createDate=Carbon::now();
        $this->updateDate=Carbon::now();
    }

    /**
     * @return PlantUnitId
     */
    public function getPlantUnitId(): PlantUnitId
    {
        return $this->plantUnitId;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->userId;
    }
    /**
     * @return PlantId
     */
    public function getPlantId(): PlantId
    {
        return $this->plantId;
    }

    /**
     * @return CheckSeatId
     */
    public function getCheckSeatId(): CheckSeatId
    {
        return $this->checkSeatId;
    }

    /**
     * @return PlantName
     */
    public function getPlantName(): PlantName
    {
        return $this->plantName;
    }

    /**
     * @return array
     */
    public function getDiaries(): array
    {
        return $this->diaries;
    }

    /**
     * @return Carbon
     */
    public function getCreateDate(): Carbon
    {
        return $this->createDate;
    }

    /**
     * @return Carbon
     */
    public function getUpdateDate(): Carbon
    {
        return $this->updateDate;
    }
}
