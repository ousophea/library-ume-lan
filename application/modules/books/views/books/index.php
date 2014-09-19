<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
    <div class="left">
        <!--For icon: http://getbootstrap.com/components/-->
        <a href="<?php echo site_url(); ?>books/books/add/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        <!--<a href="<?php echo site_url(); ?>users/permissions" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-lock"></i> Permission</a>-->
    </div>
    <div class="right">
        <h1><?php echo $title;  ?></h1>
    </div>
</div>
<div class="content">
    <div class="filter">
        <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>books/books/index">
            <div class="form-group">
                <label class="sr-only" for="sta_card_id">ISBN</label>
                <input type="text" class="form-control input-sm" id="boo_isbn" name="boo_isbn" value="<?php echo set_value('boo_isbn'); ?>" placeholder="Book ISBN">
            </div>
            <div class="form-group">
                <label class="sr-only" for="boo_title">Book Title</label>
                <input type="text" class="form-control input-sm" id="boo_title" name="boo_title" value="<?php echo set_value('boo_title'); ?>" placeholder="Book title">
            </div>
            <div class="form-group">
                <label class="sr-only" for="boo_major">Major</label>
                <input type="text" class="form-control input-sm" id="boo_major" name="boo_major" value="<?php echo set_value('boo_major'); ?>" placeholder="Major">
            </div>
            <div class="form-group">
                <label class="sr-only" for="boo_major">Author</label>
                <input type="text" class="form-control input-sm" id="boo_author" name="boo_author" value="<?php echo set_value('boo_author'); ?>" placeholder="Author">
            </div>
                        <div class="form-group">
                <label class="sr-only" for="boo_remark">Remark</label>
                <input type="text" class="form-control input-sm" id="boo_remark" name="boo_remark" value="<?php echo set_value('boo_remark'); ?>" placeholder="Remark">
            </div>
            <div class="form-group">
                <label class="sr-only" for="boo_status">Status</label>
                <?php echo form_dropdown('boo_status', array('' => '-- All Status --', '1' => 'Enabled', '0' => 'Disabled'), set_value('boo_status', $this->session->userdata('boo_status')), 'class="form-control input-sm"') ?>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Book List</h3>
             <span class="row col-md-offset-2"><?php echo 'Total book found'.$this->session->userdata('totalBook');?></span>
            <?php
            echo anchor('books/books/exportcsv', '<i class="glyphicon glyphicon-export"></i> Export', 'class="btn btn-success btn-sm"');
            ?>
        </div>
        <div class="panel-body  achievements-wrapper">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="checkall" /></th>
                        <th>ISBN</th>
                        <th>Book Title</th>
                        <th>Major</th>
                        <th>Classification</th>
                        <th>Author</th>
                        <th>Amount</th>
                        <th>Remark</th>
                        <th>Publisher</th>
                        <th># of Case</th>
                        <!--<th>Comment</th>-->
                        <th>Created</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if ($data->num_rows() > 0) { ?>
                        <?php foreach ($data->result_array() as $row) { ?>

                            <tr>
                                <td><input type="checkbox" name="id[]" value="<?php $row['boo_id'] ?>" class="checkid" /></td>
                                <td><?php echo $row['boo_isbn']; ?></td>
                                <td><?php echo $row['boo_title']; ?></td>
                                <td><?php echo $row['boo_major']; ?></td>
                                <td><?php echo $row['boo_classification']; ?></td>
                                <td><?php echo $row['boo_author']; ?></td>
                                <td><?php echo $row['boo_amount' ]; ?></td>
                                <td><?php echo $row['boo_remark']; ?></td>
                                <td><?php echo $row['boo_publisher']; ?></td>
                                <td><?php echo $row['boo_num_of_bookcase']; ?></td>
                                <!--<td><?php echo $row['boo_comment']; ?></td>-->
                                <td><?php echo $row['boo_reg_date']; ?></td>
                                <td><?php echo status_string($row['boo_status']); ?></td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>books/books/view/<?php
                                    echo $row['boo_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="View"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-default btn-xs" href="<?php echo base_url(); ?>books/books/edit/<?php
                                    echo $row['boo_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>books/books/delete/<?php
                                    echo $row['boo_id'];
                                    echo '/' . $this->uri->segment(4);
                                    ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this book record? This book record will be deleted permanently.');"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
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