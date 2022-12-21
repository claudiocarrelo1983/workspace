<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;

?>

<nav class="header-nav-top">							         
	<?php if (!Yii::$app->user->isGuest) { ?>                                
		<span class="white-text  text-center">
			<div class="d-block d-lg-none">
				<i class="fas fa-user ms-1"> </i>
			</div>
			<div class="d-none d-lg-block">
				<i class="fas fa-user ms-1"> </i>
				<span class="m-1">					
					<?= Yii::$app->user->identity->username  ?>
				</span>
			</div>		
		</span>             
		<!-- 
		<span class="m-2">|</span>                                 
		<?= Html::a(
			Yii::t('app', '	
			<div class="d-block d-lg-none">Training</div>
			<div class="d-none d-lg-block">My Training</div>
			'), 
			Url::toRoute('client/index'),     
			[
			'class' => 'white-text text-center',
			'data-hash' => '',         
			'data-hash-offset' => 0,  
			'data-hash-offset-lg' => 130,  
			]      
		) ?>
		-->
		<span class="m-2">|</span>   	                              
		<?= Html::a(
			Yii::t('app', '
			<div class="d-block d-lg-none">CPanel</div>
			<div class="d-none d-lg-block">Control Panel</div>
			'), 
			Url::toRoute('admin/dashboard'),     
			[
			'class' => 'white-text text-center',
			'data-hash' => '',         
			'data-hash-offset' => 0,  
			'data-hash-offset-lg' => 130,  
			]      
		) ?>
		<span class="m-2">|</span>                               
		<?=                                            
		Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
		. Html::submitButton(
			'Logout',
			['class' => 'btn-link logout white-text']
		)
		. Html::endForm()
		?>  

	<?php }  ?>

</nav>	
