<?php
$data->result_array();
$data = $data->result_array[0];
?>
<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>books/books/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
        <a href="<?php echo site_url(); ?>books/books/add/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <a href="<?php echo site_url(); ?>books/books/edit/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Edit</a>
    </div>
    <div class="right">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<div class="content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">View Book</h3>
        </div>
        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>ISBN</dt>
                <dd><?php echo $data['boo_isbn']; ?></dd>
                <dt>Book Title</dt>
                <dd><?php echo $data['boo_title']; ?></dd>
                <dt>Major</dt>
                <dd><?php echo $data['boo_major']; ?></dd>
                <dt>Classification</dt>
                <dd><?php echo strtoupper($data['boo_classification']); ?></dd>
                <dt>Author</dt>
                <dd><?php echo $data['boo_author']; ?></dd>
                <dt>Amount</dt>
                <dd><?php echo $data['boo_amount']; ?></dd>
                <dt>Publisher</dt>
                <dd><i class=""></i> <?php echo $data['boo_publisher']; ?></dd>
                <dt># of Case</dt>
                <dd><i class="glyph"></i> <?php echo $data['boo_num_of_bookcase']; ?></dd>
                <dt>Remark</dt>
                <dd><?php echo $data['boo_remark']; ?></dd>
                <dt>Status</dt>
                <dd><?php echo $data['boo_status']; ?></dd>
<!--                <dt>Shelve NUmber</dt>
                <dd><?php echo $data['boo_she_id']; ?></dd>-->
                <dt>Comment</dt>
                <dd><?php echo $data['boo_comment']; ?></dd>
                <dt>Created</dt>
                <dd><i class="glyphicon glyphicon-calendar"></i> <?php echo get_date_string($data['boo_reg_date']); ?></dd>

            </dl>
        </div>
    </div>
</div>