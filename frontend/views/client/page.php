<?php



use yii\helpers\Html;
use yii\helpers\Url;
use yii\db\Query;
use common\Helpers\Helpers;
use yii\widgets\ActiveForm;

$query = new Query;



$teamArr = $query->select('*')
    ->from(['team'])
    ->where(
        [
           'company_code' => $company             
        ]) 
    ->all();


$arrServices = [];

$servicesCatArr = $query->from(['sc' => 'services_category'])
    ->select([
        'sc.category_code',
        'page_code_sc_title'  => 'sc.page_code_title',
        'services_category_title' => 'sc.page_code_title',
        ])
    ->where(['sc.company_code' => $company])
    ->orderBy(['order'=>SORT_ASC])
    ->all();


foreach($servicesCatArr as $serviceCat){
    $servicesArr = $query->from(['s' => 'services'])
        ->select([   
            's.category_code',
            's.price',         
            'services_title'  => 's.page_code_title',        
            'services_text'  => 's.page_code_text',
            ])
        ->where(
            [
                's.company' => $company,
                's.category_code' => $serviceCat['category_code']
            ]
        )->orderBy(['order'=>SORT_ASC])->all();

    $arrServices[$serviceCat['page_code_sc_title']] = $servicesArr;
}

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


?>


<?php if(isset($companyArr[0]['color']) && !empty($companyArr[0]['color'])){ ?>
    <style>
        .featured-primary-custom{
            border-top-color: <?= $companyArr[0]['color'] ?> !important;
            border-top: 3px solid <?= $companyArr[0]['color'] ?> !important;
        }

        .btn-primary{
            background-color: <?= $companyArr[0]['color'] ?> !important;
            border-color: <?= $companyArr[0]['color'] ?> !important;
        }

        .list.list-icons.list-icons-style-3 li > [class*="fa-"]:first-child, .list.list-icons.list-icons-style-3 li a:first-child > [class*="fa-"]:first-child, .list.list-icons.list-icons-style-3 li > .icons:first-child, .list.list-icons.list-icons-style-3 li a:first-child > .icons:first-child{
            background-color: <?= $companyArr[0]['color'] ?> !important;
        }
        .btn-link{
            color: <?= $companyArr[0]['color'] ?> !important;
        }
        .dropdown-reverse:hover > a{
            color: <?= $companyArr[0]['color'] ?> !important;
        }
    </style>
<?php } ?>







<span id="anchor-about-us"></span>

<?= $this->render('/client/client-booking-header', ['myData' => $myData, 'code' => $company, 'logo' => $companyArr[0]['path'].$companyArr[0]['image']]); ?>


<div role="main" class="main">  
    <div class="container">  
        <h1 class="font-weight-normal line-height-1 text-center">
            <?= (isset($companyArr['0']['company_name']) ? $companyArr['0']['company_name'] : '') ?>
        </h1>
        <p class="lead text-center ">
            <?= (isset($companyArr['0']['page_code_text']) ? Yii::t('app',$companyArr['0']['page_code_text']) : '') ?>
        </p>           

        <div class="pt-5">
            <section class="call-to-action featured featured-primary-custom mb-5">
                <div class="col-sm-8 col-lg-8">
                    <div class="call-to-action-content">
                        <h3>
                            <strong>Secure Your Spot Now.</strong>
                        </h3>
                        <p class="mb-0 opacity-7">
                            Secure your reservation instantly by clicking the 'Book Now'.
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <div class="call-to-action-btn">                   
                        <?= 
                        Html::a(
                            Yii::t('app', 'Book Now'),                      
                            Url::to(['/client-booking', 'code' => $company]),
                            [
                            'class' => 'btn btn-primary btn-xl mb-2 text-5 py-3 px-5',                                                  
                            'data-hash-offset' => 0,  
                            'data-hash-offset-lg' => 130,  
                            ] 
                        ) 
                        ?> 
                    </div>
                </div>
            </section>
        </div> 
        <hr class="solid my-5"> 

              
        <div class="row  pb-4 ">

         <?php
            $size = 12;

            $teamMembers = count($teamArr);

            switch( $teamMembers){
                case '0':
                    $size = '12 text-center';
                    break;
                case '1':
                case '2':                
                    $size = 3;
                    break;
                default:
                     $size = 6;
                    break;
                break;
            }
     
          ?>
            <div class="col-md-<?= $size ?> order-2 order-md-1 text-center text-md-start">
            <?php if(count($teamArr) >= 2){ ?>
                <div class="owl-carousel owl-theme nav-style-1 nav-center-images-only stage-margin mb-0 owl-loaded owl-drag owl-carousel-init" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'margin': 25, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}" style="height: auto;">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-736px, 0px, 0px); transition: all 0.25s ease 0s; width: 1308px; padding-left: 40px; padding-right: 40px;">
                            <?php } ?>
                            <?php foreach($teamArr as $key => $team): ?> 
                                <div class="owl-item" style="width: <?= ((count($teamArr) >= 2) ? '100%' : '220.5px') ?> ; margin-right: 25px;">
                                    <div>                                  
                                        <?= Html::img($team['path'].$team['image'], ['class' => 'img-fluid rounded-0 mb-4']);?>
                                        <h3 class="font-weight-bold text-color-dark text-4 mb-0">
                                            <?= $team['first_name'] ?>
                                        </h3>
                                        <p class="text-2 mb-0">
                                            <?= Yii::t('app', $team['page_code_title']) ?>
                                        </p>
                                    </div>
                                </div>                     
                            <?php endforeach; ?> 
                            <?php if(count($teamArr) >= 2){ ?>
                        </div>
                    </div>    
                    <?php if(count($teamArr) >= 3){ ?>             
                    <div class="owl-nav">
                        <button type="button" role="presentation" class="owl-prev"></button>
                        <button type="button" role="presentation" class="owl-next disabled"></button>
                    </div>
                    <div class="owl-dots disabled"></div>        
                    <?php } ?>         
                </div>
                <?php } ?>
            </div>
            <div class="col-md-<?= (($size == 12) ? 12 : 6) ?> order-1 order-md-2 text-center text-md-start mb-5 mb-md-0">
                <h2 class="text-color-dark font-weight-normal text-6 mb-2 pb-1">
                    <strong class="font-weight-extra-bold"> 
                        <?= Yii::t('app', $companyArr['0']['page_code_team_title']) ?>
                    </strong>
                </h2>
                <p class="lead">
                    <?= Yii::t('app', $companyArr['0']['page_code_team_text']) ?>
                </p>
             </div>
        </div>    
        
        
        

<span id="anchor-services"></span>
<span class="solid">  </span> 
    <div class="row  mb-5">
        <div class="col">  
            <div class="heading text-primary heading-border ">            
                <h1>Services</h1>
                <hr class="solid mb-5"> 
            </div> 

            <?php foreach($arrServices as $key => $services): ?>  
                <div class="my-5"></div>
                <h4 class="text-color-dark font-weight-bold positive-ls-3 mb-0">
                    <?=  Yii::t('app', $key) ?>
                </h4>
                <hr class="bg-color-grey-scale-2 mt-2 mb-4">
                <div class="pt-2">    
                    <?php foreach($services as $key => $service): ?>  
                        <div class="price-menu-item">
                            <div class="price-menu-item-details">
                                <div class="price-menu-item-title">
                                    <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">                             
                                        <?=  Yii::t('app', $service['services_title']) ?>
                                    </h5>
                                </div>
                                <div class="price-menu-item-line opacity-4"></div>
                                <div class="price-menu-item-price">
                                    <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                        <span class="text-2-5">
                                            <?php                                            
                                                if(isset($companyArr[0]['coin'])){
                                                    echo Yii::t('app',Helpers::getCurrencyName($companyArr[0]['coin']));
                                                }                                             
                                            ?>
                                        </span>
                                        <?= $service['price'] ?>
                                    </strong>
                                </div>
                            </div>
                            <div class="price-menu-item-desc">
                                <p class="text-2-5 line-height-4">
                                    <?=  Yii::t('app', $service['services_text']) ?>                                  
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?> 
                </div>
            <?php endforeach; ?> 
        </div>
    </div>

<div role="main" class="main"> 
    <span id="anchor-contact-us"></span>  
    <span class="my-5"></span>   
        <div class="row">
            <div class="col">     
                <div class=" my-2">
                    <h2 class="mb-3">
                        <?= Yii::t('app', 'menu_contacts') ?>
                    </h2>
                    <hr class="solid mb-5"> 
                </div>        
                <?php $form = ActiveForm::begin(); ?>  
                    <?= $form->field($model, 'company_code')->hiddenInput(['value' => Yii::$app->user->identity->company_code])->label(false)  ?>
                    <?= $form->field($model, 'type')->hiddenInput(['value' => 'message'])->label(false) ?>
                    <?= $form->field($model, 'username_code')->hiddenInput(['value' => Yii::$app->user->identity->guid])->label(false) ?>
                    <div class="row">
                        <div class="form-group col-lg-6">                     
                            <?= $form->field($model, 'full_name')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                        </div>
                        <div class="form-group col-lg-3">
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                       </div>
                        <div class="form-group col-lg-3">
                            <?= $form->field($model, 'contact_number')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="form-group col pt-4">                     
                            <?= $form->field($model, 'text')->textarea(['rows' => '5', 'class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label('Massage') ?></div>
                    </div>
                    <div class="row">                 
                        <div class="form-group pt-3">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-modern']) ?>
                        </div>
                    </div>         
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    
        <div>  
            <span class="my-5"></span>  
            <div class="heading text-primary heading-border my-5">          
                <h1>Location</h1>
                <hr class="solid mb-5"> 
            </div>    
        <div class="row my-5 ">  
 
        <?php foreach($companyArr as $keyt => $companyLocations):?>     
            <div class="col-lg-4 py-3">
                <h4>
                    <?= $companyLocations['company_name'] ?> (<?= $companyLocations['location'] ?>)
                </h4>
                <h4 >Our <strong>Address</strong></h4>
                    <ul class="list list-icons list-icons-style-3 ">
                        <?php        

                                $str = '';

                                $str .= '<li>';
                                $str .= '<i class="fas fa-map-marker-alt top-6"></i> '.$companyLocations['address_line_1'].' , '.$companyLocations['address_line_2'];
                                $str .= '</li>';  
                                $str .= '<li>';
                                $str .= '<i class="fas fa-map-marker-alt top-6"></i> '.$companyLocations['city'].' , '.$companyLocations['postcode'].' ('.Helpers::getCountryName($companyLocations['country']).')';
                                $str .= '</li>';
                                                            
                                $str .= '<li>';
                                $str .= '<i class="fas fa-phone top-6"></i> '.$companyLocations['contact_number'];
                                $str .= '</li>';
                                $str .= '<li>';
                                $str .= '<i class="fas fa-envelope top-6"></i> <a href="mailto:'.$companyLocations['email'].'">'.$companyLocations['email'].'</a>';   
                                $str .= '</li>';  
                                
                                
                            echo $str;
                           
                        ?>                      
                    </ul>
    
                <h4 class="pt-2">Business <strong>Hours</strong></h4>
                    <ul class="list list-icons list-dark mt-2">
                        <?php                            



                            $str = '';   
                            
                            $arrWeek = ((is_array(json_decode($companyLocations['sheddule_array'],true))) ? json_decode($companyLocations['sheddule_array'], true) : []);

                            foreach($arrWeek as $key => $value){
                                $str .= '<li><i class="far fa-clock top-6"></i> ';
                                if($value['closed'] == 'false'){
                                    $str .= Yii::t('app',$key);
                                    $str .= ((empty($value['start'])) ? '' :' - '.$value['start'] );
                                    $str .= ((empty($value['break_start'])) ? '' : ' - '.$value['break_start']);                
                                    $str .= ' & ';   
                                    $str .= ((empty($value['break_end'])) ? '' : $value['break_end']);
                                    $str .= ((empty($value['end'])) ? '' : ' - '.$value['end']);
                                              
                                }
                                $str .='</li>'; 
                            }           
                            
                            
                            $closedStr = '';
                            $i = 0;

                            foreach($arrWeek as $key => $value){                               
                                if($value['closed'] == 'true'){   
                                    $comma = ($i == 0) ? '' : ',';                              
                                    $closedStr .=  $comma.' '.Yii::t('app',$key); 
                                    $i++;
                                }       
                            }   
                            
                            if(!empty($closedStr)){
                                $str .= '<li><i class="far fa-clock top-6"></i> ';                           
                                $str .= $closedStr.' - Closed</li>';
                            }  

                            echo $str;
                           
                            ?>  

              
                    </ul>
            </div>
            <?php if(count($companyArr) <= 2){ ?>
                <div class="col-lg-8  py-3">                  
                    <div id="googlemaps" class="google-map m-0 " style="height:450px;">
                        <?= $companyLocations['google_location'] ?>
                    </div>
                </div>
            <?php } ?>         
        <?php endforeach; ?> 
        </div>
        </div>
        <div class="row   my-5">           
            <div class="col-lg-12">
                <div class="heading text-primary heading-border">
                    <h1>Follow Us</h1>
                    <hr class="solid mb-5"> 
                </div>    
                           
                <div class=" mb-3 text-center">
                    <ul class="list list-unstyled">
                        <li class="">
                            <ul class="social-icons social-icons-big social-icons-dark-2">
                                <?php                             

                                    $str = '';

                                    if(isset($companyArr[0]) ){
                                        foreach($companyArr[0] as $keyt => $value){  
                                            if(!empty($value)){
                                                switch ($keyt) {
                                                    case 'instagram':
                                                    case 'facebook':
                                                    case 'twitter':
                                                    case 'pinterest': 
                                                    case 'linkedin':
                                                    case 'youtube':
                                                        $str .= '<li class=" mx-2  social-icons-'.$keyt.'" >';
                                                        $str .= '<a  target="_blank" href="'.$value.'"><i class="text-6 fab fa-'.$keyt.'"  style="padding:12px;"></i></a>';    
                                                        $str .= '</li>';                                    
                                                        break;                                        
                                                    case 'website':
                                                        $str .= '<li class="social-icons-'.$keyt.'">';
                                                        $str .= '<a  href="'.$value.'"><i class="icon-globe icons"></i></a>';
                                                        $str .= '</li>';
                                                        
                                                        break;
                                                }                                              
                                            }   
                                        }    
                                    }   
                                                            
                                    echo $str;
                                ?>                     
                            </ul>
                        </li>
                    </ul>      
                </div>
            </div>
        </div>
    </div>
</div>

