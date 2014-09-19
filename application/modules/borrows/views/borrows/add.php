<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>borrows/borrows/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>borrows/borrows/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
            <button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Borrowing Form</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="bor_boo_id" class="col-sm-3 control-label">Book Title</label>
                            <div class="col-sm-9">
                                <select name="bor_boo_id" class="form-control" required id="bor_boo_id">
                                    <?php
                                    foreach ($books as $key => $value) {
                                        echo '<option value="' . $key . '" ' . set_select('bor_boo_id', $key) . '>' . $value . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bor_bor_id" class="col-sm-3 control-label">Borrower Name</label>
                            <div class="col-sm-9">
                                <select name="bor_bor_id" class="form-control" required id="bor_bor_id">
                                    <?php
                                    foreach ($borrowers as $key => $value) {
                                        echo '<option value="' . $key . '" ' . set_select('bor_bor_id', $key) . '>' . $value . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bor_return_date" class="col-sm-3 control-label">Return Date</label>
                            <div class="col-sm-9">
                                <div class="input-group date" data-datepicker="true">
                                    <input type="text" class="form-control" id="bor_return_date" placeholder="yyyy-mm-dd" name="bor_return_date" value="<?php echo set_value('bor_return_date'); ?>"  required>
                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    <?php echo form_error('bor_return_date'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bor_comment" class="col-sm-3 control-label">Comment</label>
                            <div class="col-sm-9">
                               
                                <textarea  class="form-control" id="bor_comment" placeholder="Comment" name="bor_comment" value="<?php echo set_value('bor_comment'); ?>"  pattern=".{3,50}"  title="Allow enter from 3 to 50 characters"></textarea>
                                <?php echo form_error('bor_comment'); ?>
                            </div>
                        </div>
                        
<!--                        <div class="form-group">
                            <label for="bor_status" class="col-sm-4 control-label">Enable</label>
                            <div class="col-sm-7">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="bor_status" id="use_status" value="1" <?php echo set_checkbox('use_status', 1, TRUE); ?>> Check to enable this user account</label>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
            <!--            <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Select user groups (optional)</h3>
                                </div>
                                <div class="panel-body">
            <?php foreach ($groups as $key => $value) { ?>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="groups[]" value="<?php echo $key; ?>" <?php echo set_checkbox('groups[]', $key, FALSE); ?>> <?php echo $value; ?></label>
                                                </div>
            <?php } ?>
                                </div>
                            </div>
                        </div>-->
        </div>
    </div>
</form>