<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\URL;
use common\Helpers\Helpers;

?>	
<div class="mt-5"></div>
<footer id="footer">
	<div class="footer-copyright">
		<div class="container py-5">
			<div class="row py-6">				
				<div class="col-lg-12  text-center">
					<?= Yii::t('app','developed_by') ?>			
				<div>		
				<div class="col-lg-12 text-center">
					<a  href="<?= str_replace('/frontend/web', '', Url::home())  ?>" >
						<?= Helpers::logoHeader(6) ?>
					</a>
					<p>
						<?= Yii::t('app', 'footer_copywrite') ?> 
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>
