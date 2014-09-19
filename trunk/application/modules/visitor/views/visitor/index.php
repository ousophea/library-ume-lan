<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>visitor/visitor/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>visitor/visitor/index">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="vis_sdate">From</label>
                <div class="input-group date" data-datepicker="true">
                    <input type="text" class="form-control" id="vis_sdate" placeholder="yyyy-mm-dd" name="vis_sdate" value="<?php echo set_value('vis_sdate'); ?>" >
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <?php echo form_error('vis_sdate'); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="vis_edate">To</label>
                <div class="input-group date" data-datepicker="true">
                    <input type="text" class="form-control" id="vis_edate" placeholder="yyyy-mm-dd" name="vis_edate" value="<?php echo set_value('vis_edate'); ?>" >
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <?php echo form_error('vis_edate'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="sr-only" for="vis_sex">Status</label>
                <?php echo form_dropdown('vis_sex', array('' => '-- All Gander --', 'm' => 'Male', 'f' => 'Female'), set_value('vis_sex', $this->session->userdata('vis_sex')), 'class="form-control input-sm"') ?>
            </div>
            <div class="form-group">
                <select name="vis_tvis_id" class="form-control" id="vis_tvis_id">
                    <option value="">--All Visitor types--</option>
                    <?php
                    foreach ($alltvisitor as $key => $value) {
                        echo '<option value="' . $key . '" ' . set_select('vis_tvis_id', $key) . '>' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <select name="vis_pvis_id" class="form-control" id="vis_pvis_id">
                    <option value="">--All Purpose--</option>
                    <?php
                    foreach ($pvisitor as $key => $value) {
                        echo '<option value="' . $key . '" ' . set_select('vis_pvis_id', $key) . '>' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Visitor  List</h3>
            <?php
            echo "Number of record found : ".$visitorNumber;
            ?>
            <?php
//            echo anchor('visitor/visitor/exportcsv', '<i class="glyphicon glyphicon-export"></i> Export', 'class="btn btn-success btn-sm"');
            ?>
        </div>
        <div class="panel-body achievements-wrapper">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="checkall" /></th>
                        <th>Name</th>
                        <th>Gander</th>
                        <th>Type</th>
                        <th>Year</th>
                        <th>ORG/ Institute</th>
                        <th>Position</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Purpose</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data->num_rows() > 0) { ?>
                        <?php foreach ($data->result_array() as $row) { ?>

                            <tr>
                                <td><input type="checkbox" name="id[]" value="<?php $row['vis_id'] ?>" class="checkid" /></td>
                                <td><?php echo $row['vis_name']; ?></td>
                                <td><?php echo strtoupper($row['vis_sex']); ?></td>
                                <td><?php echo $row['tvis_title']; ?></td>
                                <td><?php echo $row['vis_year_of_study']; ?></td>
                                <td><?php echo $row['vis_from']; ?></td>
                                <td><?php echo $row['vis_position']; ?></td>
                                 <td><?php echo $row['vis_tel']; ?></td>
                                  <td><?php echo $row['vis_email']; ?></td>
                                <td><?php echo $row['vis_cdate']; ?></td>
                                <td><?php echo $row['pvis_name']; ?></td>
                                 <td><?php echo $row['vis_comment']; ?></td>
                                <td >
        <!--                                    <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>visitor/visitor/view/<?php
                                    echo $row['vis_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>-->
                                    <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>visitor/visitor/edit/<?php
                                    echo $row['vis_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>visitor/visitor/delete/<?php
                                    echo $row['vis_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this visitor record? This visitor record will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
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