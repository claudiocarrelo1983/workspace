

jQuery(function(){
    jQuery(document).on('click','.language',function(data) {
      var url = jQuery(this).data('url');
		  var language = jQuery(this).attr('id');
      var csrfToken = jQuery(this).data('csrf');  

        jQuery.ajax({
               url: url + "/index.php/site/language",
               type: "post",            
               data: {lang: language, _csrf : csrfToken},
               success: function (response) {

                location.reload();	
       
                  // You will get response from your PHP page (what you echo or print)
               },
               error: function(jqXHR, textStatus, errorThrown) {
                  console.log(textStatus, errorThrown);
               }
           }); 
    });

});



jQuery(function(){
  jQuery(document).on('click','.language-admin',function(data) {
    var url = jQuery(this).data('url');
    var language = jQuery(this).attr('id');
    var csrfToken = jQuery(this).data('csrf');  

      jQuery.ajax({
             url: url + "/index.php/admin/language",
             type: "post",            
             data: {lang: language, _csrf : csrfToken},
             success: function (response) {

              location.reload();	
     
                // You will get response from your PHP page (what you echo or print)
             },
             error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
             }
         }); 
  });

});

/*

	$(document).on('click','.language',function(){        
		var lang = $(this).attr('id');

		$.post('http://localhost/new/6.0/frontend/web/index.php?r=site/language', {
            'lang':lang
        }, 
        function(data){
            alert();
         
          location.reload();	
	    });
    });
    */