
$.ajax({
    url: "load_personal_infor.php",
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    async: true,
    success: function(data){
        var d = JSON.parse(data);
        $('#static_account').val(d['static_account']);
        $('#InputPassword1').val(d['InputPassword1']);
        $('#InputPassword2').val(d['InputPassword2']);
        $('#name').val(d['name']);
        if(d['gender']=='man'){
            $("#genderman").prop("checked", true);
        }
        else{
            $("#genderwoman").prop("checked", true);
        }
        
        $('#phone').val(d['phone']);
        $('#Email').val(d['Email']);
        $('#Parking-grid').val(d['Parking-grid']);
        $('#static_management_fee').val(d['static_management_fee']);
        $('#preview_progressbarTW_img').attr('src', d['preview_progressbarTW_img']);
    },
            
    error: function(){
        alert("error");
    }             
});
    