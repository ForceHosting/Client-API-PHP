<?php
namespace Force\API;

class API {
	$client = new GuzzleHttp\Client(['base_uri' => 'https://api.fallback.forcehost.net/']);

	public function GetUserRam ($userid) {
		$response = $client->request('GET', "userram.php?id=$userid");
		return $response->getBody();
	}
	public function GetUserCpu ($userid) {
		$response = $client->request('GET', "usercpu.php?id=$userid");
		return $response->getBody();
	}
	public function GetUserDisk ($userid) {
		$response = $client->request('GET', "userdisk.php?id=$userid");
		return $response->getBody();
	}
	public function GetUserSlots ($userid) {
		$response = $client->request('GET', "userslots.php?id=$userid");
		return $response->getBody();
	}
}