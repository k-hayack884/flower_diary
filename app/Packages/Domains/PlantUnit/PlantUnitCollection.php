<?php

namespace App\Packages\Domains\PlantUnit;

use Illuminate\Database\Eloquent\Collection;

class PlantUnitCollection extends Collection
{
    /**
     * @param array $plantUnits
     */
    public function __construct(array $plantUnits = [])
    {
        foreach ($plantUnits as $plantUnit) {
            $this->addUnit($plantUnit);
        }

    }

    /**
     * @param PlantUnit $plantUnit
     * @return void
     */
    public function addUnit(PlantUnit $plantUnit): void
    {
        $this->put($plantUnit->getPlantUnitId()->getId(), $plantUnit);
    }

    /**
     * @param PlantUnitId $plantUnitId
     * @return PlantUnit
     */
    public function findById(PlantUnitId $plantUnitId): PlantUnit
    {
        $plantUnit = $this->get($plantUnitId->getId());

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
        return $this->get($value);
    }

    /**
     * @param PlantUnit $plantUnit
     * @return void
     */
    public function delete(PlantUnit $plantUnit): void
    {
        $this->forget($plantUnit->getPlantUnitSettingId()->getId());
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
