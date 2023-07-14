<?php
    $arrValues = [];;  
    $maxValueArr = [];

    $serviceStr = '';

    foreach($fullArrShdeddule as $username => $arrServices){    
        foreach($arrServices as $service => $availableSchedule) {  
            $maxRows = 0;
            foreach($availableSchedule as $key => $line){  
                if($maxRows < count($line)){
                    $maxRows = count($line);               
                }  

                $maxValueArr[$username][$service] = $maxRows;              
            }  
        } 
    }        


    foreach($fullArrShdeddule as $username => $arrServices){ 
        foreach($arrServices as $service => $availableSchedule) {  

            $maxRows = ((isset($maxValueArr[$username][$service])) ? $maxValueArr[$username][$service] : 0);

            for($row = 0; $row < $maxRows; $row ++){
                for($x = 0; $x < 7; $x ++){         
                    $fullDate = date("Y-m-d", strtotime("+".$x." day")); 
                    $day = strtotime($fullDate); 
           
                    if(isset($availableSchedule[$fullDate][$row])){
                        $arrValues[$username][$service][$row][] = $availableSchedule[$fullDate][$row];
                    } else{
                        $arrValues[$username][$service][$row][] = '';
                    }   
                }                                                             
            }    
        }
    }  

 
    foreach($arrValues as $username => $dataPerUsername){ 
        foreach($dataPerUsername as $service => $arrServices) {  
         
?>  
            <table id="table-services-<?= $service ?>-<?= $username ?>" class="table px-5 mb-5" style="display:none">
                <thead>                             
                    <tr class="border">
                        <th class="prev text-center py-3" style="font-size: 30px;">
                            <a onclick="goToPreviousPage()">«</a>
                        </th>
                        <th colspan="5" class="datepicker-switch text-center  py-3 text-4" >
                            June 2023           
                        </th>
                        <th class="nex text-center  py-3" style="font-size: 30px;">
                            <a  onclick="goToNextPage()">»</a>                       
                        </th>
                    </tr>
                    <tr>
                        <?php
                            $days = array('sun', 'mon', 'tue', 'wed','thu','fri', 'sat');                                
                            $date1 = strtotime('2022-04-01');
                            $date2 = strtotime('2022-05-10');
                            $diff = $date2 - $date1;
                            $days1 = floor($diff / (60 * 60 * 24));                              
                            
                            $dayOfWeek = date('w');                     
                                                            
                        ?>
                        <?php
                            for($x = 0; $x < 7; $x ++){                      
                                $dw = date('w', strtotime(date('Y-m-d'). ' + '.$x.' day'));               
                        ?>
                            <th class=" dow text-center text-3 border">
                                <?= Yii::t('app',$days[$dw]) ?>
                            </th>
                        <?php
                            }
                        ?>                              
                    </tr>                        
                </thead>
                <tbody>
                    <tr class="p-2 ">
                        <?php         
                        
                            $i = 0;
                            for($x = 0; $x < 7; $x ++){                                                 
                                $fullDate = date("Y-m-d", strtotime("+".$x." day")); 
                                $dayStrTime = strtotime($fullDate);                            
                                $day = date('d', $dayStrTime);                          
                                $classToday = '';
                                if($x == 0){
                                    $classToday = 'background-date-choice';
                                }
                        ?>                           
                            <td class="text-center border <?= $classToday ?> day-<?= $dayStrTime ?>-<?= $username ?> "> 
                                <a class="text-hour text-4" onclick="goToThisPage(this)" data-this-data=<?= $dayStrTime ?> data-username=<?= $username ?> data-service-code=<?= $service ?>>
                                    <?= $day ?>
                                </a>         
                            </td>
                        <?php
                            }
                        ?>                       
                    </tr>
                    <?php 
                        foreach($arrServices as $key => $line){  
                    ?>     
                    <tr class="" id="tabel">                             
                        <?php                      
                        
                            $i = 0;

                            foreach($line as $key2 => $hour){ 

                                $fullDate = date("Y-m-d", strtotime("+".$i." day")); 
                                $dayStrTime = strtotime($fullDate);   
                        ?>
                            <td class="text-center  display-values-for-mobile day-column-<?= $dayStrTime ?>-<?= $username ?> border <?= ($key2 == 0) ? 'text-hour-column' : '' ?>" >
                                <a class="btn ">
                                    <?= $hour ?>
                                </a>
                            </td>   
                        <?php 
                               $i++;
                            }
                         
                        }
                        ?>                                                  
                    </tr> 
                </tbody>
            </table>   
<?php  

        }
    }
?>