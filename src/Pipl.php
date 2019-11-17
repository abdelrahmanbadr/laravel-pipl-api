<?php

namespace Abdelrahman_badr\Pipl;

use Exception;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * Class Pipl
 * @package Abdelrahman_badr\Pipl
 */
class Pipl
{

    /**
     * @var ClientInterface
     */
    protected $client;

    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?? (new Client());
    }

    /**
     * @param array $arrayOfFields
     * @return mixed
     * @throws Exception
     */
    public function search(array $arrayOfFields)
    {
        if (empty($arrayOfFields)) {
            $error = "Search function parameter can't be empty";
            throw new Exception($error);
        }
        
        $url = $this->buildUrl($arrayOfFields);
        $response = $this->client->get($url);
        return json_decode($response->getBody(), true);
    }

    protected function buildUrl(array $arrayOfFields)
    {
        $key = env('PIPL_API_KEY');
        $url = env('PIPL_API_BASE_URL', 'http://api.pipl.com/search/') . "?key={$key}";
        foreach ($arrayOfFields as $key => $value) {
            $url .= "&$key=$value";

        }
        return $url;
    }
}
