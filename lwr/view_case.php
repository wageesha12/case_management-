
<?php
include 'conn.php';
include 'session_handler.php';
?>

<?php
		if(isset($_GET['pcd'])){
			$sql2="SELECT * FROM case_details WHERE casedetail_key='$_GET[pcd]' AND finact=0";
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
		}
		else{
			header("location:home.php");
		}

?>

<?php
$cur_dte=date("Y-m-d");

$sql13="SELECT MAX(noof_casedefined) AS maxcase FROM casecycle_details WHERE casedetails_key='$_GET[pcd]' AND finact=0";
$result13 = mysqli_query($link,$sql13);
while($row13=mysqli_fetch_array($result13)){
	$maxcasos=$row13['maxcase'];
}
$newmaxcasos=$maxcasos+1;
if(isset($_POST['btn_newcasecycle'])){
	
	$sql15="SELECT * FROM casecycle_details WHERE nextcourt_dte='$_POST[txt_nextcourtdte]' AND finact=0";
	$result15 = mysqli_query($link,$sql15);
    if(mysqli_num_rows($result15)==0){
		$sql16="INSERT INTO casecycle_details (finact,status,casecycle_key,casedetails_key,enter_date,noof_casedefined,nextcourt_dte,status_cycle,act_perosn)
										VALUES (0,'A',NULL,'$_GET[pcd]','$_POST[txt_caseenterdte]','$newmaxcasos','$_POST[txt_nextcourtdte]','$_POST[txt_caseset]','$ses_ukey')";
		if(mysqli_query($link,$sql16)){
			$sql17="SELECT * FROM casecycle_details WHERE nextcourt_dte='$_POST[txt_nextcourtdte]' 
													              AND casedetails_key='$_GET[pcd]' 
													           AND noof_casedefined='$newmaxcasos' 
																					AND finact=0";
			$result17 = mysqli_query($link,$sql17);
			while($row17=mysqli_fetch_array($result17)){
							$casecycle_key=$row17['casecycle_key'];
			}
			echo "<script>
					alert('Successfully Added This Case Cycle.');
					window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$casecycle_key';
				</script>";
		}
		else{
			echo "<script>
							alert('Execute Error.');
							window.location.href='view_case.php?pcd=$_GET[pcd]';
						</script>";
			
		}
	}
	else{
		echo "<script>
							alert('Sorry, Already Added this Cycle.');
							window.location.href='view_case.php?pcd=$_GET[pcd]';
			</script>";
	}
}


if(isset($_POST['btn_clientspay'])){
	
	$sql18="INSERT INTO casepayment_details (finact,status,casepayment_key,casedetails_key,datos,client_key,amount,act_perosn)
									VALUES (0,'A',NULL,'$_GET[pcd]','$cur_dte','$t8','$_POST[txt_clientpay]','$ses_ukey')";
	if(mysqli_query($link,$sql18)){
				echo "<script>
							alert('Sucessfully Added Client Payment.');
							window.location.href='view_case.php?pcd=$_GET[pcd]';
					</script>";	
	}	
}
?>



<!DOCTYPE html>

<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Case Information</title>
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
    <body class="bc" style="background-image: url('images/3.jpg')">
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
									<div class="col-md-6">
										<table class="table" id="t1" border="0">
												<tr>
													<td width="40%"><label class="lblsty">Client Name  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $e1; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Address </label></td>
													<td width="60%"><label class="lblsty"><?php echo $e2; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Mobile No  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $e3; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Telephone No  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $e4; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">NIC No  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $e5; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Nationality  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $e6; ?></label></td>
												</tr>
												
										</table>
									</div>
								</div>					
							</div>
						</section>
					</div>
			</div>
			
				<div class="row">
					
					<div class="col-md-12">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h2 align="center">Case Cycles</h2>
								
								<div class="col-md-6">
									<form role="form" method="post" name="f1">
										
										<div class="form-group" align="center">
										  <label style="font-size:18px;font-weight:bold">Case Cycle : <?php echo $newmaxcasos;?></label>
										</div>
										<div class="form-group">
										  <label>Enter Date</label>
										  <input type="date" class="form-control input-sm" name="txt_caseenterdte" required value="<?php echo $cur_dte; ?>">
										</div>
										<div class="form-group">
										  <label>Next Court Date</label>
										  <input type="date" class="form-control input-sm" name="txt_nextcourtdte" required>
										</div>
										<div class="form-group">
										  <label>Case Set</label>
										  <input type="text" class="form-control input-sm" name="txt_caseset" required>
										</div>
										<div class="form-group">
											<button type="submit" name="btn_newcasecycle" class="btn btn-lg btn-primary btn-block">Add New Case Cycle</button>
										</div>
									</form>
								</div>
								<div class="col-md-6">
									<table class="table table-striped table-bordered display example" width="100%">
										<thead>
											<tr>
												
												<th>Cycle</th>
												<th>Enter Date</th>
												<th>Court Date</th>
												<th>Status</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
										
														<?php
															$sql4="SELECT * FROM casecycle_details WHERE casedetails_key='$_GET[pcd]' AND finact=0 ORDER BY noof_casedefined DESC";
															$result4 = mysqli_query($link,$sql4);
															while($row4=mysqli_fetch_array($result4)){
																	
																			echo "
																			<tr>
																				
																					
																					<td class='yy'>".$row4['noof_casedefined']."</td>
																					<td class='yy'>".$row4['enter_date']."</td>
																					<td class='yy'>".$row4['nextcourt_dte']."</td>
																					<td class='yy'>".$row4['status_cycle']."</td>
																					<td class='yy'><a href='view_casecycle.php?pcd=".$_GET['pcd']."&cy=".$row4['casecycle_key']."' target='_blank'><button class='btn btn-md btn-success btn-block'>Process</button></a></td>";
																					
																			echo "</tr>";
															
															}
															
															
														?>
										
										</tbody>
									</table>
								</div>
							</div>
						</section>
					</div>
				</div>
				
				<div class="row">
					<section class="panel panel-transparent">
						<div class="panel-body panel-transparent">
							<div class="col-md-6">
						
								<h2 align="center">Lawyer Chagers</h2>
								<table class="table" id="t1" border="1" width="100%">
									<thead>
										<tr style="font-size:20px;font-weight:bold;">
											<th width="10%">Date</th>
											<th width="10%">Cycle</th>
											<th width="70%">Reason</th>
											<th width="10%">Amount</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$sql14="SELECT * FROM lawyerfeehistory_details WHERE casedetails_key='$_GET[pcd]' AND finact=0 ORDER BY casecycle_key DESC";
									$result14 = mysqli_query($link,$sql14);
									while($row14=mysqli_fetch_array($result14)){
										$sql5="SELECT * FROM casecycle_details WHERE casecycle_key='$row14[casecycle_key]' AND finact=0";
										$result5 = mysqli_query($link,$sql5);
										while($row5=mysqli_fetch_array($result5)){
												$nocasecy1=$row5['noof_casedefined'];
										}
										
									?>
										<tr style="font-size:20px;font-weight:bold;">
											
											<td width="10%"><?php echo $row14['date']; ?></td>
											<td width="10%"><?php echo $nocasecy1; ?></td>
											<td width="70%"><?php echo $row14['reasons']; ?></td>
											<td width="10%" align="right"><?php echo number_format($row14['fee'],2) ?></td>
										</tr>
									<?php
									}
									?>
									</tbody>
								</table>
							</div>
					
							<div class="col-md-6">
						
								<h2 align="center">Client Payments</h2>
								<form name="f4" method="POST">
									<?php
									$sql27="SELECT SUM(amount) AS totcasepay FROM casepayment_details WHERE casedetails_key='$_GET[pcd]'";
									$result27 = mysqli_query($link,$sql27);
									while($row27=mysqli_fetch_array($result27)){
										$totcasepay=$row27['totcasepay'];
									}
									
									$pending_pay=$t11-$totcasepay;
									?>
									<table class="table" id="t1" border="0">
										<tr style="font-size:20px;font-weight:bold;">
											<td>Total Lawyer Chagers </td>
											<td>: <?php echo number_format($t11,2) ?></td>
										</tr>
										<tr style="font-size:20px;font-weight:bold;">
											<td>Clients Payments </td>
											<td>: <?php echo number_format($totcasepay,2) ?></td>
										</tr>
										<tr style="font-size:20px;font-weight:bold;">
											<td>Pending Payments </td>
											<td>: <?php echo number_format($pending_pay,2) ?></td>
										</tr>
										<tr style="font-size:20px;font-weight:bold;">
											<td><?php echo $cur_dte; ?> </td>
											<td>
												<input type="text" class="form-control input-sm" name="txt_clientpay" required>
												<br>
												<button type="submit" name="btn_clientspay" class="btn btn-primary btn-md btn-block">Client Payments</button>
											</td>
										</tr>
									</table>
									<table class="table" id="t1" border="1" width="100%">
										<thead>
											<tr style="font-size:20px;font-weight:bold;">
												<th width="50%">Date</th>
												<th width="50%">Payment</th>
											</tr>
										</thead>
										<tbody>
										<?php
										$sql6="SELECT * FROM casepayment_details WHERE casedetails_key='$_GET[pcd]' AND finact=0 ORDER BY datos DESC";
										$result6 = mysqli_query($link,$sql6);
										while($row6=mysqli_fetch_array($result6)){
											
										?>
											<tr style="font-size:20px;font-weight:bold;">
												
												<td width="50%"><?php echo $row6['datos']; ?></td>
												<td width="50%" align="right"><?php echo number_format($row6['amount'],2) ?></td>
											</tr>
										<?php
										}
										?>
										</tbody>
									</table>
								</form>
							</div>
						
						</div>
					</section>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h2 align="center">Prepair Points</h2>
								<?php
								$sql20="SELECT DISTINCT(casecycle_key) AS discycle_prepri FROM prepairpoints_details WHERE casedetails_key='$_GET[pcd]' AND finact=0";
								$result20 = mysqli_query($link,$sql20);
								while($row20=mysqli_fetch_array($result20)){
									$sql21="SELECT * FROM casecycle_details WHERE casecycle_key='$row20[discycle_prepri]' AND finact=0";
									$result21 = mysqli_query($link,$sql21);
									while($row21=mysqli_fetch_array($result21)){
								?>
										<div class="form-group">
											<a href="tcpdf/reports/rtp_prepairpoint.php?cy=<?php echo $row20['discycle_prepri']; ?>" target="_blank"><button type="button" class="btn btn-lg btn-primary btn-block">Case Cycle<?php echo $row21['noof_casedefined']; ?></button></a>
										</div>
								
								<?php
									}
								}
								?>
							</div>
						</section>
					</div>
					
					<div class="col-md-6">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h2 align="center">Observation</h2>
								<?php
								$sql22="SELECT DISTINCT(casecycle_key) AS discycle_observation FROM observation_details WHERE casedetails_key='$_GET[pcd]' AND finact=0";
								$result22 = mysqli_query($link,$sql22);
								while($row22=mysqli_fetch_array($result22)){
									$sql23="SELECT * FROM casecycle_details WHERE casecycle_key='$row22[discycle_observation]' AND finact=0";
									$result23 = mysqli_query($link,$sql23);
									while($row23=mysqli_fetch_array($result23)){
								?>
										<div class="form-group">
											<a href="tcpdf/reports/rtp_observation.php?cy=<?php echo $row22['discycle_observation']; ?>" target="_blank"><button type="button" class="btn btn-lg btn-success btn-block">Case Cycle<?php echo $row23['noof_casedefined']; ?></button></a>
										</div>
								
								<?php
									}
								}
								?>
							</div>
						</section>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h2 align="center">Upload Images</h2>
									<?php
									$imgheghtmain="220px";
									$sql45="SELECT * FROM requestdocument_details WHERE casedetails_key='$_GET[pcd]'
																					AND upload_dte IS NOT NULL 
																					AND finact=0";
									$result45 = mysqli_query($link,$sql45);
									while($row45=mysqli_fetch_array($result45)){
									?>
										<div class="col-md-4" style="background-color:#4158d9">
											<section style="background-color:#4158d9">
												
												<a href="view_caseimg.php?re=<?php echo $row45['requestdoc_key'];?>" target="_blank">
													
												<div class="panel-body dd" style="background-color:#4158d9">
															
															<table border="0" width="100%">
																			<tr style="font-weight:bold;color:#000000;">
																				<td width="3%" class="subphead"></td>
																				<td width="52%" class="subphead"><?php echo $row45['document_name'];?></td>
																				<td width="45%" class="subphead">Request Date :<?php echo $row45['request_dte'];?></td>
																				
																			</tr>
																			<?php
																			$sql19="SELECT * FROM casecycle_details WHERE casedetails_key='$_GET[pcd]'
																													  AND casecycle_key='$row45[casecycle_key]'
																													  AND finact=0";
																			$result19 = mysqli_query($link,$sql19);
																			while($row19=mysqli_fetch_array($result19)){
																				 	$casenoss=$row19['noof_casedefined'];
																			}
																			?>
																			
																			<tr style="font-weight:bold;color:#000000;">
																				<td width="3%" class="subphead"></td>
																				<td width="52%" class="subphead">Case Cycle:<?php echo $casenoss;?></td>
																				<td width="45%" class="subphead">Upload Date :<?php echo $row45['upload_dte'];?></td>
																			</tr>
																			
															</table>
															
																		<?php
																			$sql46="SELECT MIN(imgdetails_key) AS m1_imgdetail_key FROM images_details WHERE requestdoc_key='$row45[requestdoc_key]' AND finact=0";
																			$result46 = mysqli_query($link,$sql46);
																			while($row46=mysqli_fetch_array($result46)){
																				$m1imgkey=$row46['m1_imgdetail_key'];
																			}
																			
																		?>
																	<div class="col-md-12 padding-0">
																		<?php
																			$sql47="SELECT * FROM images_details WHERE requestdoc_key='$row45[requestdoc_key]' AND imgdetails_key='$m1imgkey' AND finact=0";
																			$result47 = mysqli_query($link,$sql47);
																			if(mysqli_num_rows($result47)==0){
																		?>
																				<img class="photos" src="" width="100%" height="<?php echo $imgheghtmain; ?>">
																		<?php
																			}
																			else{
																				while($row47=mysqli_fetch_array($result47)){
																		?>
																					<img class="photos" src="requireddoc/<?php echo $row47['img_path'];?>" width="100%" height="<?php echo $imgheghtmain; ?>">
																		<?php
																				}
																			}																							
																		?>
																		<?php
																			$sql48="SELECT * FROM images_details WHERE requestdoc_key='$row45[requestdoc_key]'";
																			$result48 = mysqli_query($link,$sql48);
																			$noofimg = mysqli_num_rows($result48);
																		?>
																		 <div class="bottom-right">+<?php echo $noofimg;?></div>
																	</div>
																	<!-- View Main Images -->
																	
															
												</a>
												</div>
												
											</section>
										</div>
									<?php
									}
									?>
							</div>
						</section>
					</div>
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
