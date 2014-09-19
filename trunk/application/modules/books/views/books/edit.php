<?php
$data->result_array();
$data = $data->result_array[0];
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>books/books/edit/<?php
echo $data['boo_id'];
echo '/' . $this->uri->segment(5); // segment(5) for pagination
?>">
	<div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="left">
			<!--For icon: http://getbootstrap.com/components/-->
			<a href="<?php echo site_url(); ?>books/books/index/<?php echo $this->uri->segment(5); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
			<button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Update</button>
			<button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
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
                        <h3 class="panel-title">Book Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="boo_isbn" class="col-sm-3 control-label">ISBN</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="boo_isbn" placeholder="Book ISBN" name="boo_isbn" value="<?php echo $data['boo_isbn']; ?>"   pattern=".{3,50}" required title="Allow enter from 3 to 50 characters">
                                <?php echo form_error('boo_isbn'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="boo_title" class="col-sm-3 control-label">Book title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="boo_title" placeholder="Book title" name="boo_title" value="<?php echo $data['boo_title']; ?>"  pattern=".{3,50}" required title="Allow enter from 3 to 50 characters">
                                <?php echo form_error('boo_title'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="boo_major" class="col-sm-3 control-label">Major</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="boo_major" placeholder="Major" name="boo_major" value="<?php echo $data['boo_major']; ?>" >
                                <?php echo form_error('boo_major'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="boo_classification" class="col-sm-3 control-label">Classification</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="boo_classification" placeholder="Classification" name="boo_classification" value="<?php echo $data['boo_classification']; ?>" >
                                <?php echo form_error('boo_classification'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="boo_amount" class="col-sm-3 control-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="sta_phone" placeholder="Amount" name="boo_amount" value="<?php echo $data['boo_amount']; ?>" pattern=".{1,6}" required title="Allow enter from 1 to 6 characters">
                                <?php echo form_error('boo_amount'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="boo_publisher" class="col-sm-3 control-label">Publisher</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="boo_publisher" placeholder="Book Publisher" name="boo_publisher" value="<?php echo $data['boo_publisher']; ?>"  >
                                <?php echo form_error('boo_publisher'); ?>
                            </div>
                        </div>
                                  <div class="form-group">
                            <label for="boo_author" class="col-sm-3 control-label">Author</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="boo_author" placeholder="Book title" name="boo_author" value="<?php echo $data['boo_author']; ?>"  pattern=".{3,50}" required title="Allow enter from 3 to 50 characters">
                                <?php echo form_error('boo_author'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="boo_remark" class="col-sm-3 control-label">Remark</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="boo_remark" placeholder="Rmark" name="boo_remark" value="<?php echo $data['boo_remark']; ?>"   />
                                <?php echo form_error('boo_remark'); ?>
                            </div>
                        </div>
                            <div class="form-group">
                            <label for="boo_num_of_bookcase" class="col-sm-3 control-label">Number of bookcase</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="boo_remark" placeholder="Bookcase" name="boo_num_of_bookcase" value="<?php echo $data['boo_num_of_bookcase']; ?>"   />
                                <?php echo form_error('boo_num_of_bookcase'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="boo_comment" class="col-sm-3 control-label">Comment</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="boo_comment" placeholder="Comment" name="boo_comment" value="<?php echo $data['boo_comment']; ?>"   />
                                <?php echo form_error('boo_comment'); ?>
                            </div>
                        </div>
                        <!--                        <div class="form-group">
                                                    <label for="boo_author" class="col-sm-3 control-label">Author</label>
                                                    <div class="col-sm-9">
                                                        <select name="boo_author" class="form-control" id="sta_position">
                        <?php
                        foreach ($author as $key => $value) {
                            echo '<option value="' . $key . '" ' . set_select('boo_aut_id', $key) . '>' . $value . '</option>';
                        }
                        ?>
                                                        </select>
                                                    </div>
                                                </div>-->
              
                        <div class="form-group">
                            <label for="boo_status" class="col-sm-3 control-label">Enable</label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="boo_status" id="boo_status"  value="0" <?php echo set_checkbox('boo_status', 1, ($data['boo_status'] == 1) ? TRUE : FALSE); ?>> Check to enable this book</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>