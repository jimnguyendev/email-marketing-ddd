<?php

declare(strict_types=1);

namespace Modules\Shared\Bus;

interface CommandHandlerContract
{
    public function handle(CommandContract $command): mixed;
}