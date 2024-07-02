<?php

namespace Domain\Shared\Enums;

enum SequenceMailStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
}
