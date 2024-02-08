

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

    jQuery('input[id^="choice-schedule-"]').prop('checked', false);
    
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




function checkTeamTick(attr) {    

    jQuery('div[id^="tick-"]').hide();
    jQuery('span[id^="tick-"]').hide(); 
    jQuery('#tick-' + attr.id).show();   

    jQuery("input[id='choice-service-'").prop('checked', false);
    jQuery('#radio-' + attr.id).prop('checked', true);

    jQuery('div[id^="text-"]').removeClass('text-choice-service');
    jQuery('div[id^="text-"]').removeClass('text-color-hover-primary');
    jQuery('#text-' + attr.id).addClass("text-choice-service");

    jQuery('#render-services').show(); 
    jQuery('#render-schedule').hide(); 
    jQuery('#render-profissional').hide();
    jQuery('#render-submit').hide(); 
    
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
    jQuery('td[id^="column-"]').find('option').remove();
    jQuery('td[id^="column-'+ location + '-'+ service + '-'+ username + '"]').show();

}

function getServicesByViewMore(attr) { 

    var username = jQuery(attr).data('username');
    var service = jQuery(attr).data('service');

    jQuery('select[id^="select-username-' + username +'"]').val(username);   
    jQuery('select[id^="select-service-' + username +'"]').val(service);  

   

}




function getScheduleByDateAjax(){
  
    //var date = jQuery(attr).val();
    dataString = {
        date: jQuery( "#date-calendar-search" ).val(),
        username: jQuery( "#sheddule-team_username option:selected" ).val()
    };     

    console.log(dataString);

    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../client-appointments/get-date-schedule',
            dataType: 'json',
            data: dataString,
            type: 'post',
            success:function(data) {      
 
                var str = '';

                jQuery.each(data, function(index, itemData) {
                    str += '<option value="' + index + '">' + itemData + '</option>';
                });

                jQuery('#select-hour').find('option').remove().end().append(str)   
                     
            }       
        }) 
    });

}

/*

Date buttons for Booking

*/
function getProfessionalByLocationAjax(attr){
  
    //var date = jQuery(attr).val();
    dataString = {
        service: jQuery(attr).val(),
        location: jQuery("input:radio[name='Sheddule[location_code]']:checked").val(),    
        date: jQuery("input[name='Sheddule[date]']").val(),      
        company_code: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('company'),  
        coin: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('coin'),
    };

    console.log(dataString);

    jQuery(document).ready(function () {   
        jQuery.ajax({    

            url: '../../booking/get-team-by-location',
            dataType: 'json',
            data: dataString,
            type: 'post',
            success:function(data) {                
 
                var strTeam = '';

                jQuery.each(data.team, function(index, itemData) {        
                    //strTeam += '<label><input type="radio" name="Sheddule[team_username]" value="' + index + '"> ' + itemData + '</input></label></br>';
                    strTeam += '<option value="' + index + '">' + itemData + '</option>';
                });

                if(jQuery(attr).val() == '*'){
                    jQuery('#render-profissional').hide();
                }else{
                    jQuery('#render-profissional').show(); 
                }          
                jQuery('#render-schedule').hide(); 

                jQuery('#select-team').html(strTeam);
                     
            }       
        }) 
    });
}



function getServicesByUserAjax(){
  
    dataString = {
        location: jQuery("input:radio[name='Sheddule[location_code]']:checked").val(),
        company_code: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('company'),
        coin: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('coin'),
              
    };

    console.log(dataString);

    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../booking/get-user-services',
            dataType: 'json',
            data: dataString,
            type: 'post',
            success:function(data) {      
                
                console.log(data);

                var str = '';

                jQuery.each(data.services, function(index, itemData) {
                    str += '<option value="' + index + '">' + itemData + '</option>';
                });               

                jQuery('#select-service').find('option').remove().end().append(str);
             
                //getScheduleByDateAjax();
                     
            }       
        }) 
    });

}

function getSchedduleByUserDefaulthAjax(attr){

    dataString = {   
        date: jQuery("input[name='Sheddule[date]']").val(),
        username: jQuery( "#select-team option:selected" ).val(),
        service: jQuery( "#select-service option:selected" ).val(),
        location: jQuery("input:radio[name='Sheddule[location_code]']:checked").val()    
    };

    console.log(dataString);

    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../booking/get-scheddule-user',
            dataType: 'html',
            data: dataString,
            type: 'post',
            success:function(data) {   

                console.log(data);
                
                jQuery('#render-schedule').show();  
                jQuery('#render-schedule').html(data);               
          
                     
            }       
        }) 
    });

}

function getServicesByUserAjax(){
  
    dataString = {
        location: jQuery("input:radio[name='Sheddule[location_code]']:checked").val(),
        company_code: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('company'),
        coin: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('coin'),
              
    };

    console.log(dataString);



    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../booking/get-user-services',
            dataType: 'json',
            data: dataString,
            type: 'post',
            success:function(data) {      
                
                console.log(data);

                var str = '';

                jQuery.each(data.services, function(index, itemData) {
                    str += '<option value="' + index + '">' + itemData + '</option>';
                });               

                jQuery('#select-service').find('option').remove().end().append(str);
             
                //getScheduleByDateAjax();
                     
            }       
        }) 
    });

}

function getUserServices(attr){

    dataString = {   
        username: jQuery(attr).val(),   
    };



    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../appointments/get-user-services',
            dataType: 'json',
            data: dataString,
            type: 'post',
            success:function(data) {   
               
                //jQuery('#render-schedule').show();  
  
                var str = '';

                jQuery.each(data.services, function(index, itemData) {
                    str += '<option value="' + index + '">' + itemData + '</option>';
                });               
            
                jQuery('#select-service').find('option').remove().end().append(str);            
          
                     
            }       
        }) 
    });

}


function teamBookingsGetUserServices(attr){
    
    var type = jQuery(attr).data('type');
    var inc = jQuery(attr).data('inc'),  

    dataString = {   
        username: jQuery(attr).val(),    
        day: jQuery(attr).data('day'),   
        type: type, 
        inc: inc, 
    };
 
    console.log(dataString);

    jQuery('#select-service-create').hide();   

    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../team-booking/get-user-services-and-hour',
            dataType: 'json',
            data: dataString,
            type: 'post',
            success:function(data) {           
               
                //jQuery('#render-schedule').show();            
                var str1 = '';

                jQuery.each(data.services, function(index, itemData) {
                    str1 += '<option value="' + index + '">' + itemData + '</option>';
                });    

                //jQuery("input[name='Sheddule[service_code]']").hide();                               
                jQuery('#select-service-' + type + '-' + inc).find('option').remove().end().append(str1);        
                
                
                var str2 = '';

                jQuery.each(data.hour, function(index, itemData) {
                    str2 += '<option value="' + index + '">' + itemData + '</option>';
                });    

                //jQuery("input[name='Sheddule[service_code]']").hide();                               
                jQuery('#select-hour-' + type + '-' + inc).find('option').remove().end().append(str2);            
         
                jQuery('#submit-' + type + '-'+ inc).submit(function(e){
                    jQuery('#client-' + type + '-'+ inc).modal('show');
                    return false;
                });
            }       
        }) 
    });
}






function getSchedduleByUserAjax(attr){

    dataString = {   
        date: jQuery(attr).val(),
        username: jQuery( "#select-service" ).data('team'),
        service: jQuery( "#select-service option:selected" ).val(),
        location: jQuery( "#select-service" ).data('location'),
    };
    
    console.log(dataString);

    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../booking/get-scheddule-user',
            dataType: 'html',
            data: dataString,
            type: 'post',
            success:function(data) {           
               
                jQuery('#render-schedule').html(data);               
          
                     
            }       
        }) 
    });

}



function getSchedduleTeamAjax(attr){

    dataString = {   
        date: jQuery(attr).val(),
        username: jQuery(attr).data('username'),  
        url: jQuery(attr).data('url'), 
    };
    
    console.log(dataString);

    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../team-booking/get-team-scheddule',
            dataType: 'html',
            data: dataString,
            type: 'post',
            success:function(data) {           
               
                jQuery('#render-schedule').html(data);               
          
                     
            }       
        }) 
    });

}


function submitBooking(attr){

    dataString = {   
        code:jQuery(attr).data('code'),
        date: jQuery('#date-calendar-search1').val(),      
        time: jQuery("input:radio[name='Sheddule[time]']:checked").val(),  
        username: jQuery( "#select-team option:selected" ).val(),
        service: jQuery( "#select-service option:selected" ).val(),
        location: jQuery("input:radio[name='Sheddule[location_code]']:checked").val()    
    };


    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../booking/booking-details-ajax',
            dataType: 'json',
            data: dataString,
            type: 'post',
            success:function(data) {          
              
              console.log(data);           
          
                     
            }       
        }) 
    });

}






















function getTeamScheddulleBookingAjax(){
  
    //var date = jQuery(attr).val();
    dataString = {    
        service: jQuery("#select-service").val(), 
        location:  jQuery("#select-service").data('location'),    
        date: jQuery("input[name='Sheddule[date]']").val(),
        username:  jQuery("#select-service").data('team'),           
    };

    jQuery(document).ready(function () {   
        jQuery.ajax({              
            url: '../../booking/get-scheddule-user-individual',
            dataType: 'html',
            data: dataString,
            type: 'post',
            success:function(data) {     
                jQuery('#render-schedule').html(data);                    
       
                /*
                if( !jQuery(attr).val()) { 
                    jQuery('#render-schedule').hide(); 
                    jQuery('#render-submit').hide();                    
                    
                }else{
                    jQuery('#render-schedule').show();  
                    jQuery('#render-schedule').html(data);  
                }
                */
                     
            }       
        }) 
    });
}


function getSchedduleButtonUserAjax(attr){

    dataString = {   
        service: jQuery("#select-service").val(),
        location: jQuery("#select-service").data('location'), 
        username: jQuery("#select-service").data('team'),    
        date: jQuery(attr).val(), 
  
    };
    console.log(dataString);
    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../booking/get-scheddule-user-individual',
            dataType: 'html',
            data: dataString,
            type: 'post',
            success:function(data) {                         
                jQuery('#render-schedule').html(data);                   
            }       
        }) 
    });

}

