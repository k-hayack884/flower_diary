<?php

namespace App\Packages\infrastructures\CheckSeat;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingId;

class MockCheckSeatRepository
{
    private array $checkSeats = [];

    public function __construct()
    {
        $waterSettingCollection =
            new WaterSettingCollection(
                [
                    new MonthsWaterSetting(
                        new WaterSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                        [1, 3, 5],
                        new WaterNote('水やりは慎重に'),
                        new WaterAmount('a_lot'),
                        new WateringTimes(1),
                        new WateringInterval(2),
                        ['09:00', '23:30']
                    ),
                    new MonthsWaterSetting(
                        new WaterSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                        [1, 3, 5],
                        new WaterNote('なんでや！阪神関係ないやろ！'),
                        new WaterAmount('sparingly'),
                        new WateringTimes(3),
                        new WateringInterval(34),
                        ['12:59', '3:34']
                    )
                ]
            );
        $fertilizerSettingCollection =
            new FertilizerSettingCollection(
                [
                    new MonthsFertilizerSetting(
                        new FertilizerSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                        [1, 3, 5],
                        new FertilizerNote('株からある程度離して'),
                        new FertilizerAmount(100),
                        new fertilizerName('牛糞堆肥'),
                    ),
                    new MonthsFertilizerSetting(
                        new FertilizerSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                        [1, 3, 5],
                        new FertilizerNote('なんでや！阪神関係ないやろ！'),
                        new FertilizerAmount(334),
                        new FertilizerName('腐葉土'),
                    )
                ]
            );
        $this->checkSeats[] =
            new CheckSeat(
                new CheckSeatId('777c1092-7a0d-40b0-af6e-30bff5975e31'),
                $waterSettingCollection,
                $fertilizerSettingCollection
            );
    }

    /**
     * @return array
     */

    public function find(): array
    {
        return $this->checkSeats;
    }

    /**
     * @param CheckSeatId $checkSeatId
     * @return CheckSeat
     * @throws NotFoundException
     */
    public function findById(CheckSeatId $checkSeatId): CheckSeat
    {

        foreach ($this->checkSeats as $checkSeat) {
            if ($checkSeat->getCheckSeatId()->equals($checkSeatId)) {
                return $checkSeat;
            }
        }
        throw new NotFoundException('指定したチェックシートは見つかりませんでした (id:' . $checkSeatId->getId() . ')');
    }

    /**
     * @param CheckSeat $checkSeat
     * @return void
     */
    public function save(CheckSeat $checkSeat): void
    {
        $this->checkSeats[] = $checkSeat;
    }

    /**
     * @param CheckSeatId $checkSeatId
     * @return void
     * @throws NotFoundException
     */
    public function delete(CheckSeatId $checkSeatId): void
    {
        $deleteCheckSeat = $this->findById($checkSeatId);
        $index = array_search($deleteCheckSeat, $this->checkSeats);
        unset($this->checkSeats[$index]);

    }
}
