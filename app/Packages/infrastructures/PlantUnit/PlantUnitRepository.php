<?php

namespace App\Packages\infrastructures\PlantUnit;

use App\Exceptions\NotFoundException;
use App\Models\Diary;
use App\Models\Plant;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitImage;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use Carbon\Carbon;

class PlantUnitRepository implements PlantUnitRepositoryInterface
{

    public function find(): array
    {
        $plantUnits = [];
        $allPlantUnits = \App\Models\PlantUnit::all();
        foreach ($allPlantUnits as $plantUnit) {
            $diaries = \App\Models\Diary::where('plant_unit_id', $plantUnit->plant_unit_id)->get();
            $diaryIds = [];
            foreach ($diaries as $diary) {
                $diaryIds[] = $diary->diary_id;
            }
            $plantUnits[] = new PlantUnit(
                new PlantUnitId($plantUnit->plant_unit_id),
                new PlantId($plantUnit->plant_id),
                new UserId($plantUnit->user_Id),
                new CheckSeatId($plantUnit->check_seat_id),
                new plantName($plantUnit->plant_name),
                new PlantUnitImage($plantUnit->plant_image),
                $diaryIds,
                new Carbon($plantUnit->create_date),
                new Carbon($plantUnit->update_date),
            );

        }
        return $plantUnits;
    }
    public function findById(PlantUnitId $plantUnitId): PlantUnit
    {
        $diaryIds = [];
        $plantUnit = \App\Models\PlantUnit::where('plant_unit_id', $plantUnitId->getId())->first();
        if ($plantUnit === null) {
            throw new NotFoundException('指定した植物ユニットIDを見つけることができませんでした');
        }
        $diaries = \App\Models\Diary::where('plant_unit_id', $plantUnitId->getId())->get();
        foreach ($diaries as $diary) {
            $diaryIds[] = $diary->diary_id;
        }

        return new PlantUnit(
            new PlantUnitId($plantUnit->plant_unit_id),
            new PlantId($plantUnit->plant_id),
            new UserId($plantUnit->user_id),
            new CheckSeatId($plantUnit->check_seat_id),
            new plantName($plantUnit->plant_name),
            new PlantUnitImage($plantUnit->plant_image),
            $diaryIds,
            new Carbon($plantUnit->create_date),
            new Carbon($plantUnit->update_date),
        );
    }

    public function findByUser(UserId $userId): array
    {
        $plantUnits = [];
        $allPlantUnits = \App\Models\PlantUnit::where('user_id', $userId->getId())->get();
        foreach ($allPlantUnits as $plantUnit) {
            $diaries = \App\Models\Diary::where('plant_unit_id', $plantUnit->plant_unit_id)->get();
            $diaryIds = [];
            foreach ($diaries as $diary) {
                $diaryIds[] = $diary->diary_id;
            }
            $plantUnits[] = new PlantUnit(
                new PlantUnitId($plantUnit->plant_unit_id),
                new PlantId($plantUnit->plant_id),
                new UserId($plantUnit->user_Id),
                new CheckSeatId($plantUnit->check_seat_id),
                new plantName($plantUnit->plant_name),
                new PlantUnitImage($plantUnit->plant_image),
                $diaryIds,
                new Carbon($plantUnit->create_date),
                new Carbon($plantUnit->update_date),
            );

        }
        return $plantUnits;

    }

    public function save(PlantUnitCollection $plantUnit): void
    {
        $collectionArray = $plantUnit->toArray();


        foreach ($collectionArray as $plant) {
            \App\Models\PlantUnit::create([
                'plant_unit_id' => $plant->getPlantUnitId()->getId(),
                'user_id' => $plant->getUserId()->getId(),
                'plant_id' => $plant->getPlantId()->getId(),
                'check_seat_id' => $plant->getCheckSeatId()->getId(),
                'plant_name' => $plant->getPlantName()->getValue(),
                'plant_image'=>$plant->getPlantImage()->getValue(),
                'create_date' => $plant->getCreateDate()->format('Y/m/d'),
                'update_date' => $plant->getUpdateDate()->format('Y/m/d'),
            ]);
        }
    }

    public function delete(PlantUnitId $plantUnitId): void
    {
        $plantUnit = \App\Models\Diary::where('plant_unit_id', $plantUnitId->getId())->first();

        if ($plantUnit === null) {
            throw new NotFoundException('指定した植物ユニットIDを見つけることができませんでした');
        }
        $plantUnit->delete();    }
}
