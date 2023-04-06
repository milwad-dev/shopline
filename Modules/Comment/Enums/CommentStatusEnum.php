<?php

namespace Modules\Comment\Enums;

enum CommentStatusEnum: string
{
    case STATUS_ACTIVE = 'active';
    case STATUS_NEW = 'new';
    case STATUS_INACTIVE = 'inactive';
}
