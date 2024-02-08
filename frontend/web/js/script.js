

  function checkboxAll(attr){

	var location = jQuery(attr).data('location');

	if (jQuery(attr).is(':checked')) {	
		jQuery('input[id^="team-' + location +'-"]').prop('checked',true);
	}else{
		jQuery('input[id^="team-' + location +'-"]').prop('checked',false);
	}

  }
 
 function getTeam(attr){

	var id = jQuery(attr).val();

	if (jQuery(attr).is(':checked')) {	
		jQuery('#team-' + id).show();		
	}else{	
		jQuery('#checkbox-all-' + id).prop('checked',false);
		//jQuery('#checkbox-all-' + id).prop('checked',false);	
		jQuery('input[id^="team-' + id +'-"]').prop('checked',false);
		jQuery('#team-' + id).hide();
	}



}