

setPricing();
//displayTeam();

jQuery('input[id^="choice-team-"]').ready(function(key,val) { // Select the radio input group

    jQuery('input[id^="choice-team-"]').each(function(key,val){
        if (jQuery('#' + val.id).prop('checked')) {         
            jQuery('div[id^="tick-"]').hide();
            jQuery('#tick-' + val.id).show();           
            //jQuery(this).closest("form").submit();
        
        }
      });
});


jQuery('input[id^="choice-location-"]').ready(function(key,val) { // Select the radio input group

    jQuery('input[id^="choice-location-"]').each(function(key,val){
        if (jQuery('#' + val.id).prop('checked')) {                
            jQuery('div[id^="tick-"]').hide();
            jQuery('#tick-' + val.id).show();           
            //jQuery(this).closest("form").submit();
        
        }
      });
});


jQuery('input[id^="choice-service-"]').ready(function(key,val) { // Select the radio input group

    jQuery('input[id^="choice-service-"]').each(function(key,val){    
    
        if (jQuery('#' + val.id).prop('checked')) {     
                    
            jQuery('div[id^="tick-"]').hide();
            jQuery('#tick-' + val.id).show();         
            jQuery('div[id^="text-"]').removeClass('text-choice-service');
            jQuery('div[id^="text-"]').removeClass('text-color-hover-primary');
            jQuery('#text-' + val.id).addClass("text-choice-service");  
            //jQuery(this).closest("form").submit();
        
        }
      });
});


jQuery('input[id^="choice-schedule-"]').ready(function(key,val) { // Select the radio input group

    jQuery('input[id^="choice-schedule-"]').each(function(key,val){    
    
        if (jQuery('#' + val.id).prop('checked')) {     
            
            jQuery('label[id^="choice-schedule-"]').removeClass('btn-success-dark');   
            jQuery('label[id^="choice-schedule-"]').addClass('btn-success'); 
            jQuery('label#' + val.id).removeClass("btn-success");  
            jQuery('label#' + val.id).addClass("btn-success-dark");  
            //jQuery(this).closest("form").submit();
        
        }
      });
});


function checkScheduleTick(attr) { 

 
    jQuery('label[id^="choice-schedule-"]').removeClass('btn-success-dark');   
    jQuery('label[id^="choice-schedule-"]').addClass('btn-success');  
    jQuery('label#' + attr.id).removeClass("btn-success");  
    jQuery('label#' + attr.id).addClass("btn-success-dark");  

}

function checkTeamTick(attr) {    

    jQuery('div[id^="tick-"]').hide();
    jQuery('span[id^="tick-"]').hide(); 
    jQuery('#tick-' + attr.id).show();   

    jQuery("input[id='choice-service-'").prop('checked', false);
    jQuery('#radio-' + attr.id).prop('checked', true);

    jQuery('div[id^="text-"]').removeClass('text-choice-service');
    jQuery('div[id^="text-"]').removeClass('text-color-hover-primary');
    jQuery('#text-' + attr.id).addClass("text-choice-service");
    
}

function setPricing(){  
    var standard = jQuery('#price-change').find(':selected').data('standard');
    var professional = jQuery('#price-change').find(':selected').data('professional');
    var enterprise = jQuery('#price-change').find(':selected').data('enterprise');
    var standardCoin = jQuery('#price-change').find(':selected').data('coin');
    var professionalCoin = jQuery('#price-change').find(':selected').data('coin');
    var enterpriseCoin = jQuery('#price-change').find(':selected').data('coin');

    jQuery('#value-standard').html(standard);
    jQuery('#value-professional').html(professional);
    jQuery('#value-enterprise').html(enterprise);
    jQuery('#value-standard-coin').html(standardCoin);
    jQuery('#value-professional-coin').html(professionalCoin);
    jQuery('#value-enterprise-coin').html(enterpriseCoin);

}

function closeAlert(){  
    jQuery('.alert ').hide();
}

function displayTeam2(attr) {    

    var value = jQuery(attr).val();   
    
    jQuery('table[id^="table-services-"]').hide();
   // jQuery('div[id^="services-choice"]').hide();

    jQuery('#choice-all').prop('checked', false); 
    jQuery("input[name='team-choice'").prop('checked', false);
    //jQuery('div[id^="services-choice"]').hide();

    if(value == ''){
        jQuery('div[id^="location-team-"]').hide();
        jQuery('div[id^="location-teamsomeone"]').hide();
    }else{
        jQuery('div[id^="location-teamsomeone"]').show();
        jQuery('div[id^="location-team-"]').hide();
        jQuery('div[id^=location-team-' + value).show();  
    }      

    jQuery('div[id^="display-choice-all-"]').hide();
    jQuery('#display-choice-all-'+ value).show(); 

    jQuery('div[id^="services-choice-all-"]').hide();
    jQuery('div[id^="services-"]').hide();
                        
}  

function displayServices(attr) {  
 
    jQuery('table[id^="table-services-"]').hide();
    jQuery('div[id^="mobile-hours-"]').hide();

    jQuery('div[id^="sheddule-choice-"]').hide();
    jQuery('#sheddule-' + attr.id).show();  
     
    jQuery('div[id^="services-choice"]').hide();
    jQuery('#services-' + attr.id).show();  
    jQuery('#services-choice-all-'+ attr.id).show();  
     
}  

function goToThisPage(attr){
     
    var username = jQuery(attr).data('username');
    var service  = jQuery(attr).data('service-code');

    var qty = jQuery('#qty1').val();
    var sum =jQuery(attr).data('this-data');

    jQuery('td').removeClass("background-date-choice");
    jQuery('td').removeClass("text-hour-column");   
    jQuery('.day-' + sum + '-' + username).addClass("background-date-choice");
    jQuery('.day-column-' + sum + '-' + username).addClass("text-hour-column");

    jQuery('div[id^="mobile-hours-"]').hide();
    jQuery('div[id^="mobile-hours-'+ service + '-' + username + '-' + sum +'"]').show();
  
} 
 
function goToPreviousPage(){
 
 var qty = jQuery('#qty1').val();
 var minValue =jQuery('#qty1').data('min');

 var currentVal = parseInt(qty);
 if (!isNaN(currentVal) && currentVal > 0) {

     if(minValue < currentVal){
         var sum = (currentVal - 1);
            jQuery('.day-' + (sum + 1)).removeClass("background-date-choice");
            jQuery('td').removeClass("text-hour-column");
            jQuery('.day-' + sum).addClass("background-date-choice");
            jQuery('.day-column-' + sum).addClass("text-hour-column");    
            jQuery('#qty1').val(sum);
            jQuery('div[id^="slider"]').hide();
            jQuery('#slider' + sum).show();       

     }     
 }
}
function goToNextPage(){

    var qty =jQuery('#qty1').val();
    var maxValue =jQuery('#qty1').data('max');
    var currentVal = parseInt(qty);
    if (!isNaN(currentVal)) {   
        if(maxValue > currentVal){
            var sum = (currentVal + 1); 
            jQuery('.day-' + (sum - 1)).removeClass("background-date-choice");
            jQuery('td').removeClass("text-hour-column");
            jQuery('.day-' + sum).addClass("background-date-choice");
            jQuery('.day-column-' + sum).addClass("text-hour-column");
            jQuery('#qty1').val(sum);
            jQuery('div[id^="slider"]').hide();
            jQuery('#slider' + sum).show();    
        }
    } 
}


function checkRadioButtonServices(attr){

   
    var username = jQuery(attr).data('username');
    var location  = jQuery(attr).data('location');
    var service  = jQuery(attr).data('service-code');
    var today  = jQuery(attr).data('today');
    
    jQuery('div[id^="mobile-hours-"]').hide();   
    jQuery('div[id^="mobile-hours-'+ service + '-' + username + '-' + today +'"]').show();

    
    //jQuery('table[id^="table-services"]').hide();
    //jQuery('table[id^="table-services-'+ service + '-' + username + '"]').show();

    //<?= $locationT['location_code'] ?>-<?= $serviceT['service_code'] ?>-<?= $valueT['username_code'] ?>
    jQuery('table[id^="table-services"]').show();     
    jQuery('td[id^="column-"]').hide();
    jQuery('td[id^="column-'+ location + '-'+ service + '-'+ username + '"]').show();

}


