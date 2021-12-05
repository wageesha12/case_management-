
<?php
include 'conn.php';
include 'session_handler.php';

error_reporting(0);
?>

<?php
		if(isset($_GET['re'])){
			
			$sql13="SELECT * FROM requestdocument_details WHERE requestdoc_key='$_GET[re]' AND finact=0";
			$result13 = mysqli_query($link,$sql13);
			while($row13=mysqli_fetch_array($result13)){
				$k1=$row13['casedetails_key'];
				$k2=$row13['casecycle_key'];
				$k3=$row13['request_dte'];
				$k4=$row13['document_name'];
				$k5=$row13['submission_date'];
				$k6=$row13['upload_dte'];
			}
			
			$sql2="SELECT * FROM case_details WHERE casedetail_key='$k1' AND finact=0";
			$result2 = mysqli_query($link,$sql2);
			while($row2=mysqli_fetch_array($result2)){
				$t2=$row2['case_date'];
				$t3=$row2['case_code'];
				$t4=$row2['lawyer_key'];
				$t5=$row2['case_key'];
				$t6=$row2['court_key'];
				$t7=$row2['courttype_key'];
				$t8=$row2['client_key'];
				$t9=$row2['compalintype_key'];
				$t10=$row2['case_year'];
				$t11=$row2['amount'];
				$t12=$row2['party'];
			}
			
			$sql3="SELECT * FROM lowyer_registration WHERE lowyer_key='$t4' AND finact=0";
			$result3 = mysqli_query($link,$sql3);
			while($row3=mysqli_fetch_array($result3)){
				$a1=$row3['lowyer_name'];
				$a2=$row3['qulification'];
				$a3=$row3['contact_no'];
				$a4=$row3['office_address'];
				$a5=$row3['email'];
			}
			
			$sql8="SELECT * FROM case_master WHERE casemas_key='$t5' AND finact=0";
			$result8 = mysqli_query($link,$sql8);
			while($row8=mysqli_fetch_array($result8)){
				$b1=$row8['case_name'];
				$b2=$row8['case_code'];
			}
			
			$sql9="SELECT * FROM court_master WHERE courtmas_key='$t6' AND finact=0";
			$result9 = mysqli_query($link,$sql9);
			while($row9=mysqli_fetch_array($result9)){
				$c1=$row9['court_name'];
				
			}
			
			$sql10="SELECT * FROM courttype_master WHERE courttype_key='$t7' AND finact=0";
			$result10 = mysqli_query($link,$sql10);
			while($row10=mysqli_fetch_array($result10)){
				$d1=$row10['courtype_name'];
				
			}
			
			$sql11="SELECT * FROM client_master WHERE client_key='$t8' AND finact=0";
			$result11 = mysqli_query($link,$sql11);
			while($row11=mysqli_fetch_array($result11)){
				$e1=$row11['client_name'];
				$e2=$row11['address'];
				$e3=$row11['mobile_no'];
				$e4=$row11['tp_no'];
				$e5=$row11['nic_no'];
				$e6=$row11['nationality'];
				$e7=$row11['email_address'];
				
			}
			
			$sql12="SELECT * FROM complaintype_master WHERE complaintypemas_key='$t9' AND finact=0";
			$result12 = mysqli_query($link,$sql12);
			while($row12=mysqli_fetch_array($result12)){
				$f1=$row12['complain_name'];
				
			}
			
			$sql5="SELECT * FROM casecycle_details WHERE casecycle_key='$k2' AND finact=0";
			$result5 = mysqli_query($link,$sql5);
			while($row5=mysqli_fetch_array($result5)){
				$g1=$row5['enter_date'];
				$g2=$row5['noof_casedefined'];
				$g3=$row5['nextcourt_dte'];
				$g4=$row5['status_cycle'];
			}

		}
		else{
			header("location:home.php");
		}
		
		
		
?>

<?php
$cur_dte=date("Y-m-d");

	$target_dir = "../lwr/requireddoc/";
	if(isset($_POST['btn_addupload'])){
		
		foreach($_FILES['upd_images']['name'] as $key=>$val){
            // File upload path
            $target_file = $target_dir.basename($_FILES['upd_images']['name'][$key]);

            // Check whether file type is valid
            $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$newimgkey=0;
				$sql29="SELECT MAX(imgdetails_key) AS maximagedetailkey FROM images_details";
				$result29= mysqli_query($link,$sql29);
				while($row29=mysqli_fetch_array($result29)){
					$mimgkeyos=$row29['maximagedetailkey'];
				}
				
				$newimgkey=$mimgkeyos+1;
				
				$target_new = $target_dir ."a".$newimgkey.".".$fileType;
				if (file_exists($target_new)) {
							
						echo "<script>
									alert('Sorry, file already exists.');
										
							</script>";
				}
				else{
						// Upload file to server
						if(move_uploaded_file($_FILES["upd_images"]["tmp_name"][$key], $target_new)){
									$awers1="a".$newimgkey.".".$fileType;
									$sql42="INSERT INTO  images_details (finact,status,imgdetails_key,requestdoc_key,casedetails_key,casecycle_key,document_name,img_path,act_person)
																VALUES(0,'A',NULL,'$_GET[re]','$k1','$k2','$k4','$awers1','$ses_ukey')";
									if(mysqli_query($link,$sql42)){
										$sql44="UPDATE requestdocument_details SET upload_dte='$cur_dte',client_key='$t8' WHERE requestdoc_key='$_GET[re]'";
										mysqli_query($link,$sql44);
									}
									else{
										echo "<script>
											alert('Execute Error.');
										
										</script>";
									}
						}
						
						$to=$a5;
						$subject='Case Management System - You requested document is upload your Client.';				//subject eka danna
						$msg1="Dear  ".$a1." \r\n"
									."You requested document is upload your Client.	".$cur_dte." \r\n"
									."Your Case Code ".$t3." \r\n"
									."Case ".$b1." \r\n"
									."Court ".$c1." ".$d1." \r\n"
									."Thank You \r\n"
									."Case Management System \r\n";	
						$ok3=mail($to,$subject,$msg1);
				}
           
        }
			
	}
	
	$sql31="SELECT * FROM images_details WHERE requestdoc_key='$_GET[re]' AND finact=0";
	$result31 = mysqli_query($link,$sql31);
	while($row31=mysqli_fetch_array($result31)){
		$nma1="txt_imgs".$row31['imgdetails_key'];
		$nma2="btn_updimgs".$row31['imgdetails_key'];
		
		if(isset($_POST[$nma2])){
				$sql32="UPDATE images_details SET finact=1 WHERE imgdetails_key='$_POST[$nma1]' AND finact=0";
				if(mysqli_query($link,$sql32)){
					echo "<script>
						alert('Successfully Delete Image');
					</script>";
				}
		}		
	}

?>



<!DOCTYPE html>

<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Upload Images</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">

        <!-- Custom styles -->
      <link rel="stylesheet" media="screen" href="css/common.css">
	  <style type="text/css">
		.s1{
			font-weight:bold;
			font-size:20px;
		}
		
	
		.example tbody {
		cursor: pointer;
		}
		
		table.display tbody tr:nth-child(even):hover td{
			background-color:  #FF5733 !important;
			color:white;
		}
		
		table.display tbody tr:nth-child(odd):hover td{
			background-color:  #FF5733 !important;
			color:white;
		}
		
		table.display tbody tr:nth-child(even){
			background-color: #2874a6 !important
		}
		table.display tr.even .sorting_1 { 
			background-color:  #2874a6 !important; 
		}
		
		table.display tbody tr:nth-child(odd){
			background-color:  #229954 !important
		}
		table.display tr.odd .sorting_1 { 
				background-color:  #229954 !important; 
		}
		
		
		.tcontents{
			color:#ffffff;
			font-weight:bold;
			font-size:17px;
		}
		
		.yy{
			font-size:18px;
		}
		
		.ww{
			font-size:20px;
			font-weight:bold;
			color:red;
		}
		
		.lblsty{
			font-weight:bold;
			font-size:16px;
		}
		
	  </style>
	  
    </head>
    <body class="bc" style="background-image: url('images/11.jpg')">
	   <?php include('navi.php') ?>
			<br>
			<br>
			<br>
			<div class="row">
					<div class="col-md-1">
					
					</div>
					<div class="col-md-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<div class="row">
									<div class="col-md-6">
										<table class="table" id="t1" border="0">
												<tr>
													<td width="40%"><label class="lblsty">Case Code  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $t3; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Case Name </label></td>
													<td width="60%"><label class="lblsty"><?php echo $b1; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Case File Date  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $t2; ?></label></td>
												</tr>
												
												
										</table>
									</div>
									<div class="col-md-6">
										<table class="table" id="t1" border="0">
												<tr>
													<td width="40%"><label class="lblsty">Case Year  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $t10; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Court  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $c1." ".$d1; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Complain Type  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $f1; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Party  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $t12; ?></label></td>
												</tr>
												
										</table>
									</div>
								</div>					
							</div>
						</section>
					</div>
			</div>
			
			<div class="row">
					<div class="col-md-1">
					
					</div>
					<div class="col-md-5">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								
										<table class="table" id="t1" border="0">
												<tr>
													<td width="40%"><label class="lblsty">Case Cycle  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $g2; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Date </label></td>
													<td width="60%"><label class="lblsty"><?php echo $g1; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Court Date  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $g3; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Case Set  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $g4; ?></label></td>
												</tr>
												
												
										</table>
							</div>
						</section>
					</div>
					
					<div class="col-md-5">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								
										<table class="table" id="t1" border="0">
												<tr>
													<td width="40%"><label class="lblsty">Request Date  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $k3; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Submission Date </label></td>
													<td width="60%"><label class="lblsty"><?php echo $k5; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Documents  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $k4; ?></label></td>
												</tr>
												<?php
												if($k6!=null){
												?>
													<tr>
														<td width="40%"><label class="lblsty">Upload Date  </label></td>
														<td width="60%"><label class="lblsty"><?php echo $k6; ?></label></td>
													</tr>
												<?php
												}
												?>
												
										</table>
							</div>
						</section>
					</div>
			</div>
				
			<div class="row">
				<div class="col-md-3">
										
				</div>
				<div class="col-md-6">
					<section class="panel panel-transparent">
						<div class="panel-body panel-transparent">
							<form role="form" method="Post" name="f4" enctype="multipart/form-data">
														
								<div class="form-group">               
									<label class="control-label col-md-4"><font color="red">&lowast;</font>Images :</label>   
									<input type='file' class='form-control input-sm' name='upd_images[]' multiple>
								</div> 
								<button class="btn btn-lg btn-success btn-block" name='btn_addupload' type="submit">Upload</button>
							</form>
						</div>
					</section>
				</div>
								
			</div>
			
			<div class="row">
				<?php
					$sql30="SELECT * FROM images_details WHERE requestdoc_key='$_GET[re]' AND finact=0";
					$result30 = mysqli_query($link,$sql30);
					while($row30=mysqli_fetch_array($result30)){
						$txt_imgs="txt_imgs".$row30['imgdetails_key'];
						$btn_updimgs="btn_updimgs".$row30['imgdetails_key'];
				?>
						<form method="post" name="f5">
							<div class="col-md-4">
								<section class="panel panel-transparent">
									<div class="panel-body panel-transparent">
										<a href="../lwr/requireddoc/<?php echo $row30['img_path'];?>" target="_blank">
										<img src="../lwr/requireddoc/<?php echo $row30['img_path'] ?>" height="240px" width="100%" alt="">
										</a>
											<br>
											<br>
										<!--<input type="hidden" name="<?php echo $txt_imgs;?>" value="<?php echo $row30['imgdetails_key'];?>">
										<button class="btn btn-sm btn-danger btn-block" name='<?php echo $btn_updimgs; ?>' type="submit">Remove</button>-->
														
									</div>
								</section>
							</div>
						</form>
				<?php
					}
				?>
			</div>
			
		   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script type="text/javascript" src="js/jquery-1.6.min.js"></script>

        <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
		
        <script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-admin-theme-change-size.js"></script>
        <script type="text/javascript" src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
		
		
		
		
		<link rel="stylesheet" type="text/css" href="datatable/dataTables.min.css" />
		<script type="text/javascript" src="datatable/dataTables.min.js"></script> 	
	
			<script type="text/javascript" charset="utf-8">
					
			 
						// DataTable
							var table = $('.example').DataTable({

								
									
							});
						
							
					
				
			</script>
			
			
		
    </body>
</html>
