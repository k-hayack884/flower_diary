<?php

namespace App\Packages\infrastructures\Shared;

class MockTransaction implements TransactionInterface
{

    public function begin(): void
    {
        // TODO: Implement begin() method.
    }

    public function beginReservation(): void
    {
        // TODO: Implement beginReservation() method.
    }

    public function commit(): void
    {
        // TODO: Implement commit() method.
    }

    public function rollback(): void
    {
        // TODO: Implement rollback() method.
    }
}
