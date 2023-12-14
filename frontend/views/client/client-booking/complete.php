<?php
use common\Helpers\Helpers;
use yii\helpers\Html;
use yii\helpers\Url;

$companyArr = Helpers::myCompanyArr();

/*
print"<pre>";
print_r($sheddule);
die();

Array
(
    [id] => 56
    [team_username] => A247E032-99D3-46CD-A941-36145D49BC01
    [client_username] => *
    [company_code] => c20231025112035791
    [location_code] => clc20231025112035791
    [service_code] => s20231013141935432
    [service_name] => Corte e Cabelo
    [canceled] => 0
    [confirm] => 0
    [full_name] => Claudio Carrelo
    [contact_number] => 967235820
    [email] => claussssdio@gmai.com
    [nif] => 
    [date] => 2023-11-09
    [time] => 11:15:00
    [paid] => 
    [cost] => 
    [username_guid] => 
    [created_date] => 2023-11-09 12:17:55
)
*/

?>


<?= $this->render('@frontend/views/client/page/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr]); ?>

<div class="py-5"></div>  

<div id="examples" class="container  pb-5">

    <?= $this->render('@frontend/views/client/client-booking/links'); ?>

    <?= $this->render('@frontend/views/client/client-booking/steps', ['type' => 'complete']); ?>

    <div class="px-3">
        <?php //$this->render('/client/page/services', ['companyArr' => $companyArr]); ?>
    </div>

    <div class="row ">   
        <div class="col  text-center"> 
            <div class=" box-content featured-box  text-start mt-0"> 
				<div class=" p-3">       
					<div class="row ">
						<div class="col-6 p-4">    
							<ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 w-100  ">  
								<li>
									<?=
										Html::a(
											Yii::t('app','book_again'),                                           
											Url::toRoute(
												array_merge(
														['/choose-location', 'code' => Yii::$app->request->get('code')],
														[    
															'location' => '*',
															'team' => '*',
															'service' => '*',           
															'day' => '*',
															'time' => '*',              
														]
													)
											),
											['class' =>  'input-group-text text-decoration-none text-color-dark text-color-hover-primary text-4 float-right']
										)
									?>                          
								</li>   
							</ul>
						</div>                         
					</div>  
					<div class="row justify-content-center">
							<div class="col-lg-9 my-3 py-3">
								<div class="card border-width-3 border-radius-0 border-color-success">
									<div class="card-body text-center">
										<p class="text-color-dark font-weight-bold text-4-5 mb-0"><i class="fas fa-check text-color-success me-1"></i> 
											A sua marcação foi efetuada com sucesso e foi-lhe enviado um email com a confirmação.
										</p>
									</div>
								</div>
								<div class="card border-width-3 border-radius-0 border-color-hover-dark mb-4  py-3 px-4 my-4">
									<div class="card-body">
										<h4 class="font-weight-bold text-uppercase text-4 mb-3">
											<?= Yii::t('app','your_booking') ?>
										</h4>
										<div class="row border-bottom ">
											<div class="col-lg-4 py-3">
												<strong class="d-block text-color-dark font-weight-semibold">
													Full Name:
												</strong>		
												<span class="text-color-dark">
													<?= $sheddule['full_name'] ?>	
												</span>	
											</div>
											<div class="col-lg-4 py-3">
												<strong class="d-block text-color-dark font-weight-semibold">
													Contact Number:
												</strong>		
												<span class="text-color-dark">
													<?= $sheddule['contact_number'] ?>	
												</span>	
											</div>
											<div class="col-lg-4 py-3">
												<strong class="d-block text-color-dark font-weight-semibold">
													Email:
												</strong>		
												<span class="text-color-dark">
													<?= $sheddule['email'] ?>	
												</span>	
											</div>									
										</div>
										<div class="row my-3 py-3">
											<div class="col-lg-6">
												<strong class="text-color-dark text-5">
													<?= Yii::t('app',$sheddule['service_name']) ?>
												</strong>	
											</div>
											<div class="col-lg-6 text-right">	
												<span class="text-color-dark text-5">
													<?= $sheddule['price'] ?> 
												</span>
											</div>									
										</div>																		
									</div>
								</div>						
							</div>
						</div>   
					</div>                          
            	</div>    
			</div>
		</div>
	</div>
</div>





   