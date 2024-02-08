<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;

?>

<nav class="header-nav-top">							         
	<?php
 
 	//&& Yii::$app->user->identity->first_name == 'admin'
	    if (!Yii::$app->user->isGuest && Yii::$app->user->identity->first_name == 'admin') { ?>                                
		<span class="white-text  text-center">
			<div class="d-block d-lg-none">
				<i class="fas fa-user ms-1"> </i>
			</div>
			<div class="d-none d-lg-block">
				<i class="fas fa-user ms-1"> </i>
				<span class="m-1">					
					<?= Yii::$app->user->identity->first_name ?>
				</span>
			</div>		
		</span>                              
			<?= Html::a(
				'<div class="d-block d-lg-none">'.Yii::t('app', 'training_small').'</div>'.
				'<div class="d-none d-lg-block">'.Yii::t('app', 'training_big').'</div>',
				Url::toRoute('client/index'),
				[
					'class' => 'white-text text-center',
					'data-hash' => '',
					'data-hash-offset' => 0,
					'data-hash-offset-lg' => 130,
				]
			) ?>
	
		<span class="m-2">|</span>  		
	
			<?= Html::a(
				'<div class="d-block d-lg-none">'.Yii::t('app', 'cpanel_small').'</div>'.
				'<div class="d-none d-lg-block">'.Yii::t('app', 'cpanel_big').'</div>',
				Url::toRoute('/dashboard'),
				[
					'class' => 'white-text text-center',
					'data-hash' => '',
					'data-hash-offset' => 0,
					'data-hash-offset-lg' => 130,
				]
			) ?>

		<span class="m-2">|</span>                               
		<?=
		    	Html::beginForm(        
					str_replace('/frontend/web', '',Url::toRoute('site/logout')), 
					'post', ['class' => 'form-inline'])
					. Html::submitButton(
		    		Yii::t('app', 'login_logout'),
		    		['class' => 'btn-link logout white-text']
		    	)
		    	. Html::endForm()
    	?>  


	<?php } else { ?>
	
		<span class="m-2">|</span>   
		<?= Html::a(
		    	Yii::t('app', 'Login'),
		    	Url::toRoute('site/login'),
		    	[
		    		'class' => 'white-text',
		    		'data-hash' => '',
		    		'data-hash-offset' => 0,
		    		'data-hash-offset-lg' => 130,
		    	]
		    ) ?>
		<span class="m-2">|</span>   
		<?= Html::a(
		    	Yii::t('app', 'register'),
		    	Url::toRoute('site/signup-client'),
		    	[
		    		'class' => 'white-text',
		    		'data-hash' => '',
		    		'data-hash-offset' => 0,
		    		'data-hash-offset-lg' => 130,
		    	]
		    ) ?>
		<span class="m-2">|</span>   


	<?php }  ?>
</nav>	
