<?php

namespace App\Packages\infrastructures\CheckSeat;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface;

class MockCheckSeatRepository implements CheckSeatRepositoryInterface
{
    private array $checkSeats = [];

    public function __construct()
    {
        $waterSettingIdsA = ['558c1092-7a0d-40b0-af6e-30bff5975e31', '123c1092-7a0d-40b0-af6e-30bff5975e31', '721c1092-7a0d-40b0-af6e-30bff5975e31'];
        $fertilizerSettingIdsA = ['114c1092-7a0d-40b0-af6e-30bff5975e31', '893c1092-7a0d-40b0-af6e-30bff5975e31', '334c1092-7a0d-40b0-af6e-30bff5975e31'];
        $checkSeatIdA = '777c1092-7a0d-40b0-af6e-30bff5975e31';
        $checkSeatA = ['check_seat_id' => $checkSeatIdA, 'water_ids' => $waterSettingIdsA, 'fertilizer_ids' => $fertilizerSettingIdsA];

        $waterSettingIdsB = ['456c1092-7a0d-40b0-af6e-30bff5975e31', '555c1092-7a0d-40b0-af6e-30bff5975e31', '421c1092-7a0d-40b0-af6e-30bff5975e31'];
        $fertilizerSettingIdsB = ['765c1092-7a0d-40b0-af6e-30bff5975e31', '346c1092-7a0d-40b0-af6e-30bff5975e31', '283c1092-7a0d-40b0-af6e-30bff5975e31'];
        $checkSeatIdB = '111c1092-7a0d-40b0-af6e-30bff5975e31';
        $checkSeatB = ['check_seat_id' => $checkSeatIdB, 'water_ids' => $waterSettingIdsB, 'fertilizer_ids' => $fertilizerSettingIdsB];

        $this->checkSeats[] = $checkSeatA;
        $this->checkSeats[] = $checkSeatB;

    }

    /**
     * @return array
     */

    public function find(): array
    {
        return $this->checkSeats;
    }

    /**
     * @param CheckSeat $checkSeat
     * @return void
     */
    public function save(CheckSeat $checkSeat): void
    {
        $checkSeatId = $checkSeat->getCheckSeatId()->getId();
        $waterArrayIds = $checkSeat->getWaterSettingIds();
        $fertilizerIds = $checkSeat->getFertilizerSettingIds();
        $checkSeat = ['check_seat_id' => $checkSeatId, 'water_ids' => $waterArrayIds, 'fertilizer_ids' => $fertilizerIds];

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

    /**
     * @param CheckSeatId $checkSeatId
     * @return CheckSeat
     * @throws NotFoundException
     */
    public function findById(CheckSeatId $checkSeatId): array
    {

        foreach ($this->checkSeats as $index => $checkSeat) {
            if ($checkSeat['check_seat_id'] === $checkSeatId->getId()) {
                return $this->checkSeats[$index];
            }
        }
        throw new NotFoundException('指定したチェックシートは見つかりませんでした (id:' . $checkSeatId->getId() . ')');
    }
}
