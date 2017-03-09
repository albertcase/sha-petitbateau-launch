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

	public function resultAction() {
		$request = $this->request;
		$id = $request->query->get('id') ? $request->query->get('id') : 0;
		if (!$id) {
			$this->redirect("/");
		}
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$boat = $DatabaseAPI->getBoatById($id);
		$friends = $DatabaseAPI->getFriendsById($id);
		$this->render('result', array('name' => $boat->name, 'color' => $boat->color, 'friends'=> $friends));
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