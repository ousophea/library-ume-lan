<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>report/report/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>report/report/index">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="rep_sdate">From</label>
                <div class="input-group date" data-datepicker="true">
                    <input type="text" class="form-control" id="rep_sdate" placeholder="yyyy-mm-dd" name="rep_sdate" value="<?php echo set_value('rep_sdate'); ?>" >
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <?php echo form_error('rep_sdate'); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="rep_edate">To</label>
                <div class="input-group date" data-datepicker="true">
                    <input type="text" class="form-control" id="rep_edate" placeholder="yyyy-mm-dd" name="rep_edate" value="<?php echo set_value('rep_edate'); ?>" >
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <?php echo form_error('rep_edate'); ?>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Report  List</h3>
            <?php
//            echo "Number of record found : ".$reportNumber;
            ?>
            <?php
//            echo anchor('report/report/exportcsv', '<i class="glyphicon glyphicon-export"></i> Export', 'class="btn btn-success btn-sm"');
            ?>
        </div>
        <div class="panel-body achievements-wrapper">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="checkall" /></th>
                        <th>Start from</th>
                        <th>To</th>
                        <th>Reporting date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data->num_rows() > 0) { ?>
                        <?php foreach ($data->result_array() as $row) { ?>

                            <tr>
                                <td><input type="checkbox" name="id[]" value="<?php $row['rep_id'] ?>" class="checkid" /></td>
                                <td><?php echo $row['rep_sdate']; ?></td>
                                <td><?php echo strtoupper($row['rep_edate']); ?></td>
                                <td><?php echo $row['rep_cdate']; ?></td>
                                <td >
                                    <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>report/report/edit/<?php
                                    echo $row['rep_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>report/report/delete/<?php
                                    echo $row['rep_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this report record? This report record will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
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