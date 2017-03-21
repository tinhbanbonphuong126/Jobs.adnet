<div id="login">
    <div class="container">
        <div class="row">
            <div id="login-form" class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                <form class="form-horizontal" method="post" action="<?php echo ASSETS;?>admin/submit-login">
                    <div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <span id="login-error-msg">
                                <?php
                                    if(isset($_SESSION["LOGIN_ERROR"]))
                                    {
                                        echo $_SESSION['LOGIN_ERROR'];
                                        unset($_SESSION['LOGIN_ERROR']);
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="id">ID :</label>
                        <div class="col-sm-9">
                            <input autofocus="" type="text" class="form-control" id="id" name="id" placeholder="ID入力">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="pwd">パスワード :</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="パスワード入力">
                        </div>
                    </div>
                    <div class="clear-fix-10"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="login" class="btn btn-success pull-right">ログイン</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
