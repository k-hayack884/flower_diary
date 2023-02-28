<?php

namespace App\Packages\infrastructures\Shared;

use Illuminate\Support\Facades\DB;

class Transaction implements TransactionInterface
{

    public function begin(): void
    {
        DB::beginTransaction();
    }

    public function beginReservation(): void
    {
        $pdo=DB::connection()->getPdo();
        $pdo->exec('SET SESSION TRANSACTION LEVEL READ COMMITTED');

        DB::beginTransaction();
    }

    public function commit(): void
    {
        DB::commit();

        $pdo=DB::connection()->getPdo();
        $pdo->exec('SET SESSION TRANSACTION LEVEL READ COMMITTED');

    }

    public function rollback(): void
    {
        DB::rollBack();
        $pdo=DB::connection()->getPdo();
        $pdo->exec('SET SESSION TRANSACTION LEVEL READ COMMITTED');
    }
}
