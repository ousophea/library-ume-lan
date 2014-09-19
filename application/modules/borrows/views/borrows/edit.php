<?php
$data->result_array();
$data = $data->result_array[0];
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>borrows/borrows/edit/<?php
echo $data['bor_id'];
echo '/' . $this->uri->segment(5); // segment(5) for pagination
?>">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>borrows/borrows/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Update</button>
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
                                <select name="bor_boo_id" class="form-control" id="bor_boo_id">
                                    <?php
                                    echo '<option value="' . $data['bor_boo_id'] . '" ' . set_select('bor_boo_id', $data['bor_boo_id'], TRUE) . '>' . $data['boo_title'] . '</option>';
                                    foreach ($books as $key => $value) {
                                        if ($key == $data['bor_boo_id']) {
                                            echo '<option value="' . $key . '" ' . set_select('bor_boo_id', $key, TRUE) . '>' . $value . '</option>';
                                        } else {
                                            echo '<option value="' . $key . '" ' . set_select('bor_boo_id', $key) . '>' . $value . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bor_bor_id" class="col-sm-3 control-label">Borrower Name</label>
                            <div class="col-sm-9">
                                <select name="bor_bor_id" class="form-control" id="bor_bor_id">

                                    <?php
                                    echo '<option value="' . $data['bor_bor_id'] . '" ' . set_select('bor_bor_id', $data['bor_bor_id'], TRUE) . '>' . $data['use_name'] . '</option>';
                                    foreach ($borrowers as $key => $value) {
                                        if ($key == $data['bor_bor_id']) {
                                            echo '<option value="' . $key . '" ' . set_select('bor_bor_id', $key, TRUE) . '>' . $value . '</option>';
                                        } else {
                                            echo '<option value="' . $key . '" ' . set_select('bor_bor_id', $key) . '>' . $value . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bor_return_date" class="col-sm-3 control-label">Return Date</label>
                            <div class="col-sm-9">
                                <div class="input-group date" data-datepicker="true">
                                    <input type="text" class="form-control" id="bor_return_date" placeholder="yyyy-mm-dd" name="bor_return_date" value="<?php echo $data['bor_return_date']; ?>"  required>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>