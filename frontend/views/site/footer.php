<?php

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\helpers\Url;
use common\models\GeneratorJson;
use common\Helpers\Helpers;
use yii\widgets\ActiveForm;


$model = new GeneratorJson(); 

$base_url = Helpers::getBaseUrl();
$facebook = '';
$linkedin = '';
$instagram = '';

switch($base_url){
    case 'localhost':
	case 'specialcalendar.com':
        $menu = $model->getLastFileUploaded('other','calendar-menu');     
		$facebook = 'https://www.facebook.com/specialcalendar2022';
		$linkedin = 'https://www.linkedin.com/company/specialcalendar';
		$instagram = 'https://www.instagram.com/specialcalendar/';                 
        break;
  
    case 'localhost:100':
	case 'myspecialgym.com':

        $menu = $model->getLastFileUploaded('other','public-menu');
		$facebook = 'https://www.facebook.com/myspecialgym2022';
		$linkedin = 'https://www.linkedin.com/company/myspecialgym';
		$instagram = 'https://www.instagram.com/myspecialgym/';  
        break;
    default:
		$menu = $model->getLastFileUploaded('other','calendar-menu');     
		$facebook = 'https://www.facebook.com/specialcalendar2022';
		$linkedin = 'https://www.linkedin.com/company/specialcalendar';
		$instagram = 'https://www.instagram.com/specialcalendar/';   
    break;
}   


$structure = $model->getLastFileUploaded('other','footer');  


?>
<footer id="footer">
	<div class="container">
		<div class="footer-ribbon">
			<span><?=  Yii::t('app', 'footer_label') ?></span>
		</div>
		<div class="row py-5 my-4">
			<div class="col-md-6 col-lg-3 mb-5 mb-lg-0 align-items-center">
				<h5 class="text-4 text-color-light mb-3"><?= Yii::t('app', 'footer_category_contact_info') ?></h5>
				<ul class="list list-unstyled">					
					<li class="pb-1 mb-2">
						<span class="d-block font-weight-normal line-height-1 text-color-light"><?= Yii::t('app', 'footer_subcategory_contact_info_email') ?></span>
						<a href="mailto:mail@example.com"><?= Yii::t('app', 'footer_category_contact_info') ?></a>
					</li>
					<li class="pb-1 mb-2">
						<span class="d-block font-weight-normal line-height-1 text-color-light"><?= Yii::t('app', 'footer_subcategory_contact_info_working_days') ?></span>
						<?= Yii::t('app', 'footer_subcategory_contact_info_schedule') ?> 
					</li>
					<!--
					<li class="pb-1 mb-2">
						<ul class="social-icons social-icons-big social-icons-dark-2">
							<li class="social-icons-facebook"><a href="<?= $facebook  ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
							<li class="social-icons-linkedin"><a href="<?= $linkedin  ?>" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
							<li class="social-icons-instagram"><a href="<?= $instagram  ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
							
						</ul>
					</li>
-->
				</ul>			
			</div>
			<div class="col-md-6 col-lg-3 mb-5 mb-lg-0 align-items-center">
				<h5 class="text-4 text-color-light mb-3"><?= Yii::t('app', 'footer_category_menu') ?></h5>
				<ul class="list list-unstyled mb-0">
					<?php foreach ($menu['menu'] as $menucategory): ?> 
						<li class="mb-0">
							<a href="<?= str_replace('/frontend/web', '', 
								(($menucategory['url']== 'site/home') ? Url::home() : Url::toRoute($menucategory['url']))) ?>"><?= Yii::t('app', $menucategory['title']) ?>
							</a>
						</li>	
					<?php endforeach; ?>   		
				</ul>
			</div>

			<div class="col-md-6 col-lg-3 mb-5 mb-lg-0 align-items-center">
				<h5 class="text-4 text-color-light mb-3"><?= Yii::t('app', 'footer_category_usefull_links') ?></h5>
				<ul class="list list-unstyled mb-0">
					<li class="mb-0"><a href="<?= str_replace('/frontend/web', '',Url::toRoute('/sitemap')) ?>"><?= Yii::t('app', 'footer_category_usefull_links_sitemap') ?></a></li>
					<li class="mb-0"><a href="<?= str_replace('/frontend/web', '',Url::toRoute('/faqs')) ?>"><?= Yii::t('app', "footer_category_usefull_links_faqs") ?></a></li>
					<li class="mb-0"><a href="<?= str_replace('/frontend/web', '',Url::toRoute('/privacy-policy')) ?>"><?= Yii::t('app', 'footer_category_usefull_links_privacy_policy') ?></a></li>
					<li class="mb-0"><a href="<?= str_replace('/frontend/web', '',Url::toRoute('/coockies')) ?>"><?= Yii::t('app', 'footer_category_usefull_links_coockies') ?></a></li>
					<li class="mb-0"><a href="<?= str_replace('/frontend/web', '',Url::toRoute('/gdpr')) ?>"><?= Yii::t('app', 'footer_category_usefull_links_gdpr') ?></a></li>		
					<li class="mb-0"><a href="<?= str_replace('/frontend/web', '',Url::toRoute('/terms-and-conditions')) ?>"><?= Yii::t('app', 'footer_category_usefull_links_terms') ?></a></li>		
					<li class="mb-0"><a href="<?= str_replace('/frontend/web', '',Url::toRoute('/site/signup-reseller')) ?>"><?= Yii::t('app', 'footer_category_usefull_affiliate_program') ?></a></li>
				</ul>
			</div>	
			<style>
				.form-style-10 {
					background-color: rgba(255, 255, 255, 0.05);				
					height: auto;
					padding: 8px 24px;
					padding: 0.5rem 1.5rem;
					color: #bfbfbf;
					font-size: 0.85rem;
    				line-height: 2.85;
					border: 1px;
				}
			</style>
			<div class="col-md-6 col-lg-3 align-items-center">
				<h5 class="text-4 text-color-light mb-3"><?= Yii::t('app', 'footer_category_subscribe') ?></h5>
				<p class="mb-2"><?= Yii::t('app', 'footer_category_subscribe_text') ?></p>
					<button class="btn btn-primary  btn-px-4 btn-py-2 font-weight-bold mt-3" data-bs-toggle="modal" data-bs-target="#defaultModal">
						<?= Yii::t('app', 'subscribe_button') ?>
					</button>
					<div class="modal fade <?= Yii::$app->session->getFlash('show');?>" id="defaultModal" tabindex="-1" aria-labelledby="defaultModalLabel" style="<?= Yii::$app->session->getFlash('display');?>" aria-hidden="true">
						<div class="modal-dialog ">
							<div class="modal-content ">
								<div class="modal-header">
									<h4 class="modal-title text-color-dark font-weight-normal" id="defaultModalLabel">
										<?= Yii::t('app', 'footer_category_subscribe') ?>
									</h4>
									<?= 
										Html::a(
										'x',                          
										Yii::$app->request->referrer,
											['class' => 'btn-close']
										) 
									?>  				
								</div>
								<?php $form = ActiveForm::begin(); ?>	
									<div class="modal-body my-3">									
										<div class="row">											
											<div class="col-lg-6">
												<?= $form->field($modelSubscriber, 'first_name')->textInput()->label(Yii::t('app', 'first_name')) ?>						
											</div>
											<div class="col-lg-6">
												<?= $form->field($modelSubscriber, 'last_name')->textInput()->label(Yii::t('app', 'last_name')) ?>						
											</div>
											<div class="col-lg-12">
												<?= $form->field($modelSubscriber, 'email')->textInput()->label(Yii::t('app', 'email')) ?>						
											</div>
											<div class="col-lg-12">
												<?= $form->field($modelSubscriber, 'opt_in')->checkBox(
													['label' => Yii::t('app', "signup_block_validation_newsletter") ]
													)->label(false)  ?>                 
											</div>
										</div>			
									</div>
									<div class="modal-footer">
										<?= Html::submitButton(Yii::t('app', 'subscribe_button'), ['class' => 'btn btn-primary']) ?>	
										<?= 
											Html::a(
											Yii::t('app','close_button'),                          
											Url::home(),
												['class' => 'btn btn-light']
											) 
										?>  							
									</div>
								<?php ActiveForm::end(); ?>
							</div>
						</div>
					</div>
			
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container py-2">
			<div class="row py-6">			
				<a  href="<?= str_replace('/frontend/web', '',Url::home()) ?>" class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
					<?= Helpers::logoHeader(6) ?>
				</a>			
				<div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">
					<p><?= Yii::t('app', 'footer_copywrite') ?> </p>
				</div>
			</div>
		</div>
	</div>
</footer>

