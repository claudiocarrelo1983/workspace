
<?php
use yii\helpers\Html;
use kartik\date\DatePicker;


?>

<div class="col-lg-12 text-center ">   

    <?php

        $layoutMobile = '';       
    
        $layoutMobile .= '<span class="input-group-text text-5">';
      
        $layoutMobile .= Html::button(                            
                        '<i class="	fas fa-angle-double-left"></i>',
                        [   
                            'value' => $oneLessDay,
                            'data-username' => $username,  
                            'data-url' => $url,     
                            'onclick' => 'getSchedduleTeamAjax(this)',                                                  
                            'class' => 'btn w-100  text-2 text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                        ]                        
                    );        

        $layoutMobile .= '</span>';
     
        $layoutMobile .= '{input}';
 
        $layoutMobile .= '<span class="input-group-text-2 text-5">';
    
        $layoutMobile .= Html::button(                     
                            '<i class="	fas fa-angle-double-right"></i>', 
                            [                                   
                                'value' => $oneMoreDay,
                                'data-username' => $username,  
                                'data-url' => $url,     
                                'onclick' => 'getSchedduleTeamAjax(this)',                                                  
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
                            'data-username' => $username,  
                            'data-url' => $url,     
                            'onclick' => 'getSchedduleTeamAjax(this)',                                                  
                            'class' => 'btn w-100  text-2 text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                        ]
                    );
    

        $layoutDesktop .= '</span>';
  
        $layoutDesktop .= '{picker}{input}';
        
        $layoutDesktop .= '<span class="input-group-text">';

        $layoutDesktop .= Html::button(
                    Yii::t('app','today'),
                    [                     
                        'value' => date('d-m-Y'),
                        'data-username' => $username, 
                        'data-url' => $url,      
                        'onclick' => 'getSchedduleTeamAjax(this)',                                                  
                        'class' => 'btn w-100  text-2 text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                    ]
                );
        $layoutDesktop .= '</span>';
         
        $layoutDesktop .= '<span class="input-group-text text-5">';
    
        $layoutDesktop .= Html::button(                   
                        '<i class="	fas fa-angle-double-right"></i>',
                        [                          
                            'value' => $oneMoreDay,
                            'data-username' => $username,
                            'data-url' => $url,       
                            'onclick' => 'getSchedduleTeamAjax(this)',                                                  
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
                    'data-url' => $url,    
                    'data-username' => $username,                        
                    'placeholder' => 'Select date...',
                    'class' => ' form-control text-4 h-auto py-1 text-center ',
                    'onchange' => 'getSchedduleTeamAjax(this)',
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
                    'data-username' => $username,   
                    'data-url' => $url,             
                    'placeholder' => 'Select date...',
                    'class' => ' form-control text-4 h-auto py-1 text-center',                       
                    'onchange' => 'getSchedduleTeamAjax(this)',
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

