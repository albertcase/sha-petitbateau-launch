<?php
namespace CampaignBundle;

use Core\Controller;

class PageController extends Controller {

	public function indexAction() {
		global $user;

		$this->render('index', array('nickname'=> $user->nickname));
	}

	public function applyAction() {
		global $user;
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$card = $DatabaseAPI->getCard($user->uid);
		if (!$card) {
			$array = array('type'=>'', 'number'=>'');
		} else {
			$start = date("Y.m.d", strtotime($card->dt));
			$end = date("Y.m.d", strtotime($card->dt." +13day"));
			$array = array('type'=>$card->type, 'number'=>$card->number, 'start'=> $start, 'end' => $end);
		}
		$this->render('apply', $array);
	}

	public function loginAction() {
		$request = $this->request;
		$fields = array(
			'id' => array('notnull', '120'),
		);
		$request->validation($fields);
		$id = $request->query->get('id');
		$user = new \stdClass();
		$user->uid = $id;
		$user->openid = 'openid_'.$id;
		$user->nickname = 'user_'.$id;
		$user->headimgurl = '111';
		setcookie('_user0206', json_encode($user), time()+3600*24*30, '/');
		echo 'user:login:'.$id;
		exit;
	}

	public function resultAction() {
		global $user;
		$request = $this->request;
		$id = $request->query->get('id') ? $request->query->get('id') : 0;
		if (!$id) {
			$this->redirect("/");
		}
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$boat = $DatabaseAPI->loadMakeById($id);
		if ($user->uid == $boat->uid) {
			$ismy = 1;
		} else {
			$ismy = 0;
		}
		$friends = $DatabaseAPI->getFriendsById($id);

    	$WechatApi = new \Lib\WechatAPI();
    	$rs = $WechatApi ->isUserSubscribed($user->openid);
    	if ($rs) {
    		$subscribe = 1;
    	} else {
    		$subscribe = 0;
    	}
    	$boatcount = count($friends)>3 ? 3 : count($friends);
		$this->render('result', array('subscribe' => $subscribe, 'ismy' => $ismy, 'name' => $boat->name, 'color' => $boat->color, 'createtime' => $boat->dt, 'friends'=> $friends, 'row' => count($friends), 'boat' =>));
	}

	public function testAction() {
		global $user;
		echo $user->openid;exit;
		$this->render('test');
	}

	public function clearCookieAction() {
		setcookie('_user', json_encode($user), time(), '/');
		$this->statusPrint('success');
	}
}