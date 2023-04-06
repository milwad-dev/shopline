<?php

namespace Modules\Product\Enums;

enum ProductStatusEnum: string
{
    case STATUS_ACTIVE = 'active';
    case STATUS_IN_PROGRESS = 'in progress';
    case STATUS_INACTIVE = 'inactive';
}
