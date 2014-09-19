<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>borrows/borrows/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <!--<a href="<?php echo site_url(); ?>borrows/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>borrows/borrows/index">
            <div class="form-group">
                <label class="sr-only" for="use_name">Username</label>
                <input type="text" class="form-control input-sm" id="use_name" name="use_name" value="<?php echo set_value('use_name'); ?>" placeholder="User name">
            </div>
            <div class="form-group">
                <label class="sr-only" for="boo_title">Username</label>
                <input type="text" class="form-control input-sm" id="boo_title" name="boo_title" value="<?php echo set_value('boo_title'); ?>" placeholder="Book title">
            </div>
            <div class="form-group">
                <label class="sr-only" for="bor_date">Email</label>
                <input type="text" class="form-control input-sm" id="bor_date" name="bor_date" value="<?php echo set_value('bor_date'); ?>" placeholder="Borrow Date">
            </div>
            <!--            <div class="form-group">
                            <label class="sr-only" for="tbl_groups_gro_id">Group</label>
            <?php // echo form_dropdown('tbl_groups_gro_id', array('' => '--All Groups--') + $groups, set_value('tbl_groups_gro_id', $this->session->userdata('tbl_groups_gro_id')), 'class="form-control input-sm"') ?>
                        </div>-->
            <div class="form-group">
                <label class="sr-only" for="bor_status">Status</label>
                <?php echo form_dropdown('bor_status', array('' => '-- All Status --', '1' => 'Borrowed', '0' => 'Available', '2' => 'Late', '3' => 'Dateline'), set_value('bor_status', $this->session->userdata('bor_status')), 'class="form-control input-sm"') ?>
            </div>
            <button type="submit" class="btn btn-<?php echo PRIMARY; ?> btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Borrowing List</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th><input type="checkbox" class="checkall" /></th>
                    <th>Borrower</th>
                    <th>Book title</th>
                    <th>Mobile Phone</th>
                    <th>Check out date</th>
                    <th>Check in date</th>
                    <th>Extend to date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <?php if ($data->num_rows() > 0) { ?>
                    <?php foreach ($data->result_array() as $row) { ?> 
                        <?php if ($row['bor_return_date'] > date('Y-m-d') || ($row['bor_status'] == 0)) { ?>
                            <tr>
                            <?php } else if ($row['bor_return_date'] == date('Y-m-d')) { ?>
                            <tr class="warning">       
                            <?php } else { ?>
                            <tr class="error">   
                            <?php } ?>
                            <td><input type="checkbox" name="id[]" value="<?php $row['use_id'] ?>" class="checkid" /></td>

                            <td><a class="" href="<?php echo base_url(); ?>members/members/" title="View"><i class="glyphicon"></i>
                                <?php echo $row['use_name']; ?></a>
                            </td> 
                            <td><?php echo $row['boo_title']; ?></td>
                            <td><?php echo $row['use_tel']; ?></td>
                            <td><?php echo $row['bor_date']; ?></td>
                            <td><?php echo $row['bor_return_date']; ?></td>
                             <td><?php echo $row['bor_extend_date']; ?></td>
                            <td><?php echo ($row['bor_status'] == 1) ? 'Borrowed' : 'Available'; ?></td>
                            <td>

                                <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>borrows/borrows/edit/<?php
                                echo $row['bor_id'];
                                echo '/' . $this->uri->segment(4);
                                ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>borrows/borrows/delete/<?php
                                echo $row['bor_id'];
                                echo '/' . $this->uri->segment(4);
                                ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this user account? This user account will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
                                   <?php if ($row['bor_status'] == 1) { ?>
                                    <a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>borrows/borrows/checkin/<?php
                                    echo $row['bor_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="CheckIn" onclick="return confirm('Are you ready check all book? This borrow will be deleted permanently.');"><i class="glyphicon glyphicon-repeat"></i> Return</a>
                                   <?php } ?>
                                   <?php if ($row['bor_return_date'] < date('Y-m-d') && $row['bor_extend_date'] ==NULL  ) { ?>
                                    <a class="btn btn-warning btn-xs" href="<?php echo base_url(); ?>borrows/borrows/extend/<?php echo $row['bor_id'] . '/' . $this->uri->segment(4);
                           ?>" title="CheckIn" onclick="return confirm('Are you ready check all book? This borrow will be deleted permanently.');"><i class="glyphicon glyphicon-new-window"></i> Extend</a>
                                   <?php } ?>
                            </td>
                        </tr>

                    <?php } ?>
                <?php } else { ?>
                    <tr><td colspan="7">Empty</td></tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php echo $this->pagination->create_links(); ?>
</div>

