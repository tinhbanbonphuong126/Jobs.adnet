<div id="main-content">
    <div id="form-register">
        <form action="./edit-construction" method="post" class="form-horizontal" role="form">
            <div class="row">
                <div class="col-sm-12 form-group legend">
                    <legend>工事たより</legend>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        工事たよりリンク
                    </div>
                    <div class="form-group col-sm-8">
                        <input class="form-control" type="text" name="link" id="link" value="<?php echo $link ?>" />
                    </div>
                </div>
                <div class=" form-group col-sm-12" id="submit-register-btn">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button style="float: right" type="submit" class="btn btn-primary">登録</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>