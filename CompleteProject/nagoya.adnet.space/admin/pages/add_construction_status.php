<div id="main-content">
    <div class="" id="construct-edit-form">
        <h2>工事状況編集</h2>

        <div id="form-edit-status-construction">
            <form id="form" onsubmit="return checkValid(this.id)" action="?act=add-construction-status" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
                <div class="clear-fix-20"></div>
                <div class="clear-fix-20"></div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">管理画面用タイトル</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="" id="title" name="title" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="date"><span class="color-red">※</span>日付</label>
                    <div class="col-sm-9">
                        <input required type="datetime" name="date" id="date" value="" class="form-control"/>
                    </div>`
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for=""><span class="color-red">※</span>画像名</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="image-preview">
                                    <img id="preview-image" onerror="imgError(this);" src="#" alt=""/>
                                </div>
                            </div>
                            <div class="clear-fix-10"></div>
                            <div class="col-xs-6">
                                <input required id="imgInp" name="file" type="file" class="filestyle" data-icon="false" accept="image/jpeg, image/png, image/gif"/>
                            </div>
                            <div class="col-xs-6">
                                <input id="delete-btn" type="button" onclick="DeletePreview()" value="削除"/>
                            </div>
                        </div>
                    </div>`
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for=""><span class="color-red">※</span>工事状況</label>
                    <div class="col-sm-9">
                        <textarea required class="form-control" name="description" id="description" cols="30" rows="7"></textarea>
                    </div>`
                </div>


                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-info">戻る</button>
                        <button type="submit"  class="btn btn-success pull-right">保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo ASSETS; ?>assets/admin/js/datepicker-ja.js"></script>
<script src="<?php echo ASSETS; ?>assets/admin/js/form_construction_status.js"></script>
<script src="<?php echo ASSETS; ?>assets/admin/js/bootstrap-filestyle.min.js"></script>
<script type="text/javascript">
    $(window).ready(function(){
        $( "#date" ).datepicker({
            yearRange: "-100:+0",
            changeYear: true, //表示年の指定が可能
            changeMonth: true, //表示月の指定が可能
            dateFormat: 'yy/mm/dd' //年-月-日(曜日)
        });
    });

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

    //    Hide error Img
    function imgError(image) {
        image.onerror = "";
        image.src = "../assets/images/preview-image-sample-not-accept.png";
        return true;
    }

    //    Delete Image Preview
    function DeletePreview(){
        $('#preview-image').attr('src','');
    }
</script>