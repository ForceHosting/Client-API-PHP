<?php
namespace Force\API;

use GuzzleHttp\Client;
//use Force\API\Http;

class API {

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

    public function __construct(Client $guzzle = null)
    {
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
    public function request($uri)
    {
        $response = $this->guzzle->request('GET', "https://api.fallback.forcehost.net/".$uri);
        $responseBody = (string) $response->getBody();
        return $responseBody;
    }
    public function GetUserRam ($userid) {
        return $this->request("userram.php?id=$userid");
    }
    public function GetUserCpu ($userid) {
        return $this->request("usercpu.php?id=$userid");
    }
    public function GetUserDisk ($userid) {
        return $this->request("userdisk.php?id=$userid");
    }
    public function GetUserSlots ($userid) {
        return $this->request("userslots.php?id=$userid");
    }
}