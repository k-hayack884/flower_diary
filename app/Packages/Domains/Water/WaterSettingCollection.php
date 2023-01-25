<?php

namespace App\Packages\Domains\Water;

use App\Exceptions\NotFoundException;
use ArrayIterator;
use Closure;
use DomainException;
use Illuminate\Support\Collection;
use IteratorAggregate;
use ReturnTypeWillChange;

class WaterSettingCollection implements IteratorAggregate
{
    private Collection $collection;

    /**
     * @param array $waterSettings
     */
    public function __construct(array $waterSettings = [])
    {
        $this->collection = new Collection();

        foreach ($waterSettings as $waterSetting) {
            $this->add($waterSetting);
        }

    }

    /**
     * @param TarmWaterSetting $waterSetting
     * @return void
     */
    public function add(TarmWaterSetting $waterSetting)
    {
        $this->collection->put($waterSetting->getWaterSettingId()->getId(), $waterSetting);
    }

    /**
     * @param WaterSettingID $waterSettingId
     * @return Closure
     * @throws NotFoundException
     */
    public function find(WaterSettingID $waterSettingId)
    {
        $waterSetting = $this->collection->get($waterSettingId->getId());
        if (is_null($waterSetting)) {
            throw new NotFoundException('選んだ設定が見つかりませんでした (id:' . $waterSettingId->getId() . ')');
        }
        return $waterSetting;
    }

    /**
     * @param TarmWaterSetting $waterSetting
     * @return void
     */
    public function delete(TarmWaterSetting $waterSetting):void
    {
        $this->collection->forget($waterSetting->getWaterSettingId()->getId());
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->collection->toArray();
    }

    /**
     * @return ArrayIterator
     */
    #[ReturnTypeWillChange] public function getIterator()
    {
        return new ArrayIterator($this->toArray());
    }

}
