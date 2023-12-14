
<?php

    use yii\helpers\Html;


    echo Html::button(                                
        $values['hour'],                                                                
        [         
            'class' => 'btn w-100 btn-modern btn-lg btn-success rounded-0 mb-2 mt-2' ,
            'data-bs-toggle' => 'modal',    
            'data-bs-target' =>  '#client-create-'.$values['modal_code']                              
        ]
    );
    /*
    if(isset($values['confirm']) && $values['confirm'] == 0){                     

   
        /*
        if($values['team_username'] ==  $usernameValue){
            echo Html::button(                                
                $values['hour'],                                                                
                [         
                    'class' => 'btn w-100 btn-modern btn-lg '.(($values['canceled'] == '0') ? 'btn-success-disabled ' : 'btn-success').' rounded-0 mb-2 mt-2' ,
                    'data-bs-toggle' => 'modal',    
                    //'data-bs-target' =>  '#client-info-'.$usernameValue.'-'.$i                                
                ]
            );
        }else{
            echo Html::button(                                
                $values['hour'],                                                                
                [         
                    'class' => 'btn w-100 btn-modern btn-lg btn-success rounded-0 mb-2 mt-2' ,
                    'data-bs-toggle' => 'modal',    
                    //'data-bs-target' =>  '#client-info-'.$usernameValue.'-'.$i                                
                ]
            );
        }   
      
        
    }else{          

        echo Html::button(
            
            $values['hour'],                                                                
            [         
                'class' => 'btn w-100 btn-modern btn-lg btn-success rounded-0 mb-2 mt-2' ,
                'data-bs-toggle' => 'modal',    
                //'data-bs-target' =>  '#client-info-'.$usernameValue.'-'.$i                                
            ]
        );           
    }
    */

?>
