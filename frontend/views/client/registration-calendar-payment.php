<?php

use yii\db\Query;

$query = new Query;

$company = Yii::$app->request->get('company');

$companyLocations = $query->select('*')
            ->from(['company_locations'])
            ->where(
                [
                   'company_code' => $company,
                   'active' => 1              
                ])         
            ->all();


$teamArr = $query->select('*')
            ->from(['team'])
            ->where(
                [
                   'company_code' => $company,
                   'active' => 1              
                ])         
            ->all();


         
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


$servicesCatArr = $query->from(['sc' => 'services_category'])
        ->select([
            'sc.category_code',
            'page_code_sc_title'  => 'sc.page_code_title',
            'services_category_title' => 'sc.page_code_title',
            ])
        ->where(['sc.company' => $company])
        ->orderBy(['sc.order'=>SORT_ASC])
        ->all();

        
$myData = '';

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

?>


<?php if(isset($companyArr[0]['color'])) {
        if(!empty($companyArr[0]['color'])){ 
?>
    <style>
        .featured-primary-custom{
            border-top-color: <?= $companyArr[0]['color'] ?> !important;
            border-top: 3px solid <?= $companyArr[0]['color'] ?> !important;
        }

        .btn-primary{
            background-color: <?= $companyArr[0]['color'] ?> !important;
            border-color: <?= $companyArr[0]['color'] ?> !important;
        }

        .list.list-icons.list-icons-style-3 li > [class*="fa-"]:first-child, .list.list-icons.list-icons-style-3 li a:first-child > [class*="fa-"]:first-child, .list.list-icons.list-icons-style-3 li > .icons:first-child, .list.list-icons.list-icons-style-3 li a:first-child > .icons:first-child{
            background-color: <?= $companyArr[0]['color'] ?> !important;
        }
        .btn-link{
            color: <?= $companyArr[0]['color'] ?> !important;
        }
        .dropdown-reverse:hover > a{
            color: <?= $companyArr[0]['color'] ?> !important;
        }
    </style>
<?php }
} ?>



<?= $this->render('/client/registration-calendar-header', ['myData' => $myData, 'company' => $company, 'logo' => ((isset($companyArr[0]['path'])) ? $companyArr[0]['path'].$companyArr[0]['image'] : '')]); ?>

<div id="examples" class="container pt-3 pb-5">    
    <div class="row ">
        <div class="col  text-center"> 
            <div class="featured-box featured-box-primary text-start mt-0">
                <div class="box-content px-3 pt-5">
                    <!-- Localização -->
                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-0 pb-4">
                        Escolha Localização
                    </h4>                 
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                            <div class="custom-select-2">
                                <select class="form-select mb-3" data-msg-required="Please select a city." name="city" required onchange="displayTeam(this);">
                                    <option value="">Choose...</option>
                                    <?php foreach($companyLocations as $key => $location): ?>           
                                        <option value="<?= $location['location_code'] ?>">
                                            <?= $location['full_name'] ?> (<?= $location['city'] ?>)
                                        </option>  
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>                 
                    </div>     
                    <!--End Localização -->                                                      
                </div>     
                <div class="px-3">                   
                    <?= $this->render('/client/registration-calendar-payment-marcacao', ['teamArr' => $teamArr, 'companyArr' => $companyArr]); ?>  
                </div>           
                <div>
                    <?= $this->render('/client/registration-calendar-payment-services', ['teamArr' => $teamArr, 'companyArr' => $companyArr]); ?>                          
                </div>                     
                <div class=" justify-content-end my-3 mx-3 text-right">
                    <input type="submit" value="Salvar" class="btn btn-primary btn-modern " data-loading-text="Loading...">
                </div>                         
            </div>   
                   
        </div>
    </div>
</div>


