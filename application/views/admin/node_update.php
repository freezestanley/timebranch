<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php if (validation_errors()): ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Warning!</strong> <?php echo validation_errors(); ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Update a node of <?=$project->name?>.</div>
                <div class="panel-body">
                    <?php echo form_open('', array('role'=>'form', 'class'=>'form-horizontal')); ?>

                        <div class="form-group">
                            <label for="node-type" class="col-sm-2 control-label">Type<span class="required">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" id="node-type" name="type">
                                    <option value="-1">提前</option>
                                    <option value="0">不变</option>
                                    <option value="1">延后</option>
                                    <option value="2">删除</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="node-update_time" class="col-sm-2 control-label">Update time<span class="required">*</span></label>
                            <div class="col-sm-10">
                                <input required type="date" class="form-control" id="node-update_time" placeholder="" name="update_time" value="<?=set_value('update_time')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="node-remark" class="col-sm-2 control-label">remark</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="node-remark" name="remark" rows="3"><?=set_value('remark')?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
