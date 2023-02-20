<?php

namespace App\Packages\Domains\PlantUnit;

use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\User\UserId;
use Carbon\Carbon;

class PlantUnit
{
    /**
     * @var PlantUnitId $plantUnitId
     * @var UserId $userId
     * @var PlantId $plantId
     * @var CheckSeatId $checkSeatId
     * @var PlantName $plantName
     * @var DiaryId[] $diaries
     * @var Carbon $createDate
     * @var Carbon $updateDate
     */
    private PlantUnitId $plantUnitId;
    private UserId $userId;
    private PlantId $plantId;
    private CheckSeatId $checkSeatId;
    private PlantName $plantName;
    private array $diaries = [];
    private Carbon $createDate;
    private Carbon $updateDate;

    /**
     * @param PlantUnitId $plantUnitId
     * @param PlantId $plantId
     * @param UserId $userId
     * @param CheckSeatId $checkSeatId
     * @param PlantName $plantName
     * @param array $diaries
     * @param Carbon|null $createDate
     * @param Carbon|null $updateDate
     */
    public function __construct(
        PlantUnitId $plantUnitId,
        PlantId     $plantId,
        UserId      $userId,
        CheckSeatId $checkSeatId,
        PlantName   $plantName,
        array       $diaries,
        Carbon  $createDate=null,
        Carbon  $updateDate=null,
    )
    {
        $this->plantUnitId = $plantUnitId;
        $this->plantId = $plantId;
        $this->userId = $userId;
        $this->checkSeatId = $checkSeatId;
        $this->plantName = $plantName;
        $this->diaries = $diaries;
        if($createDate===null){
            $this->createDate = Carbon::now();;
        }else{
            $this->createDate = $createDate;
        }
        if($updateDate===null){
            $this->updateDate = Carbon::now();;
        }else{
            $this->updateDate = $updateDate;
        }
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
     * @return DiaryId[]
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
