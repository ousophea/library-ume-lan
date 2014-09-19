<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">

        <title><?php echo $title; ?></title>
		<style type="text/css" media="print">
			@page { 
				size: A4 landscape;
				margin:0.5cm;
			}
			header nav, footer {
				display: none;
			}
		</style>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>templates/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>templates/bootstrap/css/bootstrap-datepicker.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>templates/bootstrap/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>templates/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>templates/bootstrap/js/docs.min.js"></script>
		<script src="<?php echo base_url(); ?>templates/bootstrap/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>templates/bootstrap/js/jquery.validate.js"></script>
		<script src="<?php echo base_url(); ?>templates/bootstrap/js/dashboard.js"></script>
    </head>

    <body>        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12 main content">
					<?php
						$comma = ', ';
						foreach($data as $item):
							$header = $item['header'];
							$sch_id = $header['sch_id'];
					?>
							<div style="margin-top:10px;">
								<div class="pull-left">
									<div style="width:280px;text-align:center;">
									<br>
									<img src="<?php echo base_url(); ?>images/logo.png" alt="" width="70"/><br>
									សាខាសាកលវិទ្យាល័យគ្រប់គ្រង និងសេដ្ឋកិច្ច<br>
									ខេត្តកំពង់ចាម
									</div>
								</div>
								<div class="pull-right">
									<div style="width:200px;text-align:center;">
										<p>
											ព្រះរាជាណាចក្រកម្ពុជា<br>
											ជាតិ សាសនា ព្រះមហាក្សត្រ
										</p>
									</div>
								</div>
							</div>
							<div style="clear:both;">&nbsp;</div>
							<div id="panel<?php echo $sch_id;?>">
					<?php
							if($header):
								echo '<div style="text-align:center;font-size:15px;">';
									preg_match('/weeken/',strtolower($header['shi_name']),$res);
									echo (count($res)>0?'Schedule for Saturday to Sunday Class':'Schedule for Monday to Friday Class').br();
									echo 'ឆ្នាំ '.$header['sch_year_number'].$comma;
									echo 'ឆមាស '.$header['sch_semester'].$comma;
									echo 'ជំនាន់ '.$header['gen_title'].$comma;
									echo 'វេន '.$header['shi_name'];
									echo " (".$header['cla_name'].")".br();
									echo $header['maj_name'].br();
									echo 'ឆ្នាំសិក្សា: '.$header['sch_academic_year'].br(2);
								echo '</div>';				
							endif;
							$body = $item['body'];
							if($body):
								$times = $body['times'];
								$sections = $body['sections'];
								$num = 0;
								foreach($times as $indd=>$tim){
									$section = $sections[$indd];
									$num = count($section);
									break;
								}
					?>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th width="20%">Time of Study</th>
											<?php if($num==2){ ?>
											<th>Saturday</th>
											<th>Sunday</th>
											<?php }else{ ?>
											<th>Monday</th>
											<th>Tuesday</th>
											<th>Wednesday</th>
											<th>Thursday</th>
											<th>Friday</th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										
										<?php
										foreach($times as $ind=>$time):
										?>
										<tr>
											<td><?php echo $time; ?></td>
										<?php
											foreach($sections[$ind] as $col):
										?>
											<td>
											<?php
												echo $col['subject'].br();
												echo ($col['teacher']?'Tec: ':'').$col['teacher'].br();
												echo ($col['room']?'រៀនបន្ទប់: ':'').$col['room'];								
											?>
											</td>
										<?php
											endforeach;
										?>
										</tr>
										<?php
										endforeach;
										?>
										
									</tbody>
								</table> 
					<?php
							endif;
					?>
							</div>
							<div>&nbsp;</div>
							<div>
								<div class="pull-left">
									<div style="width:350px;">
										<p>
										សំគាល់ៈ - ចំពោះថ្ងៃច័ន្ទ ដល់ ពុធ សិក្សាបន្ទប់រួមគ្នា<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										- ចំពោះថ្ងៃព្រហស្បត៌៍-សុក្រ សិក្សាបន្ទប់ផ្សេងគ្នា<br>
										</p>
										<p style="text-align:center;">
										បានឃើញ និងឯកភាព<br>
										នាយកសាខា
										</p>
									</div>
								</div>
								<div class="pull-right">
									<div style="width:260px; text-align:center;">
										<p>
											កំពង់ចាម,ថ្ងៃទី.........ខែ...............ឆ្នាំ២០១៤<br>
											ប្រធានដេប៉ាតឺម៉ង់ថ្នាក់ឆ្នាំមូលដ្ឋាន
										</p>
									</div>
								</div>								
							</div>
							<div style="clear:both;">&nbsp;</div>
					<?php
						endforeach;
					?>
                </div>
            </div>
        </div>


    </body>
</html>

<script>
	setTimeout(function(){
		window.print();
		window.close();
	},50);
</script>

