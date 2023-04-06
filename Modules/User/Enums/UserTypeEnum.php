<?php

namespace Modules\User\Enums;

enum UserTypeEnum: string
{
    case TYPE_CUSTOMER = 'customer';
    case TYPE_VENDOR = 'vendor';
}
