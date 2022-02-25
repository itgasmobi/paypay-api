<?php

namespace Itgasmobi\PaypalApi\Models\Objects;

use Carbon\Carbon;
use Itgasmobi\PaypalApi\Config\RouteApi;
use Itgasmobi\PaypalApi\Models\PaypalApi;

use Itgasmobi\PaypalApi\Results\Transaction\TransactionsResult;
use Itgasmobi\PaypalApi\Util\Curl;

class Transaction extends PaypalApi
{
    /**
     * @return void
     */
    public function get(string $startDate, string $endDate, string $fields = 'all', int $pageSize = 250, $page = 1)
    {
       $startDate = Carbon::parse($startDate)->format('Y-m-d\TH:i:s\Z');
       $endDate = Carbon::parse($endDate)->setHours(23)->setMinutes(59)->setSeconds(59)->format('Y-m-d\TH:i:s\Z');

        $route = $this->generateRoute(RouteApi::TRANSACTION_ROUTE,[
            'start_date' => $startDate,
            'end_date' => $endDate,
            'fields' => $fields,
            'page_size' => $pageSize,
            'page' => $page
        ]);

        $results = Curl::callRoute($route,$this->token);

        $this->parseResults($results);
    }

    public function getSingle()
    {

    }

    private function parseResults(\stdClass $results)
    {
       $transactionResult = TransactionsResult::createFromStdClass($results);
    }
}
