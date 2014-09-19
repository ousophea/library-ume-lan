<?php
$data->result_array();
$data = $data->result_array[0];
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>users/accounts/edit/<?php
echo $data['use_id'];
echo '/' . $this->uri->segment(5); // segment(5) for pagination
?>">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>users/accounts/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
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
                        <h3 class="panel-title">User account</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="use_name" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="use_name" placeholder="Username" name="use_name" value="<?php echo $data['use_name']; ?>"  pattern=".{3,50}"  title="Allow enter from 3 to 50 characters">
                                <?php echo form_error('use_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="use_email" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="use_email" placeholder="Email" name="use_email" value="<?php echo $data['use_email']; ?>"  pattern=".{6,50}" required title="Allow enter from 6 to 50 characters">
                                <?php echo form_error('use_email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="use_address" class="col-sm-4 control-label">Address</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="use_address" placeholder="Address" name="use_address" value="<?php echo $data['use_address']; ?>"  >
                                <?php echo form_error('use_address'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="use_tel" class="col-sm-4 control-label">Mobile Phone:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="use_tel" placeholder="Mobile Phone" name="use_tel" value="<?php echo $data['use_tel']; ?>"  pattern=".{9,12}"  title="Allow enter from 9 to 12 characters">
                                <?php echo form_error('use_tel'); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="use_gro_id" class="col-sm-4 control-label">User Group</label>
                            <div class="col-sm-7">
                                <select name="use_gro_id" class="form-control" id="sta_position">
                                    <?php
                                    foreach ($groups as $key => $value) {
                                        if ($key == $data['use_gro_id']) {
                                            echo '<option value="' . $key . '" ' . set_select('use_gro_id', $key, TRUE) . '>' . $value . '</option>';
                                        } else {
                                            echo '<option value="' . $key . '" ' . set_select('use_gro_id', $key) . '>' . $value . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="use_status" class="col-sm-4 control-label">Enable</label>
                            <div class="col-sm-7">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="use_status" id="use_status" value="1" <?php echo set_checkbox('use_status', 1, TRUE); ?>> Check to enable this user account</label>
                                </div>
                            </div>
                        </div>
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