<div id="nav-vetical">
    <div class="sidebar-nav">
        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="visible-xs navbar-brand">タイトル</span>
            </div>
            <div class="navbar-collapse collapse sidebar-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php echo $act == 'notification' ? "active":""; ?>">
                        <a href="<?php echo ASSETS; ?>admin/notification">お知らせ</a>
                    </li>
                    <li class="<?php echo $act == 'construction' ? "active":""; ?>">
                        <a href="<?php echo ASSETS; ?>admin/construction">工事たより</a>
                    </li>
                    <li class="<?php echo $act == 'construction-status' ? "active":""; ?>">
                        <a href="<?php echo ASSETS; ?>admin/construction-status">工事状況</a>
                    </li>
                    <li class="<?php echo $act == 'week-plan' ? "active":""; ?>">
                        <a href="<?php echo ASSETS; ?>admin/week-plan">週間工事予定</a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>