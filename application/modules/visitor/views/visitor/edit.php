<?php
$data->result_array();
$data = $data->result_array[0];
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>visitor/visitor/edit/<?php
echo $data['vis_id'];
echo '/' . $this->uri->segment(5); // segment(5) for pagination
?>">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>visitor/visitor/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Update</button>
            <button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Visitor Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="uboo_tboo_id" class="col-sm-5 control-label">Name:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="vis_name" placeholder="Name" name="vis_name" value="<?php echo $data['vis_name']; ?>"   >
                                <?php echo form_error('vis_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uboo_number" class="col-sm-5 control-label">Gender:</label>
                            <div class="col-sm-7">
                                <?php
                                echo form_dropdown('vis_sex', array('m' => 'Male', 'f' => 'Female'), set_value('vis_sex', $data['vis_sex']), 'id="vis_sex" class="form-control"');
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vis_tvis_id" class="col-sm-5 control-label">Visitor Group:</label>
                            <div class="col-sm-7">
                                <select name="vis_tvis_id" class="form-control" id="vis_tvis_id">
                                    <?php
                                    foreach ($alltvisitor as $key => $value) {
                                        if ($key == $data['vis_tvis_id']) {
                                            echo '<option value="' . $key . '" ' . set_select('vis_tvis_id', $key, TRUE) . '>' . $value . '</option>';
                                        } else {
                                            echo '<option value="' . $key . '" ' . set_select('vis_tvis_id', $key) . '>' . $value . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vis_year_of_study" class="col-sm-5 control-label">Year:</label>
                            <div class="col-sm-7">
                                <?php
                                echo form_dropdown('vis_year_of_study', array('1' => '1', '2' => '2', '3' => '3', '4' => '4'), set_value('vis_year_of_study', $data['vis_year_of_study']), 'id="vis_year_of_study" class="form-control"');
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uboo_tboo_id" class="col-sm-5 control-label">Email:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="vis_name" placeholder="Email" name="vis_email"  value="<?php echo $data['vis_email']; ?>"   >
                                <?php echo form_error('vis_email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uboo_tboo_id" class="col-sm-5 control-label">Phone number:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="vis_name" placeholder="Phone mumber" name="vis_tel"  value="<?php echo $data['vis_tel']; ?>"   >
                                <?php echo form_error('vis_tel'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vis_from" class="col-sm-5 control-label">ORG/ Institute:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="vis_from" placeholder="From" name="vis_from" value="<?php echo $data['vis_from']; ?>"   >
                                <?php echo form_error('vis_from'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vis_position" class="col-sm-5 control-label">Position:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="vis_position" placeholder="Position" name="vis_position" value="<?php echo $data['vis_position']; ?>"   >
                                <?php echo form_error('vis_position'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vis_pvis_id" class="col-sm-5 control-label">Purpose:</label>
                            <div class="col-sm-7">
                                <select name="vis_pvis_id" class="form-control" id="vis_pvis_id">
                                    <?php
                                    foreach ($pvisitor as $key => $value) {
                                        if ($key == $data['vis_pvis_id']) {
                                            echo '<option value="' . $key . '" ' . set_select('vis_pvis_id', $key, TRUE) . '>' . $value . '</option>';
                                        } else {
                                            echo '<option value="' . $key . '" ' . set_select('vis_pvis_id', $key) . '>' . $value . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vis_pvis_id" class="col-sm-5 control-label">Other:</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" id="vis_name" placeholder="Comment" name="vis_comment" ><?php echo $data['vis_comment']; ?></textarea>

                                <!--<input type="text" class="form-control" id="vis_name" placeholder="Comment" name="vis_comment[]" required value="<?php echo $data['vis_comment']; ?>"   >-->
                                <?php echo form_error('vis_comment'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>