<?php

namespace App\Packages\Infrastructures\Shared;

use Illuminate\Support\Facades\DB;

class Transaction implements TransactionInterface
{
    /**
     * @return void
     */
    public function begin(): void
    {
        DB::beginTransaction();
    }

    /**
     * @return void
     */
    public function beginReservation(): void
    {
        $pdo=DB::connection()->getPdo();
        $pdo->exec('SET SESSION TRANSACTION LEVEL READ COMMITTED');

        DB::beginTransaction();
    }

    /**
     * @return void
     */
    public function commit(): void
    {
        DB::commit();

//        $pdo=DB::connection()->getPdo();
//        dd($pdo);
//        $pdo->exec('SET SESSION TRANSACTION LEVEL READ COMMITTED');

    }

    /**
     * @return void
     */
    public function rollback(): void
    {
        DB::rollBack();
        $pdo=DB::connection()->getPdo();
        $pdo->exec('SET SESSION TRANSACTION LEVEL READ COMMITTED');
    }
}
