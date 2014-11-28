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
                <div class="panel-heading">Add a new project.</div>
                <div class="panel-body">
                    <?php echo form_open('', array('role'=>'form', 'class'=>'form-horizontal')); ?>
                        <div class="form-group">
                            <label for="project-name" class="col-sm-2 control-label">Name<span class="required">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="project-name" placeholder="The name of project" required name="name" value="<?=set_value('name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project-producer" class="col-sm-2 control-label">Producer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="project-producer" placeholder="" name="producer" value="<?=set_value('producer')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project-area" class="col-sm-2 control-label">area</label>
                            <div class="col-sm-10">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="project-area" value="TW" name="area[]" <?=set_checkbox('area[]', 'TW')?>> TW
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="project-area" value="CN" name="area[]" <?=set_checkbox('area[]', 'CN')?>> CN
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project-os" class="col-sm-2 control-label">OS<span class="required">*</span></label>
                            <div class="col-sm-10">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="project-os" value="iOS" name="os[]" <?=set_checkbox('os[]', 'iOS')?>> iOS
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="project-os" value="Android" name="os[]" <?=set_checkbox('os[]', 'Android')?>> Android
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="project-os" value="WindowPhone" name="os[]" <?=set_checkbox('os[]', 'WindowPhone')?>> Window Phone
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project-ip" class="col-sm-2 control-label">ip</label>
                            <div class="col-sm-10">
                                <input type="text" name="ip" class="form-control" id="project-ip" placeholder="" value="<?=set_value('ip')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project-contract" class="col-sm-2 control-label">contract</label>
                            <div class="col-sm-10">
                                <input type="text" name="contract" class="form-control" id="project-contract" placeholder="" value="<?=set_value('contract')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project-issuer" class="col-sm-2 control-label">issuer</label>
                            <div class="col-sm-10">
                                <input type="text" name="issuer" class="form-control" id="project-issuer" placeholder="" value="<?=set_value('issuer')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project-type" class="col-sm-2 control-label">type</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="type" id="project-type" value="1" <?set_radio('type', '1')?>> 自研
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type" id="project-type" value="2" <?set_radio('type', '2')?>> 第二方
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type" id="project-type" value="3" <?set_radio('type', '3')?>> 第三方
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project-operator" class="col-sm-2 control-label">operator</label>
                            <div class="col-sm-10">
                                <input type="text" name="operator" class="form-control" id="project-operator" placeholder="" value="<?=set_value('operator')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project-apply" class="col-sm-2 control-label">apply</label>
                            <div class="col-sm-10">
                                <input type="text" name="apply" class="form-control" id="project-apply" placeholder="" value="<?=set_value('apply')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project-remark" class="col-sm-2 control-label">remark</label>
                            <div class="col-sm-10">
                                <input type="text" name="remark" class="form-control" id="project-remark" placeholder="" value="<?=set_value('remark')?>">
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
