<div class="col-sm-3 col-md-2 sidebar">
    <div class="sidebar-head">
        <h1>Navigation</h1>
    </div>
    <ul class="nav nav-sidebar">
        <li class="sidebar-header">Book Management</li>
        <li class=""><a href="<?php echo site_url(); ?>books/books"><i class="glyphicon glyphicon-list"></i> Book List</a></li>
        <li class=""><a href="<?php echo site_url(); ?>books/books/add"><i class="glyphicon glyphicon-plus"></i> Add New Book</a></li>
        <li class="sidebar-header">Borrowing Management</li>
        <li class=""><a href="<?php echo site_url(); ?>borrows/borrows"><i class="glyphicon glyphicon-list"></i> Borrow List</a></li>

        <li class=""><a href="<?php echo site_url(); ?>borrows/borrows/add"><i class="glyphicon glyphicon-plus"></i> Check out book</a></li>
        <li class=""><a href="<?php echo site_url(); ?>borrows/borrows/"><i class="glyphicon glyphicon-plus"></i> Check in book</a></li>
        <li class="sidebar-header">Visitor Management</li>
        <li class=""><a href="<?php echo site_url(); ?>visitor/visitor"><i class="glyphicon glyphicon-list"></i> Visitor List</a></li>
        <li class=""><a href="<?php echo site_url(); ?>visitor/visitor/add"><i class="glyphicon glyphicon-plus"></i> Add Visitor</a></li>
        <li class="sidebar-header">Book used counter</li>
        <li class=""><a href="<?php echo site_url(); ?>bookuse/bookuse"><i class="glyphicon glyphicon-list"></i> Book used counter List</a></li>
        <li class=""><a href="<?php echo site_url(); ?>bookuse/bookuse/add"><i class="glyphicon glyphicon-plus"></i> Add Counter</a></li>
        <li class="sidebar-header">Member Management</li>
        <li class=""><a href="<?php echo site_url(); ?>members/members"><i class="glyphicon glyphicon-list"></i> Member List</a></li>
        <li class=""><a href="<?php echo site_url(); ?>members/members/add"><i class="glyphicon glyphicon-plus"></i> Add Member</a></li>
        <?php
        $user = $this->session->userdata('user');
        if($user['gro_name']=="Admin"){ ?>
        <li class="sidebar-header">Report</li>
        <li class=""><a href="<?php echo site_url(); ?>report/report"><i class="glyphicon glyphicon-list"></i>Report List</a></li>
        <li class=""><a href="<?php echo site_url(); ?>report/report/add"><i class="glyphicon glyphicon-plus"></i>Create report</a></li>
        <li class="sidebar-header">User Management</li>
        <li class=""><a href="<?php echo site_url(); ?>users/accounts"><i class="glyphicon glyphicon-user"></i> Manage Users</a></li>
        <?php } ?>
    </ul>
</div>