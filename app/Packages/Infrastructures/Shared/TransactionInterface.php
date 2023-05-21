<?php

namespace App\Packages\infrastructures\Shared;

interface TransactionInterface
{

    public function begin():void;

    public function beginReservation():void;

    public function commit():void;

    public function rollback():void;
}
