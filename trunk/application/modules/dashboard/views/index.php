<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <!--    <div class="left">
            For icon: http://getbootstrap.com/components/
            <a href="<?php echo site_url(); ?>users/accounts/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
            <a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>
        </div>-->
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Book Summary</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bs-glyphicons">
                            <ul class="bs-glyphicons-list">
                                <li>
                                    <span class="glyphicon glyphicon-book"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>books/books" >
                                            <?php echo "Total book <br/>" . $AllBooks; ?>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-ok"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>books/books" >
                                            <?php echo "Available book <br />" . $availableBook; ?>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-stats"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>report/report" >
                                            <?php echo "Report <br />"  ?>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Borrowing summary</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bs-glyphicons">
                            <ul class="bs-glyphicons-list">
                                <li>
                                    <span class="glyphicon glyphicon-bold"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>borrows/borrows" >
                                            <?php echo "Borrowed book <br/>" . $borrowNumber; ?>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-warning-sign"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>borrows/borrows/index/late" >
                                            <?php echo "Late return <br />" . $lateReturn; ?>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-check"></span>
                                    <span class="glyphicon-class">
                                        <a href="<?php echo base_url(); ?>borrows/borrows/index/dateline" >
                                            <?php echo "Dateline return<br />" . $returnToday; ?>
                                        </a>
                                    </span>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

