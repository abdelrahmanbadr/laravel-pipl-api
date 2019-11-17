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
    protected $client;

    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?? (new Client());
    }

    public function search(array $fields)
    {
        if (empty($fields)) {
            throw new Exception("Search function parameter can't be empty");
        }
        
        $url = $this->buildUrl($fields);
        $response = $this->client->get($url);
        return json_decode($response->getBody(), true);
    }

    protected function buildUrl(array $fields)
    {
        $key = env('PIPL_API_KEY');
        $baseUrl = rtrim(env('PIPL_API_BASE_URL', 'http://api.pipl.com/search/'), '/');
        $url = $baseUrl . "/?key={$key}";

        foreach ($fields as $key => $value) {
            $url .= "&$key=$value";
        }

        return $url;
    }
}
