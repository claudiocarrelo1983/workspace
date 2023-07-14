setPricing();

function BlogToogle(id){    
    jQuery("#dropdown-menu" + id).toggle();
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

function displayTeam(attr) {   
    
    var value = jQuery(attr).val();   
    
    jQuery('table[id^="table-services-"]').hide();
    jQuery('div[id^="services-choice"]').hide();

    jQuery('#choice-all').prop('checked', false); 
    jQuery("input[name='imgbackground'").prop('checked', false);
    jQuery('div[id^="services-choice"]').hide();

    if(value == ''){
        jQuery('div[id^="location-team-"]').hide();
        jQuery('div[id^="location-teamsomeone"]').hide();
    }else{
        jQuery('div[id^="location-teamsomeone"]').show();
        jQuery('div[id^="location-team-"]').hide();
        jQuery('div[id^=location-team-' + value).show();  
    }
    
                        
}  

function displayServices(attr) {        
    jQuery('table[id^="table-services-"]').hide();
    jQuery('div[id^="mobile-hours-"]').hide();
    jQuery('div[id^="services-choice"]').hide();
    jQuery('#services-' + attr.id).show();                           
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
    var service  = jQuery(attr).data('service-code');
    var today  = jQuery(attr).data('today');
    
    jQuery('div[id^="mobile-hours-"]').hide();   
    jQuery('div[id^="mobile-hours-'+ service + '-' + username + '-' + today +'"]').show();

    
    jQuery('table[id^="table-services-"]').hide();
    jQuery('table[id^="table-services-'+ service + '-' + username + '"]').show();

}

