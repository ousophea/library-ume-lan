<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>bookuse/bookuse/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>bookuse/bookuse/index">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="uboo_sdate">From</label>
                <div class="input-group date" data-datepicker="true">
                    <input type="text" class="form-control" id="uboo_sdate" placeholder="yyyy-mm-dd" name="uboo_sdate" value="<?php echo set_value('uboo_sdate'); ?>" >
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <?php echo form_error('uboo_sdate'); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="uboo_edate">To</label>
                <div class="input-group date" data-datepicker="true">
                    <input type="text" class="form-control" id="uboo_edate" placeholder="yyyy-mm-dd" name="uboo_edate" value="<?php echo set_value('uboo_edate'); ?>" >
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <?php echo form_error('uboo_edate'); ?>
                </div>
            </div>

<!--            <div class="form-group">
                <label class="sr-only" for="uboo_tboo_id">Type of book</label>
                <input type="text" class="form-control input-sm" id="uboo_tboo_id" name="uboo_tboo_id" value="<?php echo set_value('uboo_tboo_id'); ?>" placeholder="Type of book">
            </div>-->
          
            <!--            <div class="form-group">
                            <label class="sr-only" for="boo_status">Status</label>
            
            <?php echo form_dropdown('boo_status', array('' => '-- All Status --', '1' => 'Enabled', '0' => 'Disabled'), set_value('boo_status', $this->session->userdata('boo_status')), 'class="form-control input-sm"') ?>
                        </div>-->

            <div class="form-group">
                <select name="uboo_tboo_id" class="form-control" id="uboo_tboo_id">
                    <option value="">--All book types--</option>
                    <?php
                    foreach ($tbookuse as $key => $value) {
                        echo '<option value="' . $key . '" ' . set_select('uboo_tboo_id', $key) . '>' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Book used List</h3>
            <?php
            foreach ($ubookNumber as $key => $value) {
                echo ' Number of ' . $key . ' used = ' . $value;
            }
            ?>
            <?php
//            echo anchor('bookuse/bookuse/exportcsv', '<i class="glyphicon glyphicon-export"></i> Export', 'class="btn btn-success btn-sm"');
            ?>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="checkall" /></th>
                        <th>Number of book used</th>
                        <th>Type of book</th>
                        <th>Counter</th>
                        <th>Date</th>
                        <th>Modified Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data->num_rows() > 0) { ?>
                        <?php foreach ($data->result_array() as $row) { ?>

                            <tr>
                                <td><input type="checkbox" name="id[]" value="<?php $row['uboo_id'] ?>" class="checkid" /></td>
                                <td><?php echo $row['uboo_number']; ?></td>
                                <td><?php echo $row['tboo_title']; ?></td>
                                <td><?php echo $row['use_name']; ?></td>
                                <td><?php echo $row['uboo_cdate']; ?></td>
                                <td><?php echo $row['uboo_mdate']; ?></td>
                                <td>
<!--                                    <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>bookuse/bookuse/view/<?php
                                    echo $row['uboo_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>-->
                                    <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>bookuse/bookuse/edit/<?php
                                    echo $row['uboo_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>bookuse/bookuse/delete/<?php
                                    echo $row['uboo_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this book record? This book record will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
                                </td>
                            </tr>

                        <?php } ?>
                    <?php } else { ?>
                        <tr><td colspan="7">Empty</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo $this->pagination->create_links(); ?>
</div>