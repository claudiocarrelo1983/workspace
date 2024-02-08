
<?php
use yii\helpers\Html;
use kartik\date\DatePicker;


?>

<div class="col-lg-12 text-center py-2 ">   

    <?php

        $layoutMobile = '';       
    
        $layoutMobile .= '<span class="input-group-text text-5">';
      
        $layoutMobile .= Html::button(                            
                        '<i class="	fas fa-angle-double-left"></i>',
                        [   
                            'value' => $oneLessDay,
                            'onclick' => 'buttonDateBookingAjax(this)',                                                  
                            'class' => 'btn w-100  text-2 text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                        ]                        
                    );        

        $layoutMobile .= '</span>';
     
        $layoutMobile .= '{picker}{input}';
 
        $layoutMobile .= '<span class="input-group-text text-5">';
    
        $layoutMobile .= Html::button(                     
                            '<i class="	fas fa-angle-double-right"></i>', 
                            [                                   
                                'value' => $oneMoreDay,
                                'onclick' => 'buttonDateBookingAjax(this)',                                                  
                                'class' => 'btn w-100  text-2 text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                            ]
                        );
        $layoutMobile .= '</span>';   


        $layoutDesktop = '';

        $layoutDesktop .= '<span class="input-group-text text-5">';

        $layoutDesktop .= Html::button(
                            '<i class="	fas fa-angle-double-left"></i>',
                        [   
                            'value' => $oneLessDay,
                            'onclick' => 'buttonDateBookingAjax(this)',                                                  
                            'class' => 'btn w-100  text-2 text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                        ]
                    );
    

        $layoutDesktop .= '</span>';
  
        $layoutDesktop .= '{picker}{input}';
        
        $layoutDesktop .= '<span class="input-group-text">';

        $layoutDesktop .= Html::button(
                    Yii::t('app','today'),
                    [                     
                        'value' => date('Y-m-d'),
                        'onclick' => 'buttonDateBookingAjax(this)',                                                  
                        'class' => 'btn w-100  text-2 text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                    ]
                );
        $layoutDesktop .= '</span>';
         
        $layoutDesktop .= '<span class="input-group-text text-5">';
    
        $layoutDesktop .= Html::button(                   
                        '<i class="	fas fa-angle-double-right"></i>',
                        [                          
                            'value' => $oneMoreDay,
                            'onclick' => 'buttonDateBookingAjax(this)',                                                  
                            'class' => 'btn w-100  text-2 text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                        ]
                    );
                    
        $layoutDesktop .= '</span>';  
     
    ?>


    <span class="d-md-none">
        <?= DatePicker::widget([
                //'model' => $model,                                                                                                      
                'name' => 'Sheddule[date]',    
                'id' => 'date-calendar-search1',                
                'size' => 'lg',
                //'removeButton' => false,
                'layout' => $layoutMobile, 
                'value' => date('d-m-Y', strtotime($day)),
                'options' => [    
                    'data-date' => 'normal',                            
                    'placeholder' => 'Select date...',
                    'class' => ' form-control text-4 h-auto py-1 ',
                    'onchange' => 'buttonDateBookingAjax(this)',
                ],
                'pluginOptions' => [  
                    'autoclose' => true,           
                    'format' => 'dd-mm-yyyy',
                    'todayHighlight' => true,
            
                ]                   
            ]);                         
        ?> 
    </span>


     
    <span class="d-none d-sm-none d-md-block">
        <?= DatePicker::widget([
                //'model' => $model,                                                                                                      
                'name' => 'Sheddule[date]',    
                'id' => 'date-calendar-search2', 
                'size' => 'lg',
                //'removeButton' => false,
                'layout' => $layoutDesktop, 
                'value' => date('d-m-Y', strtotime($day)),
                'options' => [   
                    'data-date' => 'normal',              
                    'placeholder' => 'Select date...',
                    'class' => ' form-control text-4 h-auto py-1 ',                       
                    'onchange' => 'buttonDateBookingAjax(this)',
                ],
                'pluginOptions' => [  
                    'autoclose' => true,           
                    'format' => 'dd-mm-yyyy',
                    'todayHighlight' => true,
            
                ]                   
            ]);                         
        ?> 
    </span>                           
</div>

