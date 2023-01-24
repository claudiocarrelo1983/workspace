<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;

?>


<nav class="header-nav-top">	
				         
	<?php if (!Yii::$app->user->isGuest) { ?>                                
		<span class="white-text  text-center ">
			<div class="d-block d-lg-none ">
				<i class="fas fa-user ms-1"> </i>
				<?= Yii::$app->user->identity->username  ?>
			</div>
			<div class="d-none d-lg-block">
				<i class="fas fa-user ms-1 "> </i>
				<span class="m-1">					
					<?= Yii::$app->user->identity->username  ?>
				</span>
			</div>		
		</span>             
		<!-- 
		<span class="m-2">|</span>                                 
		
		-->
		<span class="m-2">|</span>   	                              
		<span class="d-block d-lg-none ">                       
			<?=                                            
				Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
				. Html::submitButton(
					'Logout',
					['class' => 'btn-link logout white-text']
				)
				. Html::endForm()
			?>  
		</span>
		<span class="d-none d-lg-block pr-3">
			<?=                                            
				Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
				. Html::submitButton(
					'Logout',
					['class' => 'btn-link logout white-text']
				)
				. Html::endForm()
			?>  
		</span>

	<?php }  ?>

</nav>	
