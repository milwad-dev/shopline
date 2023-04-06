<?php

namespace Modules\Article\Enums;

enum ArticleStatusEnum: string
{
    case STATUS_ACTIVE = 'active';
    case STATUS_IN_PROGRESS = 'in progress';
    case STATUS_INACTIVE = 'inactive';
}
