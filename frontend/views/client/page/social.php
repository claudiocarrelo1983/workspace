
<?php 
    $active = 0;

    if(isset($companyArr[0]) ){ 
        foreach($companyArr[0] as $keyt => $value){  
            if(!empty($value)){
                $active = 1;
                break;
            }
        }
    } 
 ?>


<?php  if($active){  ?>

    <div class="row  my-5">           
        <div class="col-lg-12">
            <div class="heading text-primary heading-border">
                <h1>
                    <?= Yii::t('app', 'follow_us') ?> 
                </h1>
                <hr class="solid mb-5"> 
            </div>    
                        
            <div class=" mb-3 text-center">
                <ul class="list list-unstyled">
                    <li class="">
                        <ul class="social-icons social-icons-big social-icons-dark-2">
                            <?php                             

                                $str = '';

                                if(isset($companyArr[0]) ){
                                    foreach($companyArr[0] as $keyt => $value){  
                                        if(!empty($value)){
                                            switch ($keyt) {
                                                case 'instagram':
                                                case 'facebook':
                                                case 'twitter':
                                                case 'pinterest': 
                                                case 'linkedin':
                                                case 'youtube':
                                                    $str .= '<li class=" mx-2  social-icons-'.$keyt.'" >';
                                                    $str .= '<a  target="_blank" href="'.$value.'"><i class="text-6 fab fa-'.$keyt.'"  
                                                            style="padding:12px;"></i></a>';    
                                                    $str .= '</li>';                                    
                                                    break;                                        
                                                case 'website':
                                                    $str .= '<li class="social-icons-'.$keyt.'">';
                                                    $str .= '<a  href="'.$value.'"><i class="icon-globe icons"></i></a>';
                                                    $str .= '</li>';
                                                    
                                                    break;
                                            }                                              
                                        }   
                                    }    
                                }   
                                                        
                                echo $str;
                            ?>                     
                        </ul>
                    </li>
                </ul>      
            </div>
        </div>
    </div>
<?php } ?>