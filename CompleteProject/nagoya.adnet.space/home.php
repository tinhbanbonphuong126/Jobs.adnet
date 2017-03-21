<!--Main content begin-->
    <div id="main-content" class="container">
        <div id="main-left">
            <div id="main-left-top">
                お知らせ
            </div>
            <div id="main-left-bottom">
                <table id="main-table">
                    <?php
                    foreach($NotificationResult as $value)
                    {
                        ?>
                        <tr>
						<?php
							if($value->pdf_link)
							{
							?>
                            <td>
								<a href="<?=$value->pdf_link?>"><?= date("Y.m.d", strtotime($value->notification_date)) ?></a>
							</td>
                            <td>
								<a href="<?=$value->pdf_link?>"><?= $value->content ?></a>
							</td>
							<?php
							} else
							{
							?>
							<td>
								<?= date("Y.m.d", strtotime($value->notification_date)) ?>
							</td>
                            <td>
								<?=$value->pdf_link?>"><?= $value->content ?>
							</td>
							<?php
							}
						?>	
							
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div id="play-btn">
                <a href="?act=viewmore">
                    <div class="NormalCharacterStyle inline-block">もっと見る</div>
                    <div id="play-bg">
                        <img src="./assets/images/icon/play-btn.png" alt=""/>
                    </div>
                </a>
            </div><!--</a>-->
        </div>
        <div></div>

        <div id="main-right">
            <iframe
                id="youtube-player" type="text/html" width="302" height="204"
                src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                frameborder="0" allowfullscreen>

            </iframe>
        </div>
    </div>
    <!--Main content end-->
    <div class="clear-fix-20"></div>

    <div class="container">
        <a href="?act=about">
            <p class="text-des">アクセシビリティ（利用しやすさ）への配慮について</p>
        </a>
    </div>
    <div class="clear-fix"></div>
</div>

