<?php

namespace App\Packages\Domains\Fertilizer;

use App\Exceptions\NotFoundException;

use ArrayIterator;
use Closure;
use DomainException;
use Illuminate\Support\Collection;
use IteratorAggregate;
use ReturnTypeWillChange;

class FertilizerSettingCollection  extends Collection
{
    private Collection $collection;

    public function __construct(array $fertilizerSettings = [])
    {
        $this->collection = new Collection();

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
        $this->put($fertilizerSetting->getFertilizerSettingId()->getId(), $fertilizerSetting);
    }

    /**
     * @param FertilizerSettingId $fertilizerSettingId
     * @return MonthsFertilizerSetting
     * @throws NotFoundException
     */
    public function findById(FertilizerSettingId $fertilizerSettingId):MonthsFertilizerSetting
    {
        $fertilizerSetting= $this->get($fertilizerSettingId->getId());
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
        return $this->collection->get($value);
    }

    /**
     * @param MonthsFertilizerSetting $fertilizerSetting
     * @return void
     */
    public function delete(MonthsFertilizerSetting $fertilizerSetting):void
    {
        $this->forget($fertilizerSetting->getFertilizerSettingId()->getId());
    }

    /**
     * @return FertilizerSettingCollection
     */
    public function duplicationDisplay(): FertilizerSettingCollection
    {
        $fertilizerSettings = $this->toArray();
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
        $referenceFertilizerSettings = $this->toArray();
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
        return parent::toArray();
    }
}
