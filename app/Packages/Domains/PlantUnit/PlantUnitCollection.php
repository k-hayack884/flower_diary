<?php

namespace App\Packages\Domains\PlantUnit;

use App\Exceptions\NotFoundException;
use Illuminate\Support\Collection;

class PlantUnitCollection
{
    /**
     * @param PlantUnit[] $plantUnits
     */
    public function __construct(array $plantUnits = [])
    {
        $this->plantUnits=(new Collection)->collect([]);
        foreach ($plantUnits as $plantUnit) {
            $this->addUnit($plantUnit);
        }
        $this->sortUpDate();
    }

    /**
     * @param PlantUnit $plantUnit
     * @return void
     */
    public function addUnit(PlantUnit $plantUnit): void
    {
        $this->plantUnits->put($plantUnit->getPlantUnitId()->getId(), $plantUnit);
        $this->sortUpDate();
    }

    public function sortUpDate(): void
    {
        $sorted=$this->plantUnits->sortByDesc(function ($product, $key) {
            return $product->getUpdateDate();
        });
        $this->plantUnits=$sorted;
    }
    /**
     * @param PlantUnitId $plantUnitId
     * @return PlantUnit
     */
    public function findById(PlantUnitId $plantUnitId): PlantUnit
    {
        $plantUnit = $this->plantUnits->get($plantUnitId->getId());
        if (is_null($plantUnit)) {
            throw new NotFoundException('指定した植物ユニットIDが見つかりませんでした (id:' . $plantUnit->getId() . ')');
        }
        if (!$plantUnit->getPlantUnitSettingId()->equals($plantUnitId)) {
            throw new NotFoundException('指定した植物ユニットIDが見つかりませんでした (id:' . $plantUnit->getId() . ')');
        }
        return $plantUnit;
    }

    /**
     * @param int $value
     * @return Closure|null
     */
    public function getValue(int $value): ?Closure
    {
        return $this->plantUnits->get($value);
    }

    /**
     * @param PlantUnit $plantUnit
     * @return void
     */
    public function delete(PlantUnit $plantUnit): void
    {
        $this->plantUnits->forget($plantUnit->getPlantUnitSettingId()->getId());
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->plantUnits->toArray();
    }
}
