<?php

namespace App\Packages\Domains\Water;

use App\Exceptions\NotFoundException;
use Closure;
use Illuminate\Support\Collection;
use IteratorAggregate;

class WaterSettingCollection
{
    private Collection $waterSettings;
    /**
     * @param MonthsWaterSetting[] $waterSettings
     */
    public function __construct(array $waterSettings = [])
    {
        $this->waterSettings= (new Collection)->collect([]);

        foreach ($waterSettings as $waterSetting) {
            $this->addSetting($waterSetting);
        }
    }

    /**
     * @param MonthsWaterSetting $waterSetting
     * @return void
     */
    public function addSetting(MonthsWaterSetting $waterSetting): void
    {
        $this->waterSettings->put($waterSetting->getWaterSettingId()->getId(), $waterSetting);
    }

    /**
     * @param WaterSettingId $waterSettingId
     * @return MonthsWaterSetting
     * @throws NotFoundException
     */
    public function findById(WaterSettingId $waterSettingId): MonthsWaterSetting
    {
        $waterSetting = $this->waterSettings->get($waterSettingId->getId());

        if (is_null($waterSetting)) {
            throw new NotFoundException('指定した水やり設定IDが見つかりませんでした (id:' . $waterSettingId->getId() . ')');
        }
        if (!$waterSetting->getWaterSettingId()->equals($waterSettingId)) {
            throw new NotFoundException('指定した水やり設定IDが見つかりませんでした (id:' . $waterSettingId->getId() . ')');
        }
        return $waterSetting;
    }

    /**
     * @param int $value
     * @return Closure|null
     */
    public function getValue(int $value): ?Closure
    {
        return $this->waterSettings->get($value);
    }

    /**
     * @param MonthsWaterSetting $waterSetting
     * @return void
     */
    public function delete(MonthsWaterSetting $waterSetting): void
    {
        $this->waterSettings->forget($waterSetting->getWaterSettingId()->getId());
    }

    /**
     * @return WaterSettingCollection
     */
    public function duplicationDisplay(): WaterSettingCollection
    {
        $waterSettings = $this->waterSettings->toArray();
        $duplicationSettings = [];
        foreach ($waterSettings as $waterSetting) {
            if ($this->duplicationMonthCheck($waterSetting)) {
                $duplicationSettings[] = $waterSetting;
            }
        }
        return new self($duplicationSettings);
    }

    /**
     * @param $waterSetting
     * @return bool
     */
    private function duplicationMonthCheck($waterSetting): bool
    {
        $referenceWaterSettings = $this->waterSettings->toArray();
        foreach ($referenceWaterSettings as $referenceWaterSetting) {
            if ($referenceWaterSetting === $waterSetting) {
                continue;
            }
            $sumMonthArray = array_merge($referenceWaterSetting->getMonths(), $waterSetting->getMonths());
            $deleteDuplicationArray = array_unique($sumMonthArray);
            if (count($sumMonthArray) !== count($deleteDuplicationArray)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->waterSettings->toArray();
    }
}
