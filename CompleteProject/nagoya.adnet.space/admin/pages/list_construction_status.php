<div id="main-content">
    <div class="table-responsive" id="table-note">
        <h2>工事状況</h2>
        <table class="table table-hover">
            <thead>
            <!-- Trigger the modal with a button -->
            <a href="<?php echo ASSETS; ?>admin/add-construction-status">
                <button type="button" class="btn btn-success btn-sm pull-right">新規登録</button>
            </a>

            <!--End Modal-->
            <tr>
                <th>管理画面用タイトル</th>
                <th>日付</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($data as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->title ?></td>
                    <td><?php echo format_date($value->status_date) ?></td>
                    <td>
                        <button onclick="set_id_delete(<?php echo $value->id ?>)" type="button" class="btn btn-sm pull-right" data-toggle="modal" data-target="#myModal-remove">削除</button>
                        <a href="<?php echo ASSETS; ?>admin/update-construction-status/id=<?php echo $value->id ?>">
                            <button type="button" class="btn btn-sm pull-right">編集</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
        <div id="note-pagination">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php if($page['current'] > 1 ){ ?>
                        <li>
                            <a href="<?php echo $url.($page['current'] - 1); ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php for ($i = 0; $i < $page['pages']; $i++) { ?>
                        <li class="<?php echo ($i+1) == $page['current'] ? 'active' : ''; ?>">
                            <a href="<?php echo $url.($i + 1); ?>"><?php echo $i+1; ?></a>
                        </li>
                    <?php } ?>

                    <?php if($page['current'] < $page['pages'] ){ ?>
                        <li>
                            <a href="<?php echo $url.($page['current'] + 1); ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>

    </div>
</div>
<div class="modal fade" id="myModal-remove" role="dialog">
    <div class="modal-dialog modal-sm modal-user">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <h4>一度削除したデータは元に戻せません。<br/>
                        本当によろしいですか。
                    </h4>
                    <input type="hidden" id="delete-id"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                <button onclick="submit_delete()" type="button" class="btn btn-primary"> OK </button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo ASSETS; ?>assets/admin/js/datepicker-ja.js"></script>
<script src="<?php echo ASSETS; ?>assets/admin/js/list_construction_status.js"></script>
<script type="text/javascript">
    $(window).ready(function(){
        $( "#date" ).datepicker({
            yearRange: "-100:+0",
            changeYear: true, //表示年の指定が可能
            changeMonth: true, //表示月の指定が可能
            dateFormat: 'yy/mm/dd' //年-月-日(曜日)
        });
    });
</script>