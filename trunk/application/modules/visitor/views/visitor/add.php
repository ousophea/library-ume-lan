<form class="form-inline" role="form" method="post" action="<?php echo site_url(); ?>visitor/visitor/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>visitor/visitor/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
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
                        <h3 class="panel-title">Visitor Information</h3>
                    </div>
                    <div class="panel-body achievements-wrapper" > 
                        <table  class="table table-striped dynatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gander</th>
                                    <th>Type</th>
                                    <th>Year</th>
                                    <th>ORG/ Institute</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Position</th>
                                    <th>Purpose</th>
                                    <th>Other</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="prototype">
                                    <td>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" id="vis_name" placeholder="Name" name="vis_name[]" required value="<?php echo set_value('vis_name'); ?>"   >
                                            <?php echo form_error('vis_name'); ?>
                                        </div>
                                    </td>
                                    <td>                    
                                        <div class="col-sm">       
                                            <?php
                                            echo form_dropdown('vis_sex[]', array('' => '---select gander', 'm' => 'Male', 'f' => 'Female'), set_value('vis_sex'), 'id="vis_sex" required class="form-control"');
                                            ?></div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="vis_tvis_id[]" class="form-control" id="vis_tvis_id" required>
                                                <option value="">--group--</option>
                                                <?php
                                                foreach ($alltvisitor as $key => $value) {
                                                    echo '<option value="' . $key . '" ' . set_select('vis_tvis_id', $key) . '>' . $value . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div></td>
                                    <td>
                                        <div class="col-sm">       
                                            <?php
                                            echo form_dropdown('vis_year_of_study[]', array('' => '---year---', '1' => '1', '2' => '2', '3' => '3', '4' => '4'), set_value('vis_year_of_study'), 'id="vis_year_of_study" class="form-control"');
                                            ?></div>
                                    </td>
                                    <td>                                        
                                        <div class="col-sm">
                                            <input type="text" class="form-control" id="vis_from" placeholder="From" name="vis_from[]" value="<?php echo set_value('vis_from'); ?>"   >
                                            <?php echo form_error('vis_from'); ?>
                                        </div></td>
                                    <td>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" id="vis_name" placeholder="Email" name="vis_email[]"  value="<?php echo set_value('vis_email'); ?>"   >
                                            <?php echo form_error('vis_email'); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" id="vis_name" placeholder="Phone mumber" name="vis_tel[]"  value="<?php echo set_value('vis_tel'); ?>"   >
                                            <?php echo form_error('vis_tel'); ?>
                                        </div>
                                    </td>
                                    <td>                                        
                                        <div class="col-sm">
                                            <input type="text" class="form-control" id="vis_position" placeholder="Position" name="vis_position[]" value="<?php echo set_value('vis_position'); ?>"   >
                                            <?php echo form_error('vis_position'); ?>
                                        </div></td>

                                    <td>
                                        <div class="col-sm">
                                            <select name="vis_pvis_id[]" class="form-control" required id="vis_pvis_id">
                                                <option value="">--purpose--</option>
                                                <?php
                                                foreach ($pvisitor as $key => $value) {
                                                    echo '<option value="' . $key . '" ' . set_select('vis_pvis_id', $key) . '>' . $value . '</option>';
                                                }
                                                ?>
                                            </select></div></td>
                                    <td>
                                        <div class="col-sm">
                                            <textarea class="form-control" id="vis_name" placeholder="Comment" name="vis_comment[]" ><?php echo set_value('vis_comment'); ?></textarea>
                                            <!--<input type="text" class="form-control" id="vis_name" placeholder="Comment" name="vis_comment[]"  value="<?php echo set_value('vis_comment'); ?>"   >-->
                                            <?php echo form_error('vis_comment'); ?>
                                        </div>
                                    </td>
                                    <td><button class=" btn btn-sm btn-warning remove"><i class="glyphicon glyphicon-minus-sign"></i></button> </td>
                                </tr>


                            </tbody>
                        </table>
                        <button type="button"  class="btn btn-sm btn-success add" id="btnAdd"><i class="glyphicon glyphicon-plus-sign"></i></button>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<script>
    $(document).ready(function() {
        var id = 0;

        // Add button functionality
        $("#btnAdd").click(function() {
            id++;
            var master = $(".dynatable");

            // Get a new row based on the prototype row
            var prot = master.find(".prototype").clone();
            prot.attr("class", "")
            prot.find(".id").attr("value", id);
            master.find("tbody").append(prot);

        });

        // Remove button functionality
        $(document).on("click", "table.dynatable button.remove", function() {
            if (id > 0) {
                $(this).parents("tr").remove();
                id--;
            }

        });
    });
</script>