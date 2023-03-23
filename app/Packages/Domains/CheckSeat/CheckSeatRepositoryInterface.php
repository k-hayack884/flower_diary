<?php

namespace App\Packages\Domains\CheckSeat;

interface CheckSeatRepositoryInterface
{
    public function find():array;

    public function findById(CheckSeatId $checkSeatId):CheckSeat;

    public function save(CheckSeat $checkSeat):void;

    public function delete(CheckSeatId $checkSeatId):void;
}
