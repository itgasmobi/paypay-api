<?php

namespace Itgasmobi\PaypalApi\Config;

class RouteApi
{
    public const AUTH_ROUTE = 'v1/oauth2/token';

    public const TRANSACTION_ROUTE = 'v1/reporting/transactions';

    public const ORDER_ROUTE = 'v2/payments/payment?start_index=0&sort_by=create_time&sort_order=desc';
}
