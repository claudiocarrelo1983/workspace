<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\URL;
use common\Helpers\Helpers;

?>	
<footer id="footer" class="bg-color-dark-scale-2 border border-end-0 border-start-0 border-bottom-0 border-color-light-3 ">
	<div class="footer-copyright">
		<div class="container py-5">
			<div class="row py-6">				
				<div class="col-lg-12  text-center">Developed by<div>		
				<div class="col-lg-12 text-center">
					<a  href="<?= str_replace('/frontend/web', '', Url::home())  ?>" >
						<?= Helpers::logoHeader(6) ?>
					</a>

					<p><?= Yii::t('app', '© Copyright 2021. All Rights Reserved.') ?> </p>
				</div>
			</div>
		</div>
	</div>
</footer>