<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use common\models\User;
use frontend\models\ContactForm;
use yii\helpers\Url;
use frontend\models\SignupForm;
use yii\helpers\Json;
use common\models\GeneratorJson;
use sammaye\mailchimp\Mailchimp;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {   
        
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup','language'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $this->layout = 'public';

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'public';


        return $this->render('home/index');
    }

    public function actionHome()
    {
        $this->layout = 'public';

        return $this->render('home/index');
    }

    public function actionLanguage()
    {       
    
       if(isset($_POST['lang'])){
        Yii::$app->language = $_POST['lang'];

        $cookies = new \yii\web\Cookie([
            'name' => 'lang',
            'value' => $_POST['lang'],
        ]);

        Yii::$app->getResponse()->getCookies()->add($cookies);

       }
    }
    public function actionSitemap()
    {
        $this->layout = 'public';

        return $this->render('texts/sitemap');
    }

    public function actionMobileApp()
    {
        $this->layout = 'public';

        return $this->render('mobile-app');
    }


    public function actionBlogSingle()
    {
        $this->layout = 'public';    
        $request = Yii::$app->request; 

        $model = new GeneratorJson(); 
        $blogList = $model->getLastFileUploaded('blogs');  

        $blog = '';        

        foreach($blogList as $key => $values){
            if($values['id'] ==  $request->get('id')){
                $blog = $values;
            }
        }     
       

        if(empty( $blog)){
            return Yii::$app->response->redirect(Url::to(['site/blog'], true));
        }     

        return $this->render('blogs/blog-single', [
            'blog' => $blog,
         
        ]);
    }

    public function actionDownloadApp()
    {
        $this->layout = 'public';

        return $this->render('download-app');
    }



    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        
        $this->layout = 'public';

        return $this->render('about');
    }

    
    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {

        $this->layout = 'public';

        return $this->render('about/about');
    } 

    public function actionPricing()
    {

        $this->layout = 'public';       
        
        $model = new GeneratorJson(); 
        $pricing = $model->getLastFileUploaded('pricing');  

        $pricingSpecs = $model->getLastFileUploaded('pricing_specs');

       
        return $this->render('services/pricing', [
            'pricing' => $pricing,
            'pricingSpecs' => $pricingSpecs
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContactUs()
    {
        $this->layout = 'public';
          
        $model = new GeneratorJson(); 
        $subject = $model->getLastFileUploaded('subjects');  

        $model = new ContactForm();
        $request = Yii::$app->getRequest();

        if ($request->isPost && $model->load($request->post())) {
            $model->saveTicket($model);         
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact/contact-us', [
            'model' => $model,
            'subject' =>  $subject
        ]);
    }

    public function actionFaqs()
    {


        $mc = new Mailchimp(['apikey' => '7a41d4e89958dc451d8c7ea666e301f9-us21']);
      
        require('mailchimp/Mailchimp.php');    // You may have to modify the path based on your own configuration.

$api_key = "7a41d4e89958dc451d8c7ea666e301f9-us21";
$list_id = "Add your list ID here";

$Mailchimp = new Mailchimp( $api_key );
$Mailchimp_Lists = new Mailchimp_Lists( $Mailchimp );

try 
{
    $subscriber = $Mailchimp_Lists->subscribe(
        $list_id,
        array('email' => 'kellykoe@example.com'),      // Specify the e-mail address you want to add to the list.
        array('FNAME' => 'Kelly', 'LNAME' => 'Koe'),   // Set the first name and last name for the new subscriber.
        'text',    // Specify the e-mail message type: 'html' or 'text'
        FALSE,     // Set double opt-in: If this is set to TRUE, the user receives a message to confirm they want to be added to the list.
        TRUE       // Set update_existing: If this is set to TRUE, existing subscribers are updated in the list. If this is set to FALSE, trying to add an existing subscriber causes an error.
    );
} 
catch (Exception $e) 
{
    echo "Caught exception: " . $e;
}

if ( ! empty($subscriber['leid']) )
{
    echo "Subscriber added successfully.";
}
else
{
    echo "Subscriber add attempt failed.";
}


        $this->layout = 'public';
      
        $model = new GeneratorJson(); 
        $faqs = $model->getLastFileUploaded('faqs');

        return $this->render('texts/faqs', [
            'faqs' => $faqs
        ]);
    }

    public function actionFeatures()
    {
        $this->layout = 'public';
        return $this->render('features/features');
    }
    public function actionBlog()
    {
        $this->layout = 'public';

        $model = new GeneratorJson(); 
        $blogs = $model->getLastFileUploaded('blogs');   
         
        $request = Yii::$app->request; 
        $pg = $request->get('pg');
        $tag = $request->get('tag');
        $username = $request->get('username');      

        $urlParams = [
            'pg' => '',
            'tag' => '',
            'username' => ''
        ];

        if(!empty($pg)){         
            $urlParams = array_merge($urlParams, array('pg' => $pg));
        } 

        if(!empty($tag)){
            $urlParams = array_merge($urlParams, ['tag' => $tag]);
        }

        if(!empty($username)){
            $urlParams = array_merge($urlParams, ['username' => $username]);
        }

        $blogFilter = array();

        foreach($blogs as $blog){

            if($username != '#'){
                if(empty($username)){
                    $blogFilter[] = $blog;			
                }else{                
                    if(trim($blog['username']) == trim($username)){
                        $blogFilter[] = $blog;
                    }		
                }	
            }
         
            if($tag != '#'){
                if(empty($tag)){
                    //$blogFilter[] = $blog;			
                }else{

                    $explode = explode(',', $blog['tags']);

                    $break = false;

                    foreach($explode as $tagValue){
                        if(trim($tagValue) == trim($tag)){   
                            $break = true;
                            break;
                        }	
                    }       
                    
                    if($break == true){
                        $blogFilter[] = $blog;
                    }
                }	
            }	
        }
        
        $blogs = $blogFilter;


        return $this->render('blogs/blog',
        [            
            'blogs' => $blogs,
            'pg' => $pg,
            'urlParams' => $urlParams
        ]);
    }
  
    public function actionCoockies()
    {
        $this->layout = 'public';

        return $this->render('texts/coockies');
    
    }

    public function actionPrivacyPolicy()
    {
        $this->layout = 'public';   

        return $this->render('texts/privacy-policy'); 
    }
    
    public function actionBlogCategory()
    {
        $this->layout = 'public';

        $json = file_get_contents(Yii::$app->basePath.'\web\json\texts.json');
        $texts = Json::decode($json);
        
        $result = array(
            'code_page' => '',
            'title' => '',
            'text' => '',
            'created_date' => ''            
        );

        $code = 'privacy';

        foreach($texts as $text){
            if(isset($text['code_page'])){
                if($text['code_page'] == $code){
                    $result = $text;
                    break;
                }
            }         
        }


        return $this->render('blogs/blog-category',
        [         
            'text' => $result
        ]);
 
    }

    
    public function actionTermsAndConditions()
    {
        $this->layout = 'public';

        return $this->render('texts/terms-and-conditions');     
    } 

    public function actionGdpr()
    {
        $this->layout = 'public';
   
        return $this->render('texts/gdpr');  

    }
  
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

      

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        $this->layout = 'public';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */

    public function actionSignup()
    {
        $model = new SignupForm();

        $submitEmail = '';


        if ($model->load(Yii::$app->request->post()) && $model->signup()) {            
           
            $submitEmail = 'success';
            //return $this->goHome();
        }

        //$this->layout = 'publicDark';

        return $this->render('login/signup', [
            'modelSignupForm' => $model,
            'submitEmail' => $submitEmail,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        Yii::$app->db->createCommand("UPDATE user SET status=:status WHERE verification_token=:token")
        ->bindValue(':status', User::STATUS_ACTIVE)
        //->bindValue(':username', $user->username)
        ->bindValue(':token', $token)
        ->execute();

        $model = new LoginForm(); 

        return $this->redirect(['site/login']);


        
        try {                
            $model = new VerifyEmailForm($token);             
        } catch (InvalidArgumentException $e) {            
            throw new BadRequestHttpException($e->getMessage());
        }
        
        if (($user = $model->verifyEmail()) ) {    
            
                //Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->render('login');
           
            /*
            if(Yii::$app->user->login($user)){
                die('__1');
                //Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }    
            */  
        }

        
        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
