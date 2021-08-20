<?php
namespace Force\API;

use Force\API\Http;

class API {

	public function GetUserRam ($userid) {
		$response = $this->http->get("userram.php?id=$userid");
		return $response->getBody();
	}
	public function GetUserCpu ($userid) {
		$response = $this->http->get("usercpu.php?id=$userid");
		return $response->getBody();
	}
	public function GetUserDisk ($userid) {
		$response = $this->http->get("userdisk.php?id=$userid");
		return $response->getBody();
	}
	public function GetUserSlots ($userid) {
		$response = $this->http->get('GET', "userslots.php?id=$userid");
		return $response->getBody();
	}
}