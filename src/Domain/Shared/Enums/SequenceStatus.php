<?php

namespace Domain\Shared\Enums;

enum SequenceStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
}
