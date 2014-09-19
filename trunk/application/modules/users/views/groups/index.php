<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>users/groups/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-<?php echo WARNING; ?>"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>users/groups/index">
            <div class="form-group">
                <label class="sr-only" for="gro_name">Group Name</label>
                <input type="text" class="form-control input-sm" id="gro_name" name="gro_name" value="<?php echo set_value('gro_name'); ?>" placeholder="Enter Group Name">
            </div>
            <div class="form-group">
                <label class="sr-only" for="gro_status">Status</label>
                <?php echo form_dropdown('gro_status', array(''=>'-- All Status --','1'=>'Enabled', '0'=>'Desabled'), set_value('gro_status', $this->session->userdata('gro_status')), 'class="form-control input-sm"') ?>
            </div>
            <button type="submit" class="btn btn-<?php echo PRIMARY; ?> btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Group List</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th><input type="checkbox" class="checkall" /></th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Modified</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                <?php if ($data->num_rows() > 0) { ?>
                    <?php foreach ($data->result_array() as $row) { ?>

                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?php $row['gro_id'] ?>" class="checkid" /></td>
                            <td><?php echo $row['gro_name']; ?></td>
                            <td><?php echo ($row['gro_status'] == 1) ? "Enabled" : "Disabled"; ?></td>
                            <td><?php echo date('M d, Y', strtotime($row['gro_created'])); ?></td>
                            <td><?php echo date('M d, Y', strtotime($row['gro_modified'])); ?></td>
                            <td><?php echo get_content_teaser($row['gro_description']); ?></td>
                            <td>
                                <a class="btn btn-<?php echo DEFAULTS; ?> btn-xs" href="<?php echo base_url(); ?>users/groups/view/<?php echo $row['gro_id'];
                echo '/' . $this->uri->segment(4); ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                <a class="btn btn-<?php echo DEFAULTS; ?> btn-xs" href="<?php echo base_url(); ?>users/groups/edit/<?php echo $row['gro_id'];
                echo '/' . $this->uri->segment(4); ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <a class="btn btn-<?php echo DANGER; ?> btn-xs" href="<?php echo base_url(); ?>users/groups/delete/<?php echo $row['gro_id'];
                echo '/' . $this->uri->segment(4); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this group? This group will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
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

