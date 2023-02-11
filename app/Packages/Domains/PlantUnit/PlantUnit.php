<?php

namespace App\Packages\Domains\PlantUnit;

use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
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


}
