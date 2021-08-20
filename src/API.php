<?php
namespace Force\API;

use GuzzleHttp\Client;

class API {

	    public function __construct(Client $guzzle = null)
    {
        $this->guzzle = $guzzle ?: new Client([
            'base_uri'    => 'https://api.fallback.forcehost.net/',
            'http_errors' => false,
        ]);

        return $this;
    }

	public function GetUserRam ($userid) {
		$response = $this->request('GET', "userram.php?id=$userid");
		return $response->getBody();
	}
	public function GetUserCpu ($userid) {
		$response = $this->request('GET', "usercpu.php?id=$userid");
		return $response->getBody();
	}
	public function GetUserDisk ($userid) {
		$response = $this->request('GET', "userdisk.php?id=$userid");
		return $response->getBody();
	}
	public function GetUserSlots ($userid) {
		$response = $this->request('GET', "userslots.php?id=$userid");
		return $response->getBody();
	}
}