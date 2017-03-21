    <!--Main content begin-->
    <div class="container main-content">
        <div class="ico-title camera">
            <div>
                <img src="./assets/images/icon/camera.png" alt=""/>
            </div>
            <div>
                工事状況
            </div>
        </div>
        <section id="section-camera" class="wrap-camera">
<!--            <div style="height:500px;">-->
<!---->
<!--                <p style="font-size:18px; margin:200px auto auto auto; text-align:center;">工事中です。</p>-->
<!---->
<!--            </div>-->
            <div class="range-img">
                <?php
                    foreach($ConstructionStatusResult as $value)
                    {
                        ?>
                        <div class="img-box">
                            <div class="div-img">
                                <a href="<?=$value->image_url?>" data-lightbox="Image Gallery" data-title="<?=$value->title?>"><img src="<?=$value->image_url?>" alt="Image Situation"/></a>
                            </div>
                            <div class="img-description">
                                <p><?=date("Y.m.d", strtotime($value->status_date))?></p>
                                <p><?=$value->title?></p>
                            </div>
                        </div>
                        <?php
                    }
                ?>
                <div class="clear-fix"></div>
            </div>
        </section>
    </div>
    <div class="clear-fix"></div>
    <div class="container">
        <a href="?act=about">
            <p class="text-des">アクセシビリティ（利用しやすさ）への配偶について</p>
        </a>
    </div>
    <div class="clear-fix"></div>
    <!--Begin Footer -->
