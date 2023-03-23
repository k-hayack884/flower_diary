<?php

namespace App\Packages\Domains\Fertilizer;

use App\Exceptions\NotFoundException;
use Closure;
use Illuminate\Support\Collection;
use IteratorAggregate;

class FertilizerSettingCollection
{
    /**
     * @param MonthsFertilizerSetting[] $fertilizerSettings
     */
    public function __construct(array $fertilizerSettings = [])
    {
        $this->fertilizerSettings= (new Collection)->collect([]);
        foreach ($fertilizerSettings as $fertilizerSetting) {
            $this->addSetting($fertilizerSetting);
        }
    }

    /**
     * @param MonthsFertilizerSetting $fertilizerSetting
     * @return void
     */
    public function addSetting(MonthsFertilizerSetting $fertilizerSetting): void
    {
        $this->fertilizerSettings->put($fertilizerSetting->getFertilizerSettingId()->getId(), $fertilizerSetting);
    }

    /**
     * @param FertilizerSettingId $fertilizerSettingId
     * @return MonthsFertilizerSetting
     * @throws NotFoundException
     */
    public function findById(FertilizerSettingId $fertilizerSettingId):MonthsFertilizerSetting
    {
        $fertilizerSetting= $this->fertilizerSettings->get($fertilizerSettingId->getId());
        if (is_null($fertilizerSetting)) {
            throw new NotFoundException('指定した肥料設定IDが見つかりませんでした (id:' . $fertilizerSettingId->getId() . ')');
        }
        if (!$fertilizerSetting->getFertilizerSettingId()->equals($fertilizerSettingId)) {
            throw new NotFoundException('選んだ肥料設定IDが見つかりませんでした (id:' . $fertilizerSettingId->getId() . ')');
        }
        return $fertilizerSetting;
    }

    /**
     * @param int $value
     * @return Closure|null
     */
    public function getValue(int $value): ?Closure
    {
        return $this->fertilizerSettings->get($value);
    }

    /**
     * @param MonthsFertilizerSetting $fertilizerSetting
     * @return void
     */
    public function delete(MonthsFertilizerSetting $fertilizerSetting):void
    {
        $this->fertilizerSettings->forget($fertilizerSetting->getFertilizerSettingId()->getId());
    }

    /**
     * @param $value
     * @return void
     */
    public function push($value): void
    {
        $this->fertilizerSettings->push(["checkSeatId"=>$value]);
    }
    /**
     * @return FertilizerSettingCollection
     */
    public function duplicationDisplay(): FertilizerSettingCollection
    {
        $fertilizerSettings = $this->fertilizerSettings->toArray();
        $duplicationSettings = [];
        foreach ($fertilizerSettings as $fertilizerSetting) {
            if ($this->duplicationMonthCheck($fertilizerSetting)) {
                $duplicationSettings[] = $fertilizerSetting;
            }
        }
        return new self($duplicationSettings);
    }

    /**
     * @param $fertilizerSetting
     * @return bool
     */
    private function duplicationMonthCheck($fertilizerSetting): bool
    {
        $referenceFertilizerSettings = $this->fertilizerSettings->toArray();
        foreach ($referenceFertilizerSettings as $referenceFertilizerSetting) {
            if ($referenceFertilizerSetting === $fertilizerSetting) {
                continue;
            }
            if($referenceFertilizerSetting->getFertilizerName()->getValue()===$fertilizerSetting->getFertilizerName()->getValue()){
                $sumMonthArray = array_merge($referenceFertilizerSetting->getMonths(), $fertilizerSetting->getMonths());
                $deleteDuplicationArray = array_unique($sumMonthArray);
                if (count($sumMonthArray) !== count($deleteDuplicationArray)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->fertilizerSettings->toArray();
    }
}
