<?php

use yiier\chartjs\ChartJs;
use common\Helpers\Helpers;
/* @var $this yii\web\View */

?>

<div class="container">
	<div class="row">	
		<div class="col-md-12 col-sm-12 px-5">
			<h2><?= Yii::t('app','Food Intake') ?></h2>	
			<table class="table">
										<thead>
											<tr>
												<th>
													#
												</th>
												<th>
													First Name
												</th>
												<th>
													Last Name
												</th>
												<th>
													Username
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													1
												</td>
												<td>
													Mark
												</td>
												<td>
													Otto
												</td>
												<td>
													@mdo
												</td>
											</tr>
											<tr>
												<td>
													2
												</td>
												<td>
													Jacob
												</td>
												<td>
													Thornton
												</td>
												<td>
													@fat
												</td>
											</tr>
											<tr>
												<td>
													3
												</td>
												<td>
													Larry
												</td>
												<td>
													the Bird
												</td>
												<td>
													@twitter
												</td>
											</tr>
										</tbody>
									</table>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>								
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<strong>Name</strong>
							</td>
							<td>
								Claudio Carrelo
							</td>										
						</tr>
						<tr>
							<td>
								<strong>Height</strong>
							</td>
							<td>
								1.85cm / 6.069 ft
							</td>									
						</tr>
						<tr>
							<td>
								3
							</td>
							<td>
								Larry
							</td>									
						</tr>
					</tbody>
				</table>
		</div>
		<div class="col-md-12 col-sm-12">
			<h2><?= Yii::t('app','Food Intake') ?></h2>
			<div class="tabs tabs-dark mb-4 pb-2">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#week" data-bs-toggle="tab">
							<?= Yii::t('app','Week') ?>					
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-1 font-weight-bold text-uppercase" href="#month" data-bs-toggle="tab">
							<?= Yii::t('app','Month') ?>		
						</a>
					</li>  
				
					<li class="nav-item">
						<a class="nav-link text-1 font-weight-bold text-uppercase" href="#all" data-bs-toggle="tab">
							<?= Yii::t('app','Year') ?>		
						</a>
					</li>       
				</ul>
				<div class="tab-content">
					<div class="tab-pane active py-2" id="week"> 
						<div class="row">
							<div class="col-md-6 col-sm-12 p-3">
								<?= Helpers::bars($foodIntake['week']) ?>
							</div>
							<div class="col-md-6 col-sm-12 p-3">
								<?= Helpers::lines($foodIntake['week']) ?>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="month"> 
						<div class="row">
							<div class="col-md-6 col-sm-12 p-3">
								<?= Helpers::bars($foodIntake['month'], 'bar') ?>
							</div>
							<div class="col-md-6 col-sm-12 p-3">						
								<?= Helpers::lines($foodIntake['month']) ?>		
							</div>
						</div>			
					</div>				
					<div class="tab-pane" id="all"> 
						<div class="row">
							<div class="col-md-6 col-sm-12 p-3">
								<?= Helpers::bars($foodIntake['all'], 'bar') ?>
							</div>
							<div class="col-md-6 col-sm-12 p-3">
								<?= Helpers::lines($foodIntake['all']) ?>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<div class="col-4">
			</div>
		</div>
	</div> 

	<h2><?= Yii::t('app','Weight') ?></h2>
</div>        


<div class="container">
	<div class="row">   
		<div class="tabs tabs-dark mb-4 pb-2">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-bs-toggle="tab">
						<?= Yii::t('app','Weight') ?>					
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-bs-toggle="tab">
						<?= Yii::t('app','Macros') ?>		
					</a>
				</li>      
			</ul>
			<div class="tab-content">
				<div class="tab-pane active p-5" id="popularPosts"> 
					<?= ChartJs::widget([
						'type' => 'line',
						
						'options' => [
							'responsive' => true,
							'height' => 200,
							'width' => 400,	
							'legend' => [	
								'position'=> 'top',
								'display'=> true		
							],													
						],										
						'data' => [
							'labels' => [
								Yii::t('app','Jan'),
								Yii::t('app','Fev'),
								Yii::t('app','Fev'),
								Yii::t('app','Fev'),
								Yii::t('app','Apr')
							],
							'datasets' => [
								[					
									'fill' => false,
									'backgroundColor' => 'none',
									'label'=> 'Weight',
									'borderColor' => "#176BEF",
									'data' => [1, 23, 3, 4, 5, 6, 7]									
								],
								[
									'fill' => false,
									'label'=> 'Gym',
									'borderColor' => "#ff3E30",
									'data' => [2, 3, 4, 5, 6, 7, 8]					
								],
								[
									'fill' => false,
									'label'=> 'Calories',
									'borderColor' => "#179c52",
									'data' => [22, 3, 4, 5, 63, 7, 8]					
								]
							]
						],
						'clientOptions' => [
							'legend' => [
								'display' => true,
								'position' => 'top',
							]
						]

					]);?>
				</div>
				<div class="tab-pane" id="recentPosts"> 
					<?= ChartJs::widget([
						'type' => 'bar',
						
						'options' => [
							'responsive' => true,
							'height' => 200,
							'width' => 400,	
							'legend' => [	
								'position'=> 'top',
								'display'=> true		
							],	
							'scales' => [
								'x' => [
									'stacked' => true
								],
								'y' => [
									'stacked' => true
								]
							]												
						],										
						'data' => [
							'labels' => [
								Yii::t('app','Jan'),
								Yii::t('app','Fev'),
								Yii::t('app','Mar'),						
							],
							'datasets' => [
								[		
									'type' => 'bar',						
									'stacked' => true,			
									'fill' => false,
									'backgroundColor' => '#176BEF',
									'label'=> 'Protein',		
									'data' => [2, 5, 3]									
								],
								[
									'fill' => false,
									'stacked' => true,	
									'label'=> 'Fats',
									'backgroundColor' => '#ff3E30',							
									'data' => [4, 3, 4]					
								],
								[
									'fill' => false,
									'stacked' => true,	
									'label'=> 'Lipids',
									'backgroundColor' => '#179c52',				
									'data' => [3, 6, 4]					
								]
							]
						],
						'clientOptions' => [
							'legend' => [
								'display' => true,
								'position' => 'top',
							]
						]

					]);?>
				</div>
			</div>
		</div>
	</div>
</div>                    