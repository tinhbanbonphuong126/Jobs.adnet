<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="平成32年度竣工予定のごみ焼却施設「名古屋市北名古屋工場（仮称）」の建設工事期間の情報を発信するサイトです。">
    <meta name="keywords" content="名古屋市,ごみ,ごみ焼却,シャフト炉式,ガス化溶融炉,環境施設">
    <meta name="author" content="北名古屋クリーンシステム">
    <title>名古屋市北名古屋工場（仮称）整備運営事業</title>

    <link rel="stylesheet" href="./assets/css/reset.css"/>
    <link rel="stylesheet" href="./assets/css/style.css"/>
    <link rel="stylesheet" href="./assets/dist/css/lightbox.min.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./assets/plugins/jQuery/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./assets/plugins/bootstrap/js/bootstrap.js"></script>

    <script src="./assets/dist/js/lightbox-plus-jquery.min.js"></script>
    <script type="text/javascript">
        function addstring() {
            document.forms[0].q.value = 'site:www.kitanagoya-cs.com ' + document.forms[0].q.value;
            return true;
        }
    </script>
</head>
<body runat="server" id="Body" style="zoom: <?= isset($_SESSION['ZOOM'])? $_SESSION['ZOOM']: '100%' ?>">
<!--Header Begin-->
<!--Header Begin-->
<div class="wrapper">
    <header>
        <div id="header-top-banner"></div>
        <div id="header-middle" class="container">
            <div id="header-title" class="Aligner-item">
                名古屋市北名古屋工場（仮称）整備運営事業
            </div>
            <div class="aligner-item">
                <form id="header-search" onSubmit="addstring()" action="http://www.google.com/search">
                    <input type="hidden" name="hl" value="ja" />
                    <input type="hidden" name="act" value="search" />
                    <input type="hidden" name="ie" value="Shift_JIS">
                    <input type="hidden" name="oe" value="Shift_JIS">
                    <img src="./assets/images/icon/ico-search.png" >
                    <span>サイト内検索</span>
                    <input type="text" name="q" id="search-box" size="20" maxlength="256" value="" />
                    <input id="btn-search" type="submit" name="btnG" value="検索"/>
                </form>
                <div class="text-lang">
                    <p>文字サイズ
                        <span onclick="zoomIn()">拡大</span>
                        <span onclick="zoomOut()">基本</span>
                </div>
            </div>
        </div>

        <?php
        $_GET['act'] = isset($_GET['act'])?$_GET['act'] : 'home';
        if($_GET['act'] == 'home') {
            include('./app/includes/logo-banner.php');
        } else
        {
            include('./app/includes/green-banner.php');
        }
        ?>

    </header>
    <!--Header End-->
    <!-- <div class="clear-fix"></div>-->
    <!--Navigation Bar Begin-->
    <nav color class="container" id="nav-bar" style="margin-top:-3px;">
        <a href="?act=home" class="a-nav">
            <div class="a-img">
                <img src="./assets/images/icon/ico-home.png" alt="ホーム"/>
            </div>
            <div class="a-div">
                ホーム
            </div>
        </a>
        <a href="?act=introduction" class="a-nav">
            <div class="a-img">
                <img src="./assets/images/icon/ico-boat.png" alt="施設紹介"/>
            </div>
            <div class="a-div">
                施設紹介
            </div>
        </a>
        <a href="?act=schedule" class="a-nav">
            <div class="a-img">
                <img src="./assets/images/icon/ico-xx.png" alt="工事予定"/>
            </div>
            <div class="a-div">
                工事予定
            </div>
        </a>
        <a href="?act=situation" class="a-nav">
            <div class="a-img">
                <img src="./assets/images/icon/ico-camera.png" alt="工事状況"/>
            </div>
            <div class="a-div">
                工事状況
            </div>
        </a>
        <a href="?act=map" class="a-nav">
            <div class="a-img">
                <img src="./assets/images/icon/ico-car.png" alt="施設案内図"/>
            </div>
            <div class="a-div">
                施設案内図
            </div>
        </a>
    </nav>
    <!--Navigation Bar End-->
    <div class="clear-fix"></div>