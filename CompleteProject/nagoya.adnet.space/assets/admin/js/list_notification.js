/**
 * Created by phongnt on 3/9/2017.
 */
var API_BASE = window.location.protocol+"//"+window.location.host+"/admin";
function call(url, type, data){
    return $.ajax({
        url: url,
        data: data,
        dataType: 'json',
        type: type,
    });
}
function submit_form(){
    var re = checkValid('form-edit');
    if(re){
        var $data = {
            "content" : $('#content').val(),
            "date" : $('#date').val(),
            "pdf_link": $('#pdf_link').val()
        };
        if($('#id').val()){
            $data.id = $('#id').val();
            call(API_BASE+'/update-notification', 'POST', $data).success(function(data){
//                $('#myModal-new-edit').modal('hide');
                if(data.status){
                    location.reload();
                }
            });
        }else{
            call(API_BASE+'/add-notification', 'POST', $data).success(function(data){
                if(data.status){
                    location.reload();
                }
            });
        }
    }
}

function show_detail(id){
    call(API_BASE+'/get-detail/id='+id, 'GET').success(function(data){
        var re = data.data;
        $('#content').val(re.content);
        $('#id').val(re.id);
        $('#pdf_link').val(re.pdf_link);
        $('#date').val(re.notification_date);
    });
//
}

function set_id_delete(id){
    $('#delete-id').val(id);
}
function submit_delete(){
    var $data = {
        "id" : $('#delete-id').val()
    };
    call(API_BASE+'/delete-notification', 'POST', $data).success(function(data){
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

var fileInput = document.getElementById('upload');
$('#upload').change(function(evt) {
    // Chan khong cho form tao submit
    evt.preventDefault();
    // Ajax upload
    var file = fileInput.files[0];
    // fd dung de luu gia tri goi len
    var fd = new FormData();
    fd.append('file', file);
    // xhr dung de goi data bang ajax
    var xhr = new XMLHttpRequest();
    xhr.open('POST', API_BASE+'/upload-notification', true);
    xhr.upload.onprogress = function(e) {
        if (e.lengthComputable) {
            $('#status').html('アップロード中・・・');
            $('#btn-submit').attr('disabled','disabled');
        }
    };
    xhr.onload = function(data) {
        if(data){
            var re = JSON.parse(data.currentTarget.response);
            $('#status').html('アップロード成功しました。');
            $('#pdf_link').val(re.file);
            $('#btn-submit').removeAttr('disabled');
        }
    };
    xhr.send(fd);
})