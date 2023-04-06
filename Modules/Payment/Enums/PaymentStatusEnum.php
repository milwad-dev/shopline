<?php

namespace Modules\Payment\Enums;

enum PaymentStatusEnum: string
{
    case STATUS_PENDING = 'pending';
    case STATUS_SUCCESS = 'success';
    case STATUS_CANCELED = 'canceled';
    case STATUS_FAIL = 'fail';
}
