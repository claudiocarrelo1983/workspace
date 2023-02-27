<?php

use yiier\chartjs\ChartJs;
/* @var $this yii\web\View */


?>

<div class="container">
<?= ChartJs::widget([
						'type' => 'line',
						
						'options' => [
							'height' => 320,
							'width' => 400,	
							'legend' => [	
								'position'=> 'bottom',
								'display'=> 'false'		
							],													
						],										
						'data' => [
							'labels' => [
									Yii::t('app','Fat'),
									Yii::t('app','Carbs'),
									Yii::t('app','Protein'),
                                    Yii::t('app','Protein'),
                                    Yii::t('app','Protein')
								],
							'datasets' => [
								[
								
									'label'=> '# of Votes',
									'data' => [65, 59, 80, 81, 56, 55, 40],
									'colors'=> ['#e0440e', '#e6693e', '#ec8f6e']
								]
							]
						],
						'clientOptions' => [
							'legend' => [
								'display' => true,
								'position' => 'bottom',
							]
						]

					]);?>	
</div>                    