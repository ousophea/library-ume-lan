<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>users/accounts/changepassword">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>users/accounts/profile/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
            <button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">User account</h3>
                    </div>
                    <div class="panel-body">
<!--                        <div class="form-group">
                            <label for="use_pass_old" class="col-sm-2 control-label">Current Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="use_pass" placeholder="Current password" name="password_old" value="<?php echo set_value('password_old'); ?>" required title="Please enter your current password">
                                <?php echo form_error('password_old'); ?>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="use_pass" class="col-sm-2 control-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="use_pass" placeholder="Password" name="use_pass" value="<?php echo set_value('use_pass'); ?>"  pattern=".{6,50}" required title="Allow enter from 6 to 50 characters">
                                <?php echo form_error('use_pass'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="use_passc" class="col-sm-2 control-label">Confirm New Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="use_passc" placeholder="Password" name="use_passc" value="<?php echo set_value('use_passc'); ?>"  pattern=".{6,50}" required title="Allow enter from 6 to 50 characters">
                                <?php echo form_error('use_passc'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>