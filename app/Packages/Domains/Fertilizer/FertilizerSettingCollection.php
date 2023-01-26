<?php

namespace App\Packages\Domains\Fertilizer;

use App\Exceptions\NotFoundException;

use ArrayIterator;
use Closure;
use DomainException;
use Illuminate\Support\Collection;
use IteratorAggregate;
use ReturnTypeWillChange;

class FertilizerSettingCollection implements IteratorAggregate
{
    private Collection $collection;

    public function __construct(array $fertilizerSettings = [])
    {
        $this->collection = new Collection();

        foreach ($fertilizerSettings as $fertilizerSetting) {
            $this->add($fertilizerSetting);
        }

    }

    /**
     * @param MonthsFertilizerSetting $fertilizerSetting
     * @return void
     */
    public function add(MonthsFertilizerSetting $fertilizerSetting)
    {
        $this->collection->put($fertilizerSetting->getFertilizerSettingId()->getId(), $fertilizerSetting);
    }

    /**
     * @param FertilizerSettingId $fertilizerSettingId
     * @return Closure
     * @throws NotFoundException
     */
    public function findById(FertilizerSettingId $fertilizerSettingId)
    {
        $fertilizerSetting= $this->collection->get($fertilizerSettingId->getId());
        if (is_null($fertilizerSetting)) {
            throw new NotFoundException('指定した肥料設定IDが見つかりませんでした (id:' . $fertilizerSettingId->getId() . ')');
        }
        return $fertilizerSetting;
    }

    /**
     * @param MonthsFertilizerSetting $fertilizerSetting
     * @return void
     */
    public function delete(MonthsFertilizerSetting $fertilizerSetting):void
    {
        $this->collection->forget($fertilizerSetting->getFertilizerSettingId()->getId());
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
