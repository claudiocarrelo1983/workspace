
/*

  Gets Date Search By Services Dropdown on Booking Individual


*/
function bookingIndividualGetDateSearch(){
  
    //var date = jQuery(attr).val();
    dataString = {    
        service: jQuery("#select-service").val(), 
        location:  jQuery("#select-service").data('location'),    
        date: jQuery("input[name='Sheddule[date]']").val(),
        username:  jQuery("#select-service").data('team'),           
    };

    jQuery(document).ready(function () {   
        jQuery.ajax({              
            url: '../../booking/booking-individual-get-date-search',
            dataType: 'html',
            data: dataString,
            type: 'post',
            success:function(data) {     
                jQuery('#alert-message').hide();
                jQuery('#render-schedule').html(data);                     
            }       
        }) 
    });
}



function buttonDateBookingIndividualAjax(attr){

    dataString = {   
        service: jQuery("#select-service").val(),
        location: jQuery("#select-service").data('location'), 
        username: jQuery("#select-service").data('team'),    
        date: jQuery(attr).val(), 
  
    };
    console.log(dataString);
    jQuery(document).ready(function () {   
        jQuery.ajax({     
            url: '../../booking/booking-individual-get-date-search',
            dataType: 'html',
            data: dataString,
            type: 'post',
            success:function(data) {    
                jQuery('#alert-message').hide();                     
                jQuery('#render-schedule').html(data);                   
            }       
        }) 
    });
}
