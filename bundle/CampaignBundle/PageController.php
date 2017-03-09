<?php
namespace CampaignBundle;

use Core\Controller;

class PageController extends Controller {

	public function indexAction() {
		global $user;

		$this->render('index', array('nickname'=> $user->nickname));
	}

	public function applyAction() {
		$this->render('apply');
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
		$request = $this->request;
		$id = $request->query->get('id') ? $request->query->get('id') : 0;
		if (!$id) {
			$this->redirect("/");
		}
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$boat = $DatabaseAPI->loadMakeById($id);
		$friends = $DatabaseAPI->getFriendsById($id);
		$this->render('result', array('name' => $boat->name, 'color' => $boat->color, 'createtime' => $boat->dt, 'friends'=> $friends));
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