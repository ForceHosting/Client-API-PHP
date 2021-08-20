<?php 
namespace Force\API;

use GuzzleHttp\Client;
//use Force\API\Http;

class Http {  
   /**
     * The GuzzleHttp client.
     *
     * @var Client
     */
    protected $guzzle;

    /**
     * Number of seconds a request is retried.
     *
     * @var int
     */
    public $timeout = 30;

    public function __construct($apiKey, Client $guzzle = null)
    {
        $this->apiKey = $apiKey;
        $this->guzzle = $guzzle ?: new Client([
            'base_uri'    => 'https://api.fallback.forcehost.net/',
            'http_errors' => false,
        ]);
        return $this;
    }
    /**
     * Make request and return the response.
     *
     * @param string $method
     * @param string $uri
     * @param array  $query
     * @param array  $payload
     *
     * @return mixed
     */
    public function request($uri, $apiKey)
    {
        $response = $this->guzzle->request('GET', "https://api.fallback.forcehost.net/".$uri."&key=".$apiKey);
        $responseBody = (string) $response->getBody();
        return $responseBody;
    }
  }