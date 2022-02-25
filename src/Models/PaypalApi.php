<?php

namespace Itgasmobi\PaypalApi\Models;

use Itgasmobi\PaypalApi\Config\Configuration;
use Itgasmobi\PaypalApi\Config\RouteApi;
use Itgasmobi\PaypalApi\Util\Curl;
use Itgasmobi\PaypalApi\Exceptions\EmptyCurlResponseException;
use Itgasmobi\PaypalApi\Exceptions\EnvironmentNotExistException;
use Itgasmobi\PaypalApi\Exceptions\ErrorInTokenGenerateException;

class PaypalApi
{
    private string $clientId;

    private string $secretClient;

    protected string $url;

    protected string $token;

    /**
     * @param string $clientId
     * @param string $secretClient
     * @param string $environment
     * @throws EnvironmentNotExistException
     * @throws ErrorInTokenGenerateException
     */
    public function __construct(string $clientId, string $secretClient, string $environment = 'sandbox')
    {
        $this->clientId = $clientId;
        $this->secretClient = $secretClient;
        $this->initURL($environment);
        $this->initGenerateToken();
    }

    /**
     * @throws EnvironmentNotExistException
     */
    private function initURL($environment): void
    {
        $environments = Configuration::get(Configuration::ENVIRONMENTS);

        if(!isset($environments[$environment])) {
            $message = 'The posible enviroments are ';

            foreach($environments as $name => $url) {
                $message.= $name.' ';
            }
            throw new EnvironmentNotExistException($message);
        }

        $this->url = $environments[$environment];
    }

    /**
     * @param string $route
     * @return string
     */
    protected function generateRoute(string $route , array $params = []): string
    {
        $url = $this->url.$route;

        if(!$params) {
            return $url;
        }

        $first = true;

        foreach($params as $param =>$value) {
            if($first) {
                $first = false;
                $url.='?'.$param.'='.$value;
                continue;
            }

            $url.='&'.$param.'='.$value;
        }

        return $url;
    }

    /**
     * @throws ErrorInTokenGenerateException
     */
    private function initGenerateToken(): void
    {
        try {
            $results = Curl::callWithUserPWD($this->generateRoute(RouteApi::AUTH_ROUTE), $this->clientId, $this->secretClient);
            $this->token = $results->access_token;

        } catch (EmptyCurlResponseException|\JsonException $e) {
            throw new ErrorInTokenGenerateException();
        }
    }


}
