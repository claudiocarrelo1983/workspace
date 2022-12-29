<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Recipes;
use common\models\RecipesFood;
use common\models\RecipesSteps;

$this->title = 'Recipes';
$this->params['breadcrumbs'][] = $this->title;
/*
use filsh\yii2\oauth2server\models\OauthAuthorizationCodes

/*

Postman

https://platform.fatsecret.com/rest/server.api?method=food.get.v2&oauth_consumer_key=841a1e2885854dfdab58d93e8ad8aef9&oauth_timestamp=63807436800&oauth_nonce=sss&oauth_version=1.0&oauth_signature=EGYBuHYyVsc0BNXs6GKuMR6bkC8%3D&oauth_signature_method=HMAC-SHA1&oauth_secret=**********


use yii\authclient\OAuth2;

$params = array(
    'oauth_consumer_key' => '841a1e2885854dfdab58d93e8ad8aef9', 
    'oauth_signature_method' =>  'HMAC-SHA1',
    'oauth_timestamp' => time(),
    'oauth_nonce' => time(),
    'user_id' => '841a1e2885854dfdab58d93e8ad8aef9'
    );

$oauthClient = new Auth();

print_R($oauthClient);
die();
$url = $oauthClient->buildAuthUrl(); // Build authorization URL
Yii::$app->getResponse()->redirect($url); // Redirect to authorization URL.
// After user returns at our site:
$code = $_GET['code'];
$accessToken = $oauthClient->fetchAccessToken($code);
die();


$params = array(
    'oauth_consumer_key' => '841a1e2885854dfdab58d93e8ad8aef9', 
    'oauth_signature_method' =>  'HMAC-SHA1',
    'oauth_timestamp' => time(),
    'oauth_nonce' => time(),
    'user_id' => '841a1e2885854dfdab58d93e8ad8aef9'
    );

$secret = 'b71ce3e967b04f8fa9798f4a880c2b21';

$post_string = '';
foreach($params as $key => $value)
{
$post_string .= $key.'='.($value).'&';
}
$post_string = rtrim($post_string, '&');

$base_string = str_replace('%7E', '~', rawurlencode($post_string)); 

$signature = base64_encode(hash_hmac('sha1', $base_string, $secret, true));

print_r(time().'----'.$signature);
die();


$consumer_key = "841a1e2885854dfdab58d93e8ad8aef9";
$secret_key = "**********";

$url = 'hhttps://www.fatsecret.com/oauth/request_token';
$consumerKey = '841a1e2885854dfdab58d93e8ad8aef9';
$signatureMethod = 'HMAC-SHA1';
$timestamp = time();
$nonce = 'sss';
$version = '1.0';
$callback = 'dd';




$method = 'food.get.v2';


print_R($timestamp);
die();
$base = $method . "&" . rawurlencode($url) . "&"
        . rawurlencode("oauth_consumer_key=" . rawurlencode($consumerKey)
        . "&oauth_signature_method=" . rawurlencode($signatureMethod)
        . "&oauth_timestamp=" . rawurlencode($timestamp)
        . "&oauth_nonce=" . rawurlencode($nonce)


        //. "&oauth_token=" . rawurlencode($this->accessToken)
        . "&oauth_version=" . rawurlencode($version));

$key = rawurlencode($consumerKey) . '&';

$signature = rawurlencode(base64_encode(hash_hmac('SHA1', $base, $key, true)));

print_r($signature);
die();



$consumer_key = "841a1e2885854dfdab58d93e8ad8aef9";
$secret_key = "**********";

$url = 'https://platform.fatsecret.com/rest/server.api?';
$consumerKey = '841a1e2885854dfdab58d93e8ad8aef9';
$nonce = 'sss';
$signatureMethod = 'HMAC-SHA1';
$timestamp = time();
$version = '1.0';
$method = 'food.get.v2';

print_R($timestamp);
die();


$base = $method . "&" . rawurlencode($url) . "&"
        . rawurlencode("oauth_consumer_key=" . rawurlencode($consumerKey)
        . "&oauth_nonce=" . rawurlencode($nonce)
        . "&oauth_signature_method=" . rawurlencode($signatureMethod)
        . "&oauth_timestamp=" . rawurlencode($timestamp)
        //. "&oauth_token=" . rawurlencode($this->accessToken)
        . "&oauth_version=" . rawurlencode($version));

$key = rawurlencode($consumerKey) . '&';

$signature = rawurlencode(base64_encode(hash_hmac('SHA1', $base, $key, true)));

print_r($signature);
die();

//Signature Base String
//<HTTP Method>&<Request URL>&<Normalized Parameters>
$base = rawurlencode("GET")."&";
$base .= "http%3A%2F%2Fplatform.fatsecret.com%2Frest%2Fserver.
api&";
//sort params by abc....necessary to build a correct unique signature
$params = "method=foods.search&";
$params .= "oauth_consumer_key=$consumer_key&"; // ur consumer key
$params .= "oauth_nonce=123&";
$params .= "oauth_signature_method=HMAC-SHA1&";
$params .= "oauth_timestamp=".time()."&";
$params .= "oauth_version=1.0&";
$params .= "search_expression=".urlencode($_GET['pasVar']);
$params2 = rawurlencode($params);
$base .= $params2;
//encrypt it!
$sig= base64_encode(hash_hmac('sha1', $base, "$secret_key&",
true)); // replace xxx with Consumer Secret

print_r(rawurlencode($sig));
die();
//now get the search results and write them down
$url = "http://platform.fatsecret.com/rest/server.api?".
$params."&oauth_signature=".rawurlencode($sig);
//$food_feed = file_get_contents($url);
list($output,$error,$info) = loadFoods($url);
echo '<pre>';
if($error == 0){
    if($info['http_code'] == '200')
        echo $output;
    else
        die('Status INFO : '.$info['http_code']);
}
else
    die('Status ERROR : '.$error);
function loadFoods($url)
{
        // create curl resource
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output contains the output string
        $output = curl_exec($ch);
        $error = curl_error($ch);
        $info = curl_getinfo($ch);
        // close curl resource to free up system resources
        curl_close($ch);
        return array($output,$error,$info);
}


die('___');
$method ='food.get.v2';
$oauth_consumer_key = '841a1e2885854dfdab58d93e8ad8aef9';
$oauth_timestamp = time();
$oauth_nonce = 'randomstring';
$oauth_version='1.0';
$oauth_signature = '';
$oauth_signature_method = 'HMAC-SHA1';


/* @var $this yii\web\View */
/* @var $searchModel app\models\RecipesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/*
$oauthClient = new OAuth1(
[
    'key' => "841a1e2885854dfdab58d93e8ad8aef9"
    'secret' = "b71ce3e967b04f8fa9798f4a880c2b21",

]


function oAuthTimestamp($start='0001-01-01')
{

    $datetime1 = new DateTime($start);
    $datetime2 = new DateTime(date("Y-m-d"));
    $interval = $datetime1->diff($datetime2);

    return $interval->format('%a') * 24 * 60 * 60;

}
//63807436800

print_r(time());
die();

$params = array(
    'oauth_consumer_key' => '841a1e2885854dfdab58d93e8ad8aef9', 
    'oauth_signature_method' =>  'HMAC-SHA1',
    'oauth_timestamp' => time(),
    'oauth_nonce' => time(),
    'user_id' => '1234'
    );

$post_string = '';

foreach($content as $key => $value)
{
$post_string .= $key.'='.($value).'&';
}
$post_string = rtrim($post_string, '&');

$base_string = urlencodeRFC3986($post_string);

$signature = base64_encode(hash_hmac('sha1', $base_string, $secret, true));



print "<prE>";
print_r($signature);
die();



$requestToken = $oauthClient->fetchRequestToken(); // Get request token
$url = $oauthClient->buildAuthUrl($requestToken); // Get authorization URL
return Yii::$app->getResponse()->redirect($url); // Redirect to authorization URL
// After user returns at our site:
$accessToken = $oauthClient->fetchAccessToken($requestToken); // Upgrade to access token

die();



$cliente = new Client(
    [
        'base_uri' => ''
    ]
      
);



$search = $cliente->SearchFood('http://www.fatsecret.com/calories-nutrition/generic/french-toast-plain');

$foods = $search->foods;

var_dump($foods);
die();



*/



$this->title = 'Recipes';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="recipes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recipes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,       
      
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',               
            'recipe_title',
            'recipe_code_title',      
            'recipe_text:ntext',
            'recipe_cat_code',
            'cooking_time',  
            'number_of_people',
            //'recipe_pt',
            //'recipe_es',
            //'recipe_en',
            //'recipe_it',
            //'recipe_fr',
            //'recipe_de',
            //'active',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Recipes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
