<?php

/* @var $this yii\web\View */
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;


$this->title = 'Treino';
$this->params['breadcrumbs'][] = $this->title;

?>

<div role="main" class="main">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5">
                    <div class="small-title">Treino de Ganho Muscular</div>
                    <h4>My Training</h4>
                </div>
            </div>
        </div>

        <div class="row">
						<div class="col">

							<div class="tabs tabs-bottom tabs-center tabs-simple">
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link" href="#tabsNavigationSimple1" data-bs-toggle="tab">Pernas</a>
									</li>
									<li class="nav-item active">
										<a class="nav-link active" href="#tabsNavigationSimple2" data-bs-toggle="tab">Braço & Ombros</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabsNavigationSimple3" data-bs-toggle="tab">Costas</a>
									</li>									
								</ul>
								<div class="tab-content">
									<div class="tab-pane" id="tabsNavigationSimple1">
                                    <div class="text-center">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center mb-5">
                                            <div class="small-title">Treino de Ganho Muscular</div>
                                            <h4>Peito, Triceps & Ombro</h4>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                                    <div class="row">
                                <div class="col">             
                                    <div class="process process-vertical py-4">
                                        <?php 
                                        $i = 1;
                                        foreach($categorysteps as $key => $value){
                                        ?>
                                            <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                                <div class="process-step-circle">
                                                    <strong class="process-step-circle-content"><?= $i++ ?></strong>
                                                </div>
                                                <div class="process-step-content">
                                                    <h4 class="mb-1 text-4 font-weight-bold"><?= $value['title'] ?></h4>
                                                    <div class="row mt-3 mb-5">
                                                        <div class="col-md-6">
                                                            <h5 class="font-weight-bold">Last Values</h5>
                                                            <table class="table">
                                                                <thead>                                                            
                                                                    <tr style="cursor: pointer;">                                                                                                
                                                                        <th class="text-center">Reps</th> 
                                                                        <th></th>                                                 
                                                                        <th class="text-center">Weight</th>
                                                                        <th class="text-center">Metric</th> 
                                                                    </tr>
                                                                </thead>
                                                                <tbody>		
                                                                    <tr data-id="1" style="cursor: pointer;">                                                                                                  
                                                                        <td class="text-center" data-field="reps" style="width: 55.8px;"><input type="text" style="width: 40px;" maxlength="3"></td>  
                                                                        <td class="text-center">X</td>    
                                                                        <td class="text-center" data-field="qtd" style="width: 67.1px;"><input type="text" style="width: 40px;" maxlength="3"></td>                                          
                                                                        <td >
                                                                        <div class="row text-center">
                                                                                <div class="form-group col">
                                                                                    <div class="form-check form-check-inline">
                                                                                        <label class="form-check-label">
                                                                                            <input class="form-check-input" type="radio" name="radios" data-msg-required="Please select at least one option." id="tabContent9Radio1" value="option1" required=""> Kg
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <label class="form-check-label">
                                                                                            <input class="form-check-input" type="radio" name="radios" data-msg-required="Please select at least one option." id="tabContent9Radio2" value="option2" required=""> Lbs
                                                                                        </label>
                                                                                    </div>													
                                                                                </div>
                                                                            </div>                                          
                                                                        </td>                                          

                                                                        <td class="text-center" style="width: 100px">
                                                                    
                                                                        <a href="#" class="btn btn-success btn-circle"><i class="fa fa-check "></i>
                                                                    </a>
                                                                        </td>
                                                                    </tr>                                             
                                                                </tbody>
                                                            </table>
                                                            <div class="alert alert-danger">
                                                                Are you using happier.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h5 class="font-weight-bold">Last Values</h5>
                                                            <table class="table">
                                                                <thead>                                                            
                                                                    <tr style="cursor: pointer;">                                                                                                
                                                                        <th class="text-center">Reps</th> 
                                                                        <th></th>                                                 
                                                                        <th class="text-center">Weight</th>                                                    
                                                                    </tr>
                                                                </thead>
                                                                <tbody>		
                                                                    <tr data-id="1" style="cursor: pointer;">                                                                                                  
                                                                        <td class="text-center" data-field="reps" >
                                                                            12
                                                                        <td class="text-center">X</td>    
                                                                        <td class="text-center" data-field="qtd" >
                                                                            100Kg                                                                    
                                                                        </td>                                          
                                                                        <td style="width: 100px">   
                                                                                                                    
                                                                            <a href="#" class="btn btn-default btn-circle" data-bs-toggle="modal" data-bs-target="#formModal">
                                                                                <i class="fa fa-cog"></i>
                                                                            </a>                                                                            
                                                                            <a href="#" class="btn btn-secondary  btn-circle" data-bs-toggle="modal" data-bs-target="#formModalDelete">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>                                             
                                                                </tbody>
                                                            </table>                                    
                                                        </div>

                                                        <div class="col-md-6">
                                                            <h5 class="font-weight-bold">Last Values</h5>
                                                            <table class="table">
                                                                <thead>                                                            
                                                                    <tr style="cursor: pointer;">                                                                                                
                                                                        <th class="text-center">Reps</th> 
                                                                        <th></th>                                                 
                                                                        <th class="text-center">Weight</th>                                                    
                                                                    </tr>
                                                                </thead>
                                                                <tbody>		
                                                                    <tr data-id="1" style="cursor: pointer;">                                                                                                  
                                                                        <td class="text-center" data-field="reps" >
                                                                            12
                                                                        <td class="text-center">X</td>    
                                                                        <td class="text-center" data-field="qtd" >
                                                                            100Kg                                                                    
                                                                        </td>                                          
                                                                    </tr>                                             
                                                                </tbody>
                                                            </table>                                    
                                                        </div>
                                                </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active" id="tabsNavigationSimple2">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center mb-5">
                                            <div class="small-title">Treino de Ganho Muscular</div>
                                            <h4>Peito, Triceps & Ombro</h4>
                                        </div>
                                    </div>
                                </div>
                                dddd
                              </div>
                        </div>
                        <div class="tab-pane" id="tabsNavigationSimple3">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center mb-5">
                                            <div class="small-title">Treino de Ganho Muscular</div>
                                            <h4>Peito, Triceps & Ombro</h4>
                                        </div>
                                    </div>
                                </div>
                                ssss
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formModalLabel">Edit</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="demo-form" class="mb-4" novalidate="novalidate">
                <table class="table">
                            <thead>                                                            
                                <tr style="cursor: pointer;">                                                                                                
                                    <th class="text-center">Reps</th> 
                                    <th></th>                                                 
                                    <th class="text-center">Weight</th>
                                    <th class="text-center">Metric</th> 
                                </tr>
                            </thead>
                            <tbody>		
                                <tr data-id="1" style="cursor: pointer;">                                                                                                  
                                    <td class="text-center" data-field="reps" style="width: 55.8px;"><input type="text" style="width: 40px;" maxlength="3"></td>  
                                    <td class="text-center">X</td>    
                                    <td class="text-center" data-field="qtd" style="width: 67.1px;"><input type="text" style="width: 40px;" maxlength="3"></td>                                          
                                    <td >
                                    <div class="row text-center">
                                            <div class="form-group col">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="radios" data-msg-required="Please select at least one option." id="tabContent9Radio1" value="option1" required=""> Kg
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="radios" data-msg-required="Please select at least one option." id="tabContent9Radio2" value="option2" required=""> Lbs
                                                    </label>
                                                </div>													
                                            </div>
                                        </div>                                          
                                    </td>                                          
                                </tr>                                             
                            </tbody>
                        </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="formModalDelete" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formModalLabel">Delete</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete?           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>


