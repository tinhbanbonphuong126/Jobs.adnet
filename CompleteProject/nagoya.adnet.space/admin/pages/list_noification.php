<div id="main-content">
    <div class="table-responsive" id="table-note">
        <h2>お知らせ</h2>
        <table class="table table-hover">
            <thead>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#myModal-new-edit">新規登録</button>

            <!--End Modal-->
            <tr>
                <th>お知らせ</th>
                <th>日付</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($data as $key => $value) { ?>
            <tr>
                <td><?php echo $value->content ?></td>
                <td><?php echo format_date($value->notification_date) ?></td>
                <td>
                    <button onclick="set_id_delete(<?php echo $value->id ?>)" type="button" class="btn btn-sm pull-right" data-toggle="modal" data-target="#myModal-remove">削除</button>
                    <button onclick="show_detail(<?php echo $value->id ?>)" type="button" class="btn btn-sm pull-right" data-toggle="modal" data-target="#myModal-new-edit">編集</button>
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
<div class="modal fade" id="myModal-new-edit" role="dialog">
    <div class="modal-dialog modal-sm modal-user">
        <div class="modal-content">
            <div class="modal-body">
                <form id="form-edit" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" value="" name="id" id="id"/>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="id"><span class="color-red">※</span>お知らせ</label>
                        <div class="col-sm-9">
                            <input autofocus maxlength="64" required type="text" class="form-control" id="content" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="datepicker"><span class="color-red">※</span>日付</label>
                        <div class="col-sm-9">
                            <input required type="text" name="date" id="date" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="datepicker">PDF</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" readonly name="pdf_link" value="" id="pdf_link" />
                                <span style="overflow-x: hidden" class="input-group-btn ">
                                    <label id="file-choice" for="upload" class="btn btn-success">参照</label>
                                </span>
                            </div>
                            <input accept="application/pdf, pdf" required type="file" name="upload" id="upload" class="form-control hide"/>
                            <label id="status"></label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                <button type="button" id="btn-submit" onclick="submit_form()" class="btn btn-primary"> OK </button>
            </div>
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
<script src="<?php echo ASSETS; ?>assets/admin/js/list_notification.js"></script>
<script type="text/javascript">
    $(window).ready(function(){
        $( "#date" ).datepicker({
            yearRange: "-100:+0",
            changeYear: true, //表示年の指定が可能
            changeMonth: true, //表示月の指定が可能
            dateFormat: 'yy/mm/dd' //年-月-日(曜日)
        });
    });
    $("#pdf_link").change(function(){
        var paths = $("#pdf_link").val().split('\\');
        $('#file-choice').html(paths[paths.length - 1]);
        $('#file-choice').removeClass('btn-default');
        $('#file-choice').addClass('btn-success');
    });
</script>