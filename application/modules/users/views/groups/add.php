<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>users/groups/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>users/groups/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-<?php echo DEFAULTS; ?>"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-<?php echo WARNING; ?>"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
            <button type="reset" class="btn btn-sm btn-<?php echo DEFAULTS; ?>"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Form Create</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="gro_name" class="col-sm-2 control-label">Group Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="gro_name" placeholder="Group Name" name="gro_name" value="<?php echo set_value('gro_name'); ?>"  pattern=".{2,50}" required title="Allow enter from 2 to 50 characters">
                        <?php echo form_error('gro_name'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="gro_status" class="col-sm-2 control-label">Enable</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label><input type="checkbox" name="gro_status" id="gro_status" value="1" <?php echo set_checkbox('gro_status', 1, TRUE); ?>> Check to enable this group</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="gro_description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="gro_description" id="gro_description"><?php echo set_value('gro_description'); ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>