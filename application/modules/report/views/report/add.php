<!--TinyMCE-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>templates/tinymce/js/tinymce/skins/lightgray/skin.min.css" media="all" />

<!--<link href="<?php echo base_url(); ?>templates/bootstrap/css/print.css" rel="stylesheet" media="all">-->
<script type="text/javascript" src="<?php echo base_url(); ?>templates/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
//            Do not foget to config some paths in addon/tinymce/js/tinymce/plugins/filemanager/config/config.php
    tinymce.init({
        selector: "textarea.tinyMCE",
        theme: "modern",
        external_filemanager_path: '<?php echo base_url(); ?>templates/tinymce/js/tinymce/plugins/filemanager/',
        width: 880,
        height: 600,
        relative_urls: false,
        remove_script_host: false,
        subfolder: "",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor filemanager fullscreen"
        ],
        image_advtab: true,
        toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | image media | print preview code fullscreen"
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/tinymce/js/tinymce/plugins/filemanager/plugin.min.js"></script>
<!--End TinyMCE-->

<form class="form-inline" role="form" method="post" action="<?php echo site_url(); ?>report/report/add">
    <div class="toolbar col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="left">
            <!--For icon: http://getbootstrap.com/components/-->
            <a href="<?php echo site_url(); ?>report/report/index/<?php echo $this->uri->segment(4); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ok-circle"></i> Save</button>
            <button type="reset" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Reset</button>
            <a href="" onclick="return false;"  class=" print btn-sm btn-default"><i class="glyphicon glyphicon-print"></i> Print </a>

        </div>
        <div class="right">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="content">
        <div class="filter col-sm-10">
            <div class="form-group col-sm-4">
                <label class="col-sm-3 control-label" for="rep_sdate">From</label>
                <div class="input-group date col-sm-9" data-datepicker="true">
                    <input type="text" class="form-control" id="rep_sdate" placeholder="yyyy-mm-dd" name="rep_sdate"  required value="<?php echo set_value('rep_sdate'); ?>" >
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group col-sm-4">
                <label class="col-sm-3 control-label" for="rep_edate">To</label>
                <div class="input-group date col-sm-9 " data-datepicker="true">
                    <input type="text" class=" form-control" id="rep_edate" placeholder="yyyy-mm-dd" required name="rep_edate" value="<?php echo set_value('rep_edate'); ?>" >
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
                    </span>

                </div>

            </div>
            <button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Get Statistics </button>
        </div>
        <div class="row">

            <div class="col-md-10"  id="printable">

                <div class="panel panel-default">

                    <div style="text-align:center;" class="h3 center"> <div><img id="" src="<?php echo base_url(); ?>images/report_photo/header_library_report.png" title="UME" /></div>
                        <strong><br/>
                            Report <br/>
                            <?php echo $setStart . " to " . $setEnd ?>
                            <br/>Kampong Cham, Cambodia</strong>
                    </div>
                    <div class="panel-heading">                  

                        <h3 class="panel-title">Statistics</h3>
                    </div>
                    <div class="panel-body">

                        <ol class="h5">
                            <?php
                            $html_text = $total = $html_book_used_number = "";
                            if ($visitorNumber != "") {
                                foreach ($visitorNumber as $key => $value) {
                                    $html_text.= " " . $key . '  = ' . $value;
                                    $total += $value;
                                }

                                foreach ($bookUse as $key => $value) {
                                    $html_book_used_number .= ' <li class="list-group-item"> Number of ' . $key . '  were used: <strong> ' . $value . '</strong></li>';
                                }
                                echo form_hidden('rep_visitor_count', $total);
                            }
                            ?>
                            <li class="list-group-item">Total American Corner’s patrons: <strong><?php echo $total . " patrons ( " . $html_text . ")" ?></strong>
                                <ul>
                                    <li>Number of patrons using Internet: <strong> <?php echo $internetUse; ?>  patrons</strong></li>
                                    <li>Number of patrons using AC’s material except Internet: <strong><?php echo $total - $internetUse; ?> patrons</strong></li>
                                </ul></li>
                            <!--                            <li class="list-group-item">Number of books were used:     310 books</li>
                                                        <li class="list-group-item">Number of magazines were used: 84 magazines</li>-->
                            <?php echo $html_book_used_number ?>
                            <li class="list-group-item">Number of books were checked out: <strong>  <?php echo $borrowNumber; ?>  books</strong></li>
                            <li class="list-group-item">Number of books were checked in: <strong> <?php echo $returnNumber; ?>  books</strong></li>
                        </ol> 
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Programs</h3>
                    </div>
                    <div class="panel-body" font="22">
                        <div class="form-group">
                            <div class="col-sm-9 dynatable ">
                                <div id="getmce" class="panel-body"></div>
                                <textarea id="txt_mce"  class="form-control tinyMCE prototype" id="bor_comment" placeholder="Comment" name="rep_programs" value="<?php echo set_value('bor_comment'); ?>" ></textarea>
                                <?php echo form_error('bor_comment'); ?>

                            </div>
                        </div>
                        <div><br/> <br/>
                            <table class="table" style="text-align: center">
                                <tr><td style="width: 500"> <div  class="form-group col-sm-5" style="text-align: center">Seen and approved<br/>
                                            Executive Director of UME
                                        </div></td><td> <div  class="form-group col-sm-7" style="text-align: center">Reported by<br/>
                                            American Corner Coordinator
                                        </div></td></tr>
                            </table>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
<!--===============Print function ======================--> 
<script src="<?php echo base_url(); ?>templates/jQuery.print.js"></script>
<script type='text/javascript'>
    $(function() {
        $(".print").on('click', function() {
            $('#getmce').html(tinyMCE.activeEditor.getContent());
            $('#mce_52').hide();
//            $('.print').hide();
            $("#printable").print({
                globalStyles: false, // Use Global styles
                mediaPrint: false, // Add link with attrbute media=print
//                stylesheet: "http://fonts.googleapis.com/css?family=Inconsolata", //Custom stylesheet
                iframe: false, //Print in a hidden iframe
                noPrintSelector: ".avoid-this", // Don't print this
//                append: "Free jQuery Plugins<br/>", // Add this on top
//                prepend: "<br/>jQueryScript.net" // Add this at bottom
            });
            $('#getmce').hide();
            $('#mce_52').show();
//            $('.print').show();
        });
    });
</script>
<!--================End print======================-->