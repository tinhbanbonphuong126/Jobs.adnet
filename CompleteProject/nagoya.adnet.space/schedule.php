<!--Main content begin-->
<div class="container main-content">
    <div class="ico-title xx">
        <div>
            <img src="./assets/images/icon/xx.png" alt=""/>
        </div>
        <div>
            工事予定
        </div>
    </div>
    <div class="clear-fix"></div>
    <div class="wrap-device">
        <section class="device-table">
            <div class="big-title">
                工事工程表
            </div>
            <div>
                <table width="100%">
                    <tr>
                        <td>
                            <div class="dragonal-line">
                                <span id="bottom-left">工程</span>
                                <span id="up-right">年次</span>
                            </div>
                        </td>
                        <td>平成28年度</td>
                        <td>平成29年度</td>
                        <td>平成30年度</td>
                        <td>平成31年度</td>
                        <td>平成32年度</td>
                    </tr>
                    <tr>
                        <td>解体工事</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>建築工事</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>プラント工事</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>外構工事</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>試運転</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <div class="table-position">
                    <ul>
                        <li><span class="done"> </span></li>
                        <li><span class="process"> </span></li>
                        <li><span class="process" style="width: 26%; left:42%;"> </span></li>
                        <li><span class="process" style="width: 21%; left:64%;"> </span></li>
                        <li><span class="process" style="width: 15%; left:70%;"> </span></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="device-table">
            <div class="big-title">
                週間工事予定
            </div>
            <div id="device-table-nextweek">
                <!--Empty-->
                <table width="100%">
                    <?php
                        foreach($ScheduleModelResult as $value) {
                            ?>
                            <tr>
                                <td width="12%"><?=Convert2digitMonth($value->month)?>月<?=Convert2digitDay($value->day)?>日
                                </td>
                                <td width="5%"><?php
                                    $timestamp = strtotime(date("Y") . '-' . $value->month . '-' . $value->day);
                                    echo FindDayOfWeek($timestamp);
                                    ?></td>
                                <td width="83%"><?=$value->content?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </section>
    </div>
</div>

<div class="container">
    <a href="?act=about">
        <p class="text-des">アクセシビリティ（利用しやすさ）への配偶について</p>
    </a>
</div>
<div class="clear-fix"></div>
</div> <!-- End .wrapper -->
