<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';

?>


<div class="header-container container">
	<div class="header-row">
			
			<?= Html::a(
                    Yii::t('app',
                    '<div class="header-row">
						<div class="header-logo">							
								<span class="text-color-light font-weight-normal text-8 mb-2 mt-2">My </span>
								<span class="text-color-light font-weight-extra-bold text-8 mb-2 mt-2">Special</span>
								<span class="font-weight-extra-bold blue-lettering text-8 mb-2 mt-2">Gym</span>						
						</div>
					 </div>'),
                    Url::home(),     
                    [
                    'class' => 'logo-url',
                    'data-hash' => '',         
                    'data-hash-offset' => 0,  
                    'data-hash-offset-lg' => 130,  
                    ]      
                ) ?>

		<div class="header-column justify-content-end">
			<div class="header-row">
				<div class="header-nav header-nav-line header-nav-bottom-line header-nav-bottom-line-no-transform header-nav-bottom-line-active-text-light header-nav-bottom-line-effect-1 header-nav-light-text order-2 order-lg-1">
					<div class="header-nav-main header-nav-main-square header-nav-main-text-capitalize header-nav-main-text-size-3 header-nav-main-dropdown-no-borders header-nav-main-dropdown-border-radius header-nav-main-effect-2 header-nav-main-sub-effect-1">
						<?= $this->render('public-menu'); ?>
					</div>
					<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
						<i class="fas fa-bars"></i>
					</button>
				</div>	                                              			
			</div>
		</div>
	</div>
</div>

