<?php
namespace Lib;
/**
 * DatabaseAPI class
 */
class DatabaseAPI {

	private $db;

	private function connect() {
		$connect = new \mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
		$this->db = $connect;
		$this->db->query('SET NAMES UTF8');
		return $this->db;
	}
	/**
	 * Create user in database
	 */
	// public function insertUser($userinfo){
	// 	$nowtime = NOWTIME;
	// 	$sql = "INSERT INTO `user` SET `openid` = ?, `created` = ?, `updated` = ?"; 
	// 	$res = $this->connect()->prepare($sql); 
	// 	$res->bind_param("sss", $userinfo->openid, $nowtime, $nowtime);
	// 	if($res->execute()) 
	// 		return $this->findUserByOpenid($userinfo->openid);
	// 	else 
	// 		return FALSE;
	// }

	public function insertUser($userinfo){
		$nowtime = NOWTIME;
		$sql = "INSERT INTO `user` SET `openid` = ?, `nickname` = ?, `headimgurl` = ?, `created` = ?, `updated` = ?"; 
		$res = $this->connect()->prepare($sql); 
		$res->bind_param("sssss", $userinfo->openid, $userinfo->nickname, $userinfo->headimgurl, $nowtime, $nowtime);
		if($res->execute()) 
			return $this->findUserByOpenid($userinfo->openid);
		else 
			return FALSE;
	}

	public function updateUser($data) {
		if ($this->findUserByOauth($data->openid)) {
			return TRUE;
		}
		$sql = "INSERT INTO `oauth` SET `openid` = ?, nickname = ?, headimgurl = ?";
		$res = $this->db->prepare($sql); 
		$res->bind_param("sss", $data->openid, $data->nickname, $data->headimgurl);
		if ($res->execute()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function findUserByOauth($openid) {
		$sql = "SELECT id  FROM `oauth` WHERE `openid` = ?"; 
		$res = $this->db->prepare($sql);
		$res->bind_param("s", $openid);
		$res->execute();
		$res->bind_result($uid);
		if($res->fetch()) {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Create user in database  
	 */
	// public function findUserByOpenid($openid){
	// 	$sql = "SELECT `uid`, `openid` FROM `user` WHERE `openid` = ?"; 
	// 	$res = $this->connect()->prepare($sql);
	// 	$res->bind_param("s", $openid);
	// 	$res->execute();
	// 	$res->bind_result($uid, $openid);
	// 	if($res->fetch()) {
	// 		$user = new \stdClass();
	// 		$user->uid = $uid;
	// 		$user->openid = $openid;
	// 		return $user;
	// 	}
	// 	return NULL;
	// }

	/**
	 * Create user in database
	 */
	public function findUserByOpenid($openid){
		$sql = "SELECT `uid`, `openid`, `nickname`, `headimgurl` FROM `user` WHERE `openid` = ?"; 
		$res = $this->connect()->prepare($sql);
		$res->bind_param("s", $openid);
		$res->execute();
		$res->bind_result($uid, $openid, $nickname, $headimgurl);
		if($res->fetch()) {
			$user = new \stdClass();
			$user->uid = $uid;
			$user->openid = $openid;
			$user->nickname = $nickname;
			$user->headimgurl = $headimgurl;
			return $user;
		}
		return NULL;
	}

	/**
	 * 
	 */
	public function saveInfo($data){
		if($this->findInfoByUid($data->uid)) {
			$this->updateInfo($data);
		} else {
			$this->insertInfo($data);
		}
	} 

	/**
	 * 
	 */
	public function insertInfo($data){
		$nowtime = NOWTIME;
		$sql = "INSERT INTO `info` SET `uid` = ?, `name` = ?, `cellphone` = ?, `address` = ?, `created` = ?, `updated` = ?"; 
		$res = $this->connect()->prepare($sql); 
		$res->bind_param("ssssss", $data->uid, $data->name, $data->cellphone, $data->address, $nowtime, $nowtime);
		if($res->execute()) 
			return $res->insert_id;
		else 
			return FALSE;
	}

	/**
	 * 
	 */
	public function updateInfo($data){
		$nowtime = NOWTIME;
		$sql = "UPDATE `info` SET `name` = ?, `cellphone` = ?, `address` = ?, `updated` = ? WHERE `uid` = ?"; 
		$res = $this->connect()->prepare($sql); 
		$res->bind_param("sssss", $data->name, $data->cellphone, $data->address, $nowtime, $data->uid);
		if($res->execute()) 
			return $this->findInfoByUid($data->uid);
		else 
			return FALSE;
	}

	/**
	 * Create user in database
	 */
	public function findInfoByUid($uid){
		$sql = "SELECT `id`, `name`, `cellphone`, `address` FROM `info` WHERE `uid` = ?"; 
		$res = $this->connect()->prepare($sql);
		$res->bind_param("s", $uid);
		$res->execute();
		$res->bind_result($id, $name, $cellphone, $address);
		if($res->fetch()) {
			$info = new \stdClass();
			$info->id = $id;
			$info->name = $name;
			$info->cellphone = $cellphone;
			$info->$address = $address;
			return $info;
		}
		return NULL;
	}

	/**
	 * 
	 */
	public function insertMake($data){
		$sql = "INSERT INTO `boat` SET `uid` = ?, `name` = ?, `color` = ?"; 
		$res = $this->connect()->prepare($sql); 
		$res->bind_param("sss", $data->uid, $data->name, $data->color);
		if($res->execute()) 
			return $res->insert_id;
		else 
			return FALSE;
	}

	public function loadMakeById($id){
		$sql = "SELECT `id`, `uid`, `name`, `color`, date(`createtime`) as dt FROM `boat` WHERE `id` = ?"; 
		$res = $this->connect()->prepare($sql);
		$res->bind_param("s", $id);
		$res->execute();
		$res->bind_result($id, $uid, $name, $color, $dt);
		if($res->fetch()) {
			$info = new \stdClass();
			$info->id = $id;
			$info->uid = $uid;
			$info->name = $name;
			$info->color = $color;
			$info->dt = $dt;
			return $info;
		}
		return NULL;
	}

	public function loadMakeByUid($uid){
		$sql = "SELECT `id`, `uid`, `name`, `color` FROM `boat` WHERE `uid` = ?"; 
		$res = $this->connect()->prepare($sql);
		$res->bind_param("s", $uid);
		$res->execute();
		$res->bind_result($id, $uid, $name, $color);
		if($res->fetch()) {
			$info = new \stdClass();
			$info->id = $id;
			$info->uid = $uid;
			$info->name = $name;
			$info->color = $color;
			return $info;
		}
		return NULL;
	}

	public function likeBoat($uid, $id) {
		$sql = "INSERT INTO `ballot` SET `uid` = ?, `bid` = ?"; 
		$res = $this->connect()->prepare($sql); 
		$res->bind_param("ss", $uid, $id);
		if($res->execute()) 
			return $res->insert_id;
		else 
			return FALSE;
	}

	public function getFriendsById($bid) {
		$sql = "SELECT uid,nickname FROM `user` WHERE uid in (select uid from ballot where bid = '".intval($bid)."')"; 
		$res = $this->db->query($sql);
		$data = array();
		while($rows = $res->fetch_array(MYSQLI_ASSOC))
		{
			$data[] = $rows;
		}	
		return $data;
	}
	
	public function getCard($uid) {
		$sql = "SELECT `type`, `number`, date(`createtime`) as dt FROM `apply` WHERE `uid` = ?"; 
		$res = $this->connect()->prepare($sql);
		$res->bind_param("s", $uid);
		$res->execute();
		$res->bind_result($type, $number, $dt);
		if($res->fetch()) {
			$info = new \stdClass();
			$info->type = $type;
			$info->number = $number;
			$info->dt = $dt;
			return $info;
		}
		return NULL;
	}

	public function getSendCard() {
		$sql = "SELECT `id`, `number` FROM `card` WHERE `status` = 0"; 
		$res = $this->connect()->prepare($sql);
		$res->execute();
		$res->bind_result($id, $number);
		if($res->fetch()) {
			$info = new \stdClass();
			$info->id = $id;
			$info->number = $number;
			return $info;
		}
		return NULL;
	}

	public function insertSubmit($data){
		$sql = "INSERT INTO `submit` SET `uid` = ?, `sex` = ?, `name` = ?, `mobile` = ?, `email` = ?, `store` = ?"; 
		$res = $this->connect()->prepare($sql); 
		$res->bind_param("ssssss", $data->uid, $data->sex, $data->name, $data->mobile, $data->email, $data->store);
		if($res->execute()) 
			return $res->insert_id;
		else 
			return FALSE;
	}

	public function insertCard($uid, $type, $cid, $number){
		$sql = "INSERT INTO `apply` SET `uid` = ?, `type` = ?, `cid` = ?, `number` = ?"; 
		$res = $this->connect()->prepare($sql); 
		$res->bind_param("ssss", $uid, $type, $cid, $number);
		if($res->execute()) 
			return $res->insert_id;
		else 
			return FALSE;
	}

	
	public function insertCode($number){
		$sql = "INSERT INTO `card` SET `number` = ?"; 
		$res = $this->connect()->prepare($sql); 
		$res->bind_param("s", $number);
		if($res->execute()) 
			return $res->insert_id;
		else 
			return FALSE;
	}


	public function destroyCard($id){
		$sql = "UPDATE `card` SET `status` = 1 where id = ?"; 
		$res = $this->connect()->prepare($sql); 
		$res->bind_param("s", $id);
		if($res->execute()) 
			return TRUE;
		else 
			return FALSE;
	}

	public function clearMake(){
		$sql = "TRUNCATE table product"; 
		$res = $this->connect()->prepare($sql); 
		if($res->execute()) {
			$sql2 = "TRUNCATE table band"; 
			$res2 = $this->connect()->prepare($sql2); 
			$res2->execute();
			return TRUE;
		}
			
		else 
			return FALSE;
	}

}
