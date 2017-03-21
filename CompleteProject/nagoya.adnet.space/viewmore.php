    <!--Main content begin-->
    <div class="container main-content">
        <div class="ico-title boat viewmore">
            <div>
                <img src="./assets/images/home.png" alt=""/>
            </div>
            <div>
                お知らせ
            </div>
        </div>
        <section id="section-camera" class="wrap-camera">
            <div class="range-img">
                <div class="single">
                    <div id="main-left-bottom">
                        <table id="main-table">
                            <?php
                            foreach($NotificationsResult as $value)
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
                </div>
            </div>
        </section>

    </div>
    <div class="container">
        <a href="?act=about">
            <p class="text-des">アクセシビリティ（利用しやすさ）への配偶について</p>
        </a>
    </div>
    <div class="clear-fix"></div>
