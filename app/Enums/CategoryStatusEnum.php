<?php

namespace App\Enums;

enum CategoryStatusEnum: string
{
    case STATUS_ACTIVE = 'active';
    case STATUS_INACTIVE = 'inactive';
    case STATUS_DELETED = 'deleted';
}
