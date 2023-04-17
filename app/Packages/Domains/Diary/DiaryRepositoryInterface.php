<?php

namespace App\Packages\Domains\Diary;

use App\Packages\Domains\PlantUnit\PlantUnitId;

interface DiaryRepositoryInterface
{
    public function find():array;
    public function findByPlantUnitId(PlantUnitId $plantUnitId):array;
    public function findById(DiaryId $diaryId):Diary;

    public function save(DiaryCollection $diary,string $plantUnitId):void;

    public function delete(DiaryId $diaryId):void;
}
