



/*

1- Gets Dropdown Services By Location on radio 

*/

function getBookingGetServices(){
  
    dataString = {
        location: jQuery("input:radio[name='Sheddule[location_code]']:checked").val(),
        company_code: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('company'),
        coin: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('coin'),
              
    };

    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../booking/booking-get-services',
            dataType: 'html',
            data: dataString,
            type: 'post',
            success:function(data) {   
                jQuery('#alert-message').hide();
                jQuery('#select-service').html(data)        
                     
            }       
        }) 
    });

}

/*

2 - On Service Code Get Team

*/
function bookingGetTeam(attr){
  
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
            url: '../../booking/booking-get-team',
            dataType: 'html',
            data: dataString,
            type: 'post',
            success:function(data) {   
                jQuery('#render-schedule').hide(); 
                jQuery('#render-submit').hide(); 
                jQuery('#alert-message').hide();
                jQuery('#render-profissional').show();              
                jQuery('#select-team').html(data);
                     
            }       
        }) 
    });
}




/*

3 - On Team Gets Date Search

*/

function bookingGetDateSearch(attr){

    dataString = {   
        date: jQuery("input[name='Sheddule[date]']").val(),
        username: jQuery( "#select-team option:selected" ).val(),
        service: jQuery( "#select-service option:selected" ).val(),
        company_code: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('company'),  
        location: jQuery("input:radio[name='Sheddule[location_code]']:checked").val(),
        coin: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('coin'),
    };

    console.log(dataString);

    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../booking/booking-get-date-search',
            dataType: 'html',
            data: dataString,
            type: 'post',
            success:function(data) {  
                jQuery('#alert-message').hide();
                jQuery('#render-schedule').show(); 
                jQuery('#render-schedule').html(data);                

            }       
        }) 
    });
}


/*

4 -Date buttons for Booking

*/

function buttonDateBookingAjax(attr){

    dataString = {   
        date: jQuery(attr).val(),      
        username: jQuery( "#select-team option:selected" ).val(),
        service: jQuery( "#select-service option:selected" ).val(),
        location: jQuery("input:radio[name='Sheddule[location_code]']:checked").val(),
        company_code: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('company'),    
        coin: jQuery("input:radio[name='Sheddule[location_code]']:checked").data('coin'),
    };

    console.log(dataString);

    jQuery(document).ready(function () {   
        jQuery.ajax({     
            //url: '../../booking/get-scheddule-user',
            url: '../../booking/booking-get-date-search',
            dataType: 'html',
            data: dataString,
            type: 'post',
            success:function(data) {       
                jQuery('#alert-message').hide();
                jQuery('#render-schedule').show(); 
                jQuery('#render-schedule').html(data);               
               
                /*

                jQuery('#select-service').html(data.team);
                jQuery('#select-team').html();
                var str2 = '';

                jQuery.each(data.team, function(index, itemData) {
                    str2 += '<option value="' + index + '">' + itemData + '</option>';
                });               

                jQuery('#select-team').find('option').remove().end().append(str2);
             
                //getScheduleByDateAjax();
                */
                     
            }       
        }) 
    });

}



