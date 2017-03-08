<?php
namespace CampaignBundle;

use Core\Controller;

class PageController extends Controller {

	public function indexAction() {
		$this->render('index');
	}

	public function applyAction() {
		$this->render('apply');
	}

	public function resultAction() {
		$this->render('result');
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