<?php

declare(strict_types=1);

namespace Libs\CommandBus;

use Illuminate\Database\DatabaseManager;
use Modules\Shared\Bus\CommandBusContract;
use Modules\Shared\Bus\CommandContract;
use Throwable;

final readonly class TransactionCommandBus
{
    public function __construct(
        protected CommandBusContract $bus,
        protected DatabaseManager $database,
    ) {
    }

    /**
     * @throws Throwable
     */
    public function dispatch(CommandContract $command, int $attempts = 2): mixed
    {
        return $this->database->transaction(
            callback: fn() => $this->bus->dispatch($command),
            attempts: $attempts,
        );
    }

    public function register(array $map): void
    {
        $this->bus->register($map);
    }
}