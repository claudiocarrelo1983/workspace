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
use common\models\Comments;


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

        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

        return $this->render('home/index');
    }

    public function actionHome()
    {

        $this->layout = 'public';      
      
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


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
       
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


        return $this->render('texts/sitemap');
    }

    public function actionMobileApp()
    {
        $this->layout = 'public';

        return $this->render('mobile-app');
    }

    public function actionRecipes()
    {
        $this->layout = 'public';
     
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


        $request = Yii::$app->request; 
        $pg = $request->get('pg');
        $tag = $request->get('tag');
        $username = $request->get('username');      

        $urlParams = [
            'pg' => '',
            'tag' => '',
            'username' => ''
        ];

        $numberPerPage = 7;

        $model = new GeneratorJson(); 
        $recipes = $model->getLastFileUploaded('recipes');   

        if(!empty($pg)){         
            $urlParams = array_merge($urlParams, array('pg' => $pg));
        } 

        if(!empty($tag)){
            $urlParams = array_merge($urlParams, ['tag' => $tag]);
        }

        if(!empty($username)){
            $urlParams = array_merge($urlParams, ['username' => $username]);
        }

        
        $recipesFilter = array();

        foreach($recipes as $recipe){

            if($tag != '#'){
                if(empty($tag)){
                    $recipesFilter[] = $recipe;			
                }else{

                    $explode = explode(',', $recipe['recipe_cat_code']);

                    $break = false;

                    foreach($explode as $tagValue){
                        if(trim($tagValue) == trim($tag)){   
                            $break = true;
                            break;
                        }	
                    }       
                    
                    if($break == true){
                        $recipesFilter[] = $recipe;
                    }
                }	
            }	
        }


        return $this->render('recipes/recipes',[   
            'numberPerPage' => $numberPerPage,
            'recipes' => $recipesFilter,       
            'urlParams' => $urlParams
        ]);
    }



    public function actionBlogSingle()
    {
        $this->layout = 'public';    
        $request = Yii::$app->request;
       
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


        $modelComment = new Comments();
        $model = new GeneratorJson(); 
        $blogList = $model->getLastFileUploaded('blogs');  

        $blog = '';        

        foreach($blogList as $key => $values){
            if($values['id'] ==  $request->get('id')){
                $blog = $values;
                break;
            }
        }

        if ($request->isPost && $modelComment->load($request->post())  &&  $modelComment->validate() &&  $modelComment->save()) {
            
            $columns = GeneratorJson::getTableColumns('comments');         
            GeneratorJson::updateComments('comments',  $columns);  

            $this->refresh();        
        }
       

        if(empty( $blog)){
            return Yii::$app->response->redirect(Url::to(['site/blog'], true));
        }     

        return $this->render('blogs/blog-single', [
            'blog' => $blog,
            'modelComment' => $modelComment,
            'blog_id' => $request->get('id')         
        ]);
    }

    public function actionRecipeSingle()
    {      
        $this->layout = 'public';    
        $request = Yii::$app->request; 

        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


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

        $model = new GeneratorJson(); 
        $recipeArr = $model->getLastFileUploaded('recipes');  

        $recipe = '';        

        foreach($recipeArr as  $values){
            if($values['id'] ==  $request->get('id')){
                $recipe = $values;
            }
        }       

        if(empty($recipe)){
           return Yii::$app->response->redirect(Url::to(['site/blog'], true));
        }     

        return $this->render('recipes/recipe-single', [
            'recipe' => $recipe,
            'recipeArr' => $recipeArr,
            'urlParams' => $urlParams
         
        ]);
    }

    public function actionDownloadApp()
    {
        $this->layout = 'public';
        
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


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

        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

        return $this->render('home/index');
    }

    
    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {

        $this->layout = 'public';
       
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {
            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


        return $this->render('about/about');
    } 

    public function actionPricing()
    {

        $this->layout = 'public';     

        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

        
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
       
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

          
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

    public function actionCalculators()
    {

        $this->layout = 'public';
      
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


        return $this->render('@frontend/views/site/calculator/index');
    }

    public function actionFaqs()
    {
        $this->layout = 'public';
       
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

      
        $model = new GeneratorJson(); 
        $faqs = $model->getLastFileUploaded('faqs');

        return $this->render('texts/faqs', [
            'faqs' => $faqs
        ]);
    }

    public function actionFeatures()
    {
        $this->layout = 'public';

        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


        return $this->render('features/features');
    }
    public function actionBlog()
    {
        $this->layout = 'public';
       
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

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
  

        foreach($blogs as  $blog){

            if($username != '#'){
                if(empty($username)){
                    //$blogFilter[$blog['id']] = $blog;			
                }else{                
                    if(trim($blog['username']) == trim($username)){
                        $blogFilter[$blog['id']] = $blog;
                        $blogs = $blogFilter;
                    }		
                }	
            }


      
            if($tag != '#'){       
                if(empty($tag)){
                    //$blogFilter[$blog['id']] = $blog;
                }else{

                    $explode = explode(',', $blog['tags']);                

                    foreach($explode as $tagValue){
                        if(trim($tagValue) == trim($tag)){   
                            $blogFilter[$blog['id']] = $blog;         
                            $blogs = $blogFilter;     
                            break;
                        }	
                    }       
                }	
            }	
        }

  
  


        return $this->render('blogs/blog',
        [            
            'blogs' => $blogs,
            'pg' => $pg,
            'urlParams' => $urlParams,
            'username' => $username
        ]);
    }
  
    public function actionCoockies()
    {
        $this->layout = 'public';
        
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


        return $this->render('texts/coockies');
    
    }

    public function actionPrivacyPolicy()
    {
        $this->layout = 'public';   
        
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


        return $this->render('texts/privacy-policy'); 
    }
    
    public function actionBlogCategory()
    {
        $this->layout = 'public';
        
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


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
       
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }


        return $this->render('texts/terms-and-conditions');     
    } 

    public function actionGdpr()
    {
        $this->layout = 'public';
       
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

   
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

        return $this->render('login/requestPasswordResetToken', [
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
            return $this->render('home/index');
        }      

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('home/index', [
                'model' => $model,
            ]);
        }

        $model->password = '';
        $this->layout = 'public';

        
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('login/login_maintenance', [
                'model' => $model,
            ]);
        }
     
        return $this->render('login/login', [
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

        
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

        $submitEmail = '';
      
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {            
           
            $submitEmail = 'success';

            $modelLogin = new LoginForm();

            return $this->render('login/login', [
                'model' => $modelLogin,
                'submitEmail' => $submitEmail
            ]);
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

        $this->layout = 'public';

        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('login/resendVerificationEmail', [
            'model' => $model
        ]);
    }


    public function actionOrderComplete()
    {

        $this->layout = 'public';

        return $this->render('payment/order-complete');
    }

    public function actionCheckout()
    {

        $this->layout = 'public';

        $request = Yii::$app->request;

        $plan = $request->get('plan');
                
        $model = new GeneratorJson(); 
        $pricing = $model->getLastFileUploaded('pricing');    

        $pricingSpecs = $model->getLastFileUploaded('pricing_specs');

        $arrPriceSpecs = [];
        $price = 0;

        foreach ($pricing as $key => $value){
            if($value['key'] == 'euro'){
                $price = (isset($value[$plan]) ? $value[$plan] : 0);
            }         
        }

        foreach ($pricingSpecs as $key => $categories){
            if($categories['type'] == $plan){
                $arrPriceSpecs[] = $categories['page_code'];
            }         
        }

        switch ($plan) {
            case "basic":
                $plan = 'Basic';
              break;
            case "standard":
                $plan = 'Standard';
              break;
            case "professional":
                $plan = 'Professional';
              break;
            case "enterprise":
                $plan = 'Enterprise';
            break;
          
          }

        return $this->render('payment/checkout',
        [
            'plan' => $plan,    
            'price' => $price,           
            'arrPriceSpecs' => $arrPriceSpecs
        ]
    );
    }
}
