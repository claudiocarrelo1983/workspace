function calculateBmi(formid){
  
    var dataString = $('#' + formid).serialize();

    $(document).ready(function () {   
        $.ajax({     
            url: '../ajax/calculatorBmi.ajax.php',
            dataType: 'json',
            data: dataString,
            type: 'post',
            success:function(data) {                 

                $("div[id*='check-']").each(function (i, el) {                    
                    $(this).hide(); 
                });       
                console.log(data.measure);
                if(data.age == 1){
                    if(data.sex == 'w'){
                        $('#check-w-' + data.measure).show();  
                    }
    
                    if(data.sex == 'm'){
                        $('#check-m-' + data.measure).show();  
                    }
                }else{
                    $('#check-m-l').hide(); 
                    $('#check-w-l').hide(); 
                    $('#check-m-k').hide(); 
                    $('#check-w-k').hide(); 
                }
            

                //validation
                $.each(data.validation, function(index, itemData) {
                    $('#check-' + data.measure + '-' + index).show();               
                    $('#check-' + data.measure + '-' + index).html(itemData);
                });               

                $("div[id*='bmi_answer_']").each(function (i, el) {                    
                    $(this).hide(); 
                });     

                if (data.validation.length === 0){     
                    $('#bmi_result').html(data.imc);
                    $('#bmi_result').css("background-color", data.color);
                    $('#display_result').html(data.display);                   
                    $('#bmi_answer_' + data.result).show();
                    $('#bmi_answer_0').show();
                }
            }       
        }) 
    });

}



function cleanBmi(){

    $("div[class*='help-block']").each(function (i, el) {                    
        $(this).html(''); 
    });  
        

    $("input[id*='calculatorbmi']").each(function (i, el) {
        $(this).val('');
    });

    $("input:radio").prop( "checked", false );

    $('#bmi_answer').hide(); 
    $('#bmi_table').hide(); 

  
   


}