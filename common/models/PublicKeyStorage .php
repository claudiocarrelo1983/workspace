<?php
namespace app\storage;
use yii\authclient\OAuth2;

class PublicKeyStorage implements \OAuth2\Storage\PublicKeyInterface{


    private $pbk =  null;
    private $pvk =  null; 
    
    public function __construct()
    {
      

        $oauthClient = new OAuth2();
        $url = $oauthClient->buildAuthUrl(); // Build authorization URL
        Yii::$app->getResponse()->redirect($url); // Redirect to authorization URL.
        // After user returns at our site:
        $code = $_GET['code'];
        $accessToken = $oauthClient->fetchAccessToken($code);
    }

 

}