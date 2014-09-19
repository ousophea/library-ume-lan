<?php
$data->result_array();
$data = $data->result_array[0];

$selected_group = NULL;
if($user_groups->num_rows() > 0){
    foreach ($user_groups->result_array() as $r){
        
        $selected_group[$r['gro_id']] = $r['gro_id'];
    }
}

?>
<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>dashboard/panel" class="btn btn-sm btn-<?php echo DEFAULTS; ?>"><i class="glyphicon glyphicon-arrow-left"></i> Go to Dashboard</a>
<!--        <a href="<?php echo site_url(); ?>users/accounts/add/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-<?php echo WARNING; ?>"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <a href="<?php echo site_url(); ?>users/accounts/edit/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-<?php echo WARNING; ?>"><i class="glyphicon glyphicon-plus-sign"></i> Edit</a>-->
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
                    <h3 class="panel-title">View user account</h3>
                </div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>Username</dt>
                        <dd><?php echo $data['use_name']; ?></dd>
                        <dt>Email</dt>
                        <dd><?php echo $data['use_email']; ?></dd>
                        <dt>Status</dt>
                        <dd><?php echo status_string($data['use_status']); ?></dd>
                        <dt>Created</dt>
                        <dd><i class="glyphicon glyphicon-calendar"></i> <?php echo get_date_string($data['use_created']); ?></dd>
                        <dt>Modified</dt>
                        <dd><i class="glyphicon glyphicon-calendar"></i> <?php echo get_date_string($data['use_modified']); ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Group belong to your account</h3>
                </div>
                <div class="panel-body">
                    <?php foreach ($user_groups->result_array() as $row) { ?>
                        <div class="checkbox">
                            <label><input disabled="disabled" type="checkbox" name="groups[]" value="<?php echo $row['gro_id']; ?>" <?php echo set_checkbox('groups[]', $selected_group[$row['gro_id']], TRUE); ?>><?php echo $row['gro_name']; ?></label>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>



