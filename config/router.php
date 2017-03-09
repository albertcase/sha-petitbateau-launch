<?php

$routers = array();
$routers['/wechat/oauth2'] = array('WechatBundle\Wechat', 'oauth');
$routers['/wechat/callback'] = array('WechatBundle\Wechat', 'callback');
$routers['/wechat/curio/callback'] = array('WechatBundle\Curio', 'callback');
$routers['/wechat/curio/receive'] = array('WechatBundle\Curio', 'receiveUserInfo');
$routers['/wechat/ws/jssdk/config/webservice'] = array('WechatBundle\WebService', 'jssdkConfigWebService');
$routers['/wechat/ws/jssdk/config/js'] = array('WechatBundle\WebService', 'jssdkConfigJs');
$routers['/ajax/post'] = array('CampaignBundle\Api', 'form');
$routers['/'] = array('CampaignBundle\Page', 'index');
$routers['/clear'] = array('CampaignBundle\Page', 'clearCookie');
$routers['/apply'] = array('CampaignBundle\Page', 'apply');
$routers['/result'] = array('CampaignBundle\Page', 'result');
$routers['/testoauth'] = array('CampaignBundle\Page', 'test');
$routers['/login'] = array('CampaignBundle\Page', 'login');
$routers['/api/submit'] = array('CampaignBundle\Api', 'make');
$routers['/api/like'] = array('CampaignBundle\Api', 'like');