/**
 * Created by phongnt on 3/10/2017.
 */
var API_BASE = window.location.protocol+"//"+window.location.host+"/admin";
function call(url, type, data){
    return $.ajax({
        url: url,
        data: data,
        dataType: 'json',
        type: type
    });
}
function set_id_delete(id){
    $('#delete-id').val(id);
}
function submit_delete(){
    var $data = {
        "id" : $('#delete-id').val()
    };
    call(API_BASE+'/delete-construction-status', 'POST', $data).success(function(data){
        if(data.status){
            location.reload();
        }
    });
}
function checkValid(form_name){
    var error = false;
    $("#"+form_name+" input").each(function(){
        if(this.type == "text"){
            if(this.hasAttribute("required")){
                if($(this).val().length < 1){
                    $(this).select();
                    $(this).parent().parent().addClass("has-error");
                    error = true;
                    return false;
                }else{
                    $(this).parent().parent().removeClass("has-error");
                }
            }
        }
    });
    if(error){
        return false;
    }else{
        return true;
    }
}