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

