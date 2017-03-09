<?php
namespace CampaignBundle;

use Core\Controller;


class ApiController extends Controller {

    public function __construct() {

    	global $user;

        parent::__construct();

        if(!$user->uid) {
	        $this->statusPrint('100', 'access deny!');
        } 
    }

    public function formAction() {

    	global $user;

    	$request = $this->request;
    	$fields = array(
			'name' => array('notnull', '120'),
			'cellphone' => array('cellphone', '121'),
			'address' => array('notnull', '122'),
		);
		$request->validation($fields);
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$data = new \stdClass();
		$data->uid = $user->uid;
		$data->name = $request->request->get('name');
		$data->cellphone = $request->request->get('cellphone');
		$data->address = $request->request->get('address');

		if($DatabaseAPI->insertInfo($data)) {
			$data = array('status' => 1);
			$this->dataPrint($data);
		} else {
			$this->statusPrint('0', 'failed');
		}
    }

    public function makeAction() {

    	global $user;

    	$request = $this->request;
    	$fields = array(
			'name' => array('notnull', '120'),
			'color' => array('cellphone', '121'),
		);
		$request->validation($fields);
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$data = new \stdClass();
		$data->uid = $user->uid;
		$data->name = $request->request->get('name');
		$data->color = $request->request->get('color');
		$rs = $DatabaseAPI->insertMake($data);
		if($rs) {
			$data = array('status' => 1, 'msg' => $rs);
			$this->dataPrint($data);
		} else {
			$this->statusPrint('0', 'failed');
		}
    }

    public function likeAction() {

    	global $user;

    	$request = $this->request;
    	$fields = array(
			'id' => array('notnull', '120'),
		);
		$request->validation($fields);
		$id = $request->request->get('id');
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$boat = $DatabaseAPI->getBoatById($id);
		if ($boat->uid == $user->uid) {
			$this->statusPrint('0', 'failed');
		}
		$rs = $DatabaseAPI->likeBoat($user->uid, $id);
		if($rs) {
			$data = array('status' => 1, 'msg' =>'成功');
			$this->dataPrint($data);
		} else {
			$this->statusPrint('0', 'failed');
		}
    }

}
