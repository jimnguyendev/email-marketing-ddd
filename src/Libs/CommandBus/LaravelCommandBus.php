<?php

declare(strict_types=1);

namespace Libs\CommandBus;

use Illuminate\Bus\Dispatcher;
use Modules\Shared\Bus\CommandBusContract;
use Modules\Shared\Bus\CommandContract;

/**
 * Example usage:
 * $command = new RegisterUser($request->username, $request->password);
 * $this->bus->register([RegisterUser::class => RegisterUserHandler::class]);
 * $this->bus->dispatch($command);
 */
final readonly class LaravelCommandBus implements CommandBusContract
{
    public function __construct(
        private Dispatcher $bus
    ) {
    }

    public function dispatch(CommandContract $command): mixed
    {
        return $this->bus->dispatch($command);
    }

    public function register(array $map): void
    {
        $this->bus->map($map);
    }
}