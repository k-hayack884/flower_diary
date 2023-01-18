<?php

namespace App\Packages\Domains\Water;

use ArrayIterator;
use DomainException;
use Illuminate\Support\Collection;
use IteratorAggregate;
use ReturnTypeWillChange;

class WaterSettingCollection implements IteratorAggregate
{
    private Collection $collection;

    public function __construct(array $waterSettings = [])
    {
        $this->collection = new Collection();

        foreach ($waterSettings as $waterSetting) {
            $this->add($waterSetting);
        }

    }

    public function add(TarmWaterSetting $waterSetting)
    {
        if($this->collection->has($waterSetting->getWaterSettingId())){
            throw new DomainException('waterSettingIDが重複しています');
        }
        $this->collection->put($waterSetting->getWaterSettingId(), $waterSetting);
    }

    public function find(WaterSettingID $waterSettingId)
    {
        $waterSetting = $this->collection->get($waterSettingId->getId());
        if (is_null($waterSetting)) {
            throw new NotFoundException('選んだ設定が見つかりませんでした (id:' . $waterSettingId->getId() . ')');
        }
    }

    public function delete(WaterSettingID $waterSettingId)
    {
        $this->collection->forget($waterSettingId->getId());
    }

    public function toArray(): array
    {
        return $this->collection->toArray();
    }

    #[ReturnTypeWillChange] public function getIterator()
    {
        return new ArrayIterator($this->toArray());
    }

}
