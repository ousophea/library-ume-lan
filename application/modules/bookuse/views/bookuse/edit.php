<?php
$data->result_array();
$data = $data->result_array[0];
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>bookuse/bookuse/edit/<?php
echo $data['uboo_id'];
echo '/' . $this->uri->segment(5); // segment(5) for pagination
?>">
	<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="left">
			<!--For icon: http://getbootstrap.com/components/-->
			<a href="<?php echo site_url(); ?>bookuse/bookuse/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
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
                        <h3 class="panel-title">Book used Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="uboo_tboo_id" class="col-sm-3 control-label">Type of Book:</label>
                            <div class="col-sm-9">
                                <select name="uboo_tboo_id" class="form-control" id="uboo_tboo_id">
                                    <?php
                                    foreach ($tbookuse as $key => $value) {
                                        if ($key == $data['uboo_tboo_id']) {
                                            echo '<option value="' . $key . '" ' . set_select('uboo_tboo_id', $key, TRUE) . '>' . $value . '</option>';
                                        }else{
                                            echo '<option value="' . $key . '" ' . set_select('uboo_tboo_id', $key) . '>' . $value . '</option>';
                                        }
                                        
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uboo_number" class="col-sm-3 control-label">Number of Book:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="uboo_number" placeholder="Number of book" name="uboo_number" value="<?php echo $data['uboo_number']; ?>"   required>
                                <?php echo form_error('uboo_number'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uboo_status" class="col-sm-3 control-label">Enable</label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="uboo_status" id="uboo_status"  value="0" <?php echo set_checkbox('uboo_status', 1, ($data['uboo_status'] == 1) ? TRUE : FALSE); ?>> Check to enable this book counting</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>