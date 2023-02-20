<?php

namespace App\Packages\Domains\CheckSeat;

interface CheckSeatRepositoryInterface
{

    public function findById(CheckSeatId $checkSeatId):array;

    public function save(CheckSeat $checkSeat):void;

    public function delete(CheckSeatId $checkSeatId):void;
}
