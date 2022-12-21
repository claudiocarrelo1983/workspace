<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use Yii;


?>
<table class="table table-editable table-nowrap align-middle table-edits">
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
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-danger">Kg</button>
                    <button type="button" class="btn btn-danger">Lbs</button>                                                  
                </div>                                            
            </td>                                          

            <td style="width: 100px">
                <button type="button" class="btn btn-primary btn-block">Add</button>
            </td>
        </tr>                                             
    </tbody>
</table>  


