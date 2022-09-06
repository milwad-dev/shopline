<?php

namespace Modules\Product\Enums;

enum ProductRateEnum:int
{
    case RATE_VERY_LOW = 1;
    case RATE_LOW = 2;
    case RATE_NORMAL = 3;
    case RATE_GOOD = 4;
    case RATE_VERY_GOOD = 5;
}
