<?php

namespace App\Packages\Domains\CheckSeat;

interface CheckSeatRepositoryInterface
{
    public function findById(CheckSeatId $checkSeatId);

    public function save(CheckSeat $checkSeat);

    public function delete(CheckSeatId $checkSeatId);
}
