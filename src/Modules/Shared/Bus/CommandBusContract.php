<?php

declare(strict_types=1);

namespace Modules\Shared\Bus;

interface CommandBusContract
{
    public function dispatch(CommandContract $command): mixed;

    /**
     * @param array<class-string<CommandContract>,class-string<CommandHandlerContract>> $map
     * @return void
     */
    public function register(array $map): void;
}