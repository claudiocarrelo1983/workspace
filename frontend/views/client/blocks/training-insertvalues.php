<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use Yii;


?>


<div class="row">                                                
    <div class="col-md-3">
        <div class="mb-3 ">
            <label for="formrow-email-input" class="form-label">Reps</label>
            <input class="form-control w-100" type="number" value="42" placeholder="Enter Number" id="example-number-input">
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3 ">
            <label for="formrow-password-input" class="form-label">Weight</label>
            <input class="form-control w-100" type="number" value="42" placeholder="Enter Number" id="example-number-input">
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3 pt-4 text-center ">
                <div class="btn-group " role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-danger ">Kg</button>
                    <button type="button" class="btn btn-danger">Lbs</button>                                                  
                </div> 
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3  text-center pt-4">
        <button type="submit" class="btn btn-primary btn-block w-100">
            Submit
        </button>
        </div>
    </div>
</div>