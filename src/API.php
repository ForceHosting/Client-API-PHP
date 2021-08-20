<?php
namespace Force\API;

use GuzzleHttp\Client;
//use Force\API\Http;

class API {

    /**
     * Create a new Pterodactyl instance.
     *
     * @param string             $apiKey
     * @param \GuzzleHttp\Client $guzzle
     *
     * @return void
     */
    public function __construct($apiKey, Client $guzzle = null)
    {
        $this->http = new Http($this, $guzzle);
    }

    public function GetUserRam ($userid) {
        return $this->http->request("userram.php?id=$userid");
    }
    public function GetUserCpu ($userid) {
        return $this->http->request("usercpu.php?id=$userid");
    }
    public function GetUserDisk ($userid) {
        return $this->http->request("userdisk.php?id=$userid");
    }
    public function GetUserSlots ($userid) {
        return $this->http->request("userslots.php?id=$userid");
    }
}