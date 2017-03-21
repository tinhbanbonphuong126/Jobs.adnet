<div id="main-content">
    <div class="" id="construct-edit-form">
        <h2>週間工事予定</h2>

        <div id="form-edit-status-construction">
            <form id="form-update" action="<?php echo ASSETS; ?>admin/update-week-plan" method="post" class="form-horizontal" role="form">
                <?php foreach ($data as $key => $value){ ?>
                    <?php
                    ?>
                <div class="date-form" id="date-form-2">
                    <div class="date-select form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <SELECT name="month[]">
                                <option value="">--</option>
                                <?php for ($i = 1; $i<=12; $i++){ ?>
                                    <option <?php echo $i == $value->month ? "selected" : ""; ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php }?>
                            </SELECT>
                            月
                            <SELECT name="day[]">
                                <option value="">--</option>
                                <?php for ($i = 1; $i<=31; $i++){ ?>
                                    <option <?php echo $i == $value->day ? "selected" : ""; ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php }?>
                            </select>
                            日　（<?php echo $days[$key] ?>）
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >定予</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $value->content; ?>" name="content[]" type="text" class="form-control" placeholder="">
                            <input value="<?php echo $value->id; ?>" name="id[]" type="hidden" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal-remove">更新</button>
                    </div>
                </div>
            </form>
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
                <button id="modal-delete" type="button" class="btn btn-primary"> OK </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#modal-delete').click(function(){
        $("#form-update").submit()
    })
</script>