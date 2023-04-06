<?php

namespace Modules\Advertising\Enums;

enum AdvertisingLocationEnum: string
{
    case LOCATION_SLIDER = 'slider';
    case LOCATION_BANNER = 'banner';
    case LOCATION_PRODUCT_PAGE = 'product page';
    case LOCATION_PRODUCT_DETAIL = 'product detail';
    case LOCATION_BLOG_PAGE = 'blog page';
}
