<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\URL;

?>	
<footer id="footer" class="bg-color-dark-scale-2 border border-end-0 border-start-0 border-bottom-0 border-color-light-3 mt-5 ">
	<div class="footer-copyright">
		<div class="container py-5">
			<div class="row py-6">			
				<a  href="<?= str_replace('/frontend/web', '', Url::home())  ?>" class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
					<span class="text-color-light font-weight-normal text-6 mb-2 mt-2">My</span>
					<span class="text-color-light font-weight-extra-bold text-6 mb-2 mt-2">Special</span>
					<span class="font-weight-extra-bold blue-lettering text-6 mb-2 mt-2">Gym</span>	
				</a>			
				<div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">
					<p><?= Yii::t('app', '© Copyright 2021. All Rights Reserved.') ?> </p>
				</div>
			</div>
		</div>
	</div>
</footer>