
<?php
include 'conn.php';
include 'session_handler.php';
error_reporting(0);
?>

<?php
		if(isset($_GET['pcd']) && isset($_GET['cy'])){
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
			
			$sql5="SELECT * FROM casecycle_details WHERE casecycle_key='$_GET[cy]' AND finact=0";
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

if(isset($_POST['btn_initialimges'])){
	
	$sql6="SELECT * FROM initialimages_details WHERE case_key='$t5' AND finact=0";
	$result6 = mysqli_query($link,$sql6);
	while($row6=mysqli_fetch_array($result6)){
																	
		$ini_b1="chk_initialimg".$row6['initialimages_key'];
		$ini_b2="txt_initialimg".$row6['initialimages_key'];
		
		$ini_c1=$_POST[$ini_b1];
		$ini_c2=$_POST[$ini_b2];
		
		if(isset($ini_c1)){
			$sql13="SELECT * FROM initialimages_details WHERE initialimages_key='$ini_c2' AND finact=0";
			$result13 = mysqli_query($link,$sql13);
			while($row13=mysqli_fetch_array($result13)){
				$docs_nmes1=$row13['initialimg_name'];
			}
			
			$sql7="SELECT * FROM requestdocument_details WHERE casedetails_key='$_GET[pcd]' 
														   AND casecycle_key='$_GET[cy]'
														   AND document_name='$docs_nmes1' 
														   AND finact=0";
			$result7 = mysqli_query($link,$sql7);
			if(mysqli_num_rows($result7)==0){
				$sql15="INSERT INTO requestdocument_details (finact,status,requestdoc_key,casedetails_key,casecycle_key,request_dte,lawyer_key,document_name,submission_date)
				                                      VALUES (0,'A',NULL,'$_GET[pcd]','$_GET[cy]','$cur_dte','$t4','$docs_nmes1','$_POST[txt_initialsubmissiondte]')";
				if(mysqli_query($link, $sql15)){
					
								$to=$e7;
								$subject='Case Management System - You are request '.$docs_nmes1.'.';				//subject eka danna
								$msg1="Dear  ".$e1." \r\n"
									."You are request ".$docs_nmes1." in submission before ".$_POST['txt_initialsubmissiondte']." \r\n"
									."Your Case Code ".$t3." \r\n"
									."Case ".$b1." \r\n"
									."Court ".$c1." ".$d1." \r\n"
									."Thank You \r\n"
									."Case Management System \r\n";					
								
								
								$ok3=mail($to,$subject,$msg1);
								if($ok3){
									echo "<script>
									alert('Successfully and Email Sent.');
										
									</script>";
								}
								else{
									echo "<script>
									alert('Successfully and But Email Not Sent.');
										
									</script>";
								}
					
				}
				else{
					echo "<script>
							alert('Execute Error');
							
							</script>";
				}
			}
			
			
		}
	}
}

if(isset($_POST['btn_spinitialimges'])){
	
	
	
	$sql17="SELECT * FROM requestdocument_details WHERE casedetails_key='$_GET[pcd]' 
														   AND casecycle_key='$_GET[cy]'
														   AND document_name='$_POST[txt_spdocumentnme]' 
														   AND finact=0";
	$result17 = mysqli_query($link,$sql17);
	if(mysqli_num_rows($result17)==0){
		$sql18="INSERT INTO requestdocument_details (finact,status,requestdoc_key,casedetails_key,casecycle_key,request_dte,lawyer_key,document_name,submission_date)
				                                      VALUES (0,'A',NULL,'$_GET[pcd]','$_GET[cy]','$cur_dte','$t4','$_POST[txt_spdocumentnme]','$_POST[txt_submissiondte]')";
		if(mysqli_query($link, $sql18)){
			
								$to=$e7;
								$subject='Case Management System - You are request '.$_POST['txt_spdocumentnme'].'.';				//subject eka danna
								$msg1="Dear  ".$e1." \r\n"
									."You are request ".$_POST['txt_spdocumentnme']." in submission before ".$_POST['txt_submissiondte']." \r\n"
									."Your Case Code ".$t3." \r\n"
									."Case ".$b1." \r\n"
									."Court ".$c1." ".$d1." \r\n"
									."Thank You \r\n"
									."Case Management System \r\n";					
								
								
								$ok3=mail($to,$subject,$msg1);
								if($ok3){
									echo "<script>
									alert('Successfully Added Special request document and Email Sent.');
										
									</script>";
								}
								else{
									echo "<script>
									alert('Successfully Added Special request document and But Email Not Sent.');
										
									</script>";
								}
			

				
		}
		else{
			echo "<script>
							alert('execute Error.');
				</script>";		
		}
	}
	else{
		echo "<script>
							alert('Sorry! Already Added Special request document.');
				</script>";
	}
}

$target_dir = "requireddoc/";
$sql20="SELECT * FROM requestdocument_details WHERE casedetails_key='$_GET[pcd]' 
												AND casecycle_key='$_GET[cy]'
												AND finact=0";
$result20 = mysqli_query($link,$sql20);
while($row20=mysqli_fetch_array($result20)){
	
	//$upd_a1="upd_images".$row20['requestdoc_key'];
	//$upd_a2="btn_imgupload".$row20['requestdoc_key'];
	$upd_a3="btn_imgdel".$row20['requestdoc_key'];
	$upd_a4="txt_imagesskeys1".$row20['requestdoc_key'];
	
	$sql43="SELECT * FROM requestdocument_details WHERE requestdoc_key='$_POST[$upd_a4]'";
	$result43 = mysqli_query($link,$sql43);
	while($row43=mysqli_fetch_array($result43)){
		$sdoc_nss=$row43['document_name'];
	}
	
	/*if(isset($_POST[$upd_a2])){
		foreach($_FILES[$upd_a1]['name'] as $key=>$val){
            // File upload path
            $target_file = $target_dir.basename($_FILES[$upd_a1]['name'][$key]);

            // Check whether file type is valid
            $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
            
				$sql14="SELECT MAX(imgdetails_key) AS maximagedetailkey FROM images_details";
				$result14= mysqli_query($link,$sql14);
				while($row14=mysqli_fetch_array($result14)){
					$mimgkeyos=$row14['maximagedetailkey'];
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
						if(move_uploaded_file($_FILES[$upd_a1]["tmp_name"][$key], $target_new)){
									$awers1="a".$newimgkey.".".$fileType;
									$sql42="INSERT INTO  images_details (finact,status,imgdetails_key,requestdoc_key,casedetails_key,casecycle_key,document_name,img_path,act_person)
																VALUES(0,'A',NULL,'$_POST[$upd_a4]','$_GET[pcd]','$_GET[cy]','$sdoc_nss','$awers1','$ses_ukey')";
									if(mysqli_query($link,$sql42)){
										$sql44="UPDATE requestdocument_details SET upload_dte='$cur_dte',client_key='$t8' WHERE requestdoc_key='$_POST[$upd_a4]'";
										mysqli_query($link,$sql44);
									}
									else{
										echo "<script>
											alert('Execute Error.');
										
										</script>";
									}
						}
				}
            
        }
	}*/
	if(isset($_POST[$upd_a3])){
		$sql22="UPDATE requestdocument_details SET finact=1 WHERE requestdoc_key='$_POST[$upd_a4]'";
		if(mysqli_query($link,$sql22)){
			echo "<script>
						alert('Sucessfully Delete this images Directory.');
						window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
				</script>";	
		}
	}
}

if(isset($_POST['btn_lawyerchagers'])){
	
	
	$sql23="UPDATE case_details SET amount='$_POST[txt_lawyerfee]' WHERE casedetail_key=$_GET[pcd]";
	if(mysqli_query($link,$sql23)){
		$sql24="SELECT * FROM lawyerfeehistory_details WHERE casedetails_key='$_GET[pcd]' AND casecycle_key='$_GET[cy]' AND finact=0";
		$result24 = mysqli_query($link,$sql24);
		if(mysqli_num_rows($result24)==0){
			if($g2==1){
				$sql25="INSERT INTO lawyerfeehistory_details (finact,status,lawyerfeehistory_key,casedetails_key,casecycle_key,fee,reasons,date,act_person)
												VALUES(0,'A',NULL,'$_GET[pcd]','$_GET[cy]','$_POST[txt_lawyerfee]','Initial Fees','$cur_dte','$ses_ukey')";
			}
			else{
				$sql25="INSERT INTO lawyerfeehistory_details (finact,status,lawyerfeehistory_key,casedetails_key,casecycle_key,fee,reasons,date,act_person)
												VALUES(0,'A',NULL,'$_GET[pcd]','$_GET[cy]','$_POST[txt_lawyerfee]','$_POST[txt_reason]','$cur_dte','$ses_ukey')";
			}
			if(mysqli_query($link,$sql25)){
				echo "<script>
							alert('Sucessfully Added Initial Payments.');
							window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
					</script>";	
			}	
		}
		else{
			$sql26="UPDATE lawyerfeehistory_details SET fee='$_POST[txt_lawyerfee]',date='$cur_dte',act_person='$ses_ukey' WHERE casedetails_key='$_GET[pcd]' AND casecycle_key='$_GET[cy]' AND finact=0";
			if(mysqli_query($link,$sql26)){
				echo "<script>
							alert('Sucessfully Update Initial Payments.');
							window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
					</script>";	
			}	
		}
		
								$to=$e7;
								$subject='Case Management System - Your lawyer charges is changed.';				//subject eka danna
								$msg1="Dear  ".$e1." \r\n"
									."Your lawyer charges is changed. New lawyer fee is Rs. ".number_format($_POST['txt_lawyerfee'],2).". Reason : ".$_POST['txt_reason']." \r\n"
									."Your Case Code ".$t3." \r\n"
									."Case ".$b1." \r\n"
									."Court ".$c1." ".$d1." \r\n"
									."Thank You \r\n"
									."Case Management System \r\n";					
								
								
								$ok3=mail($to,$subject,$msg1);
								if($ok3){
									echo "<script>
									alert('Successfully and Email Sent.');
										window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
									</script>";
								}
								else{
									echo "<script>
									alert('Successfully and But Email Not Sent.');
										window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
									</script>";
								}
	}
}

if(isset($_POST['btn_clientspay'])){
	
	$sql28="INSERT INTO casepayment_details (finact,status,casepayment_key,casedetails_key,datos,client_key,amount,act_perosn)
									VALUES (0,'A',NULL,'$_GET[pcd]','$cur_dte','$t8','$_POST[txt_clientpay]','$ses_ukey')";
	if(mysqli_query($link,$sql28)){
				
								$to=$e7;
								$subject='Case Management System - Thank you for Your Payment.';				//subject eka danna
								$msg1="Dear  ".$e1." \r\n"
									."Thank you for Your Payment. Payed amount : Rs. ".number_format($_POST['txt_clientpay'],2).". in ".$cur_dte." \r\n"
									."Your Case Code ".$t3." \r\n"
									."Case ".$b1." \r\n"
									."Court ".$c1." ".$d1." \r\n"
									."Thank You \r\n"
									."Case Management System \r\n";	
								$ok3=mail($to,$subject,$msg1);
								if($ok3){
									echo "<script>
									alert('Sucessfully Added Client Payment and Email Sent.');
										window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
									</script>";
								}
								else{
									echo "<script>
									alert('Sucessfully Added Client Payment and But Email Not Sent.');
										window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
									</script>";
								}									

	}	
}


if(isset($_POST['btn_addpoint'])){
	$maxparagraph=0;
	$sql30="SELECT MAX(paragraph) AS maxparagraph FROM prepairpoints_details WHERE casedetails_key='$_GET[pcd]' AND casecycle_key='$_GET[cy]'";
	$result30 = mysqli_query($link,$sql30);
	while($row30=mysqli_fetch_array($result30)){
		$maxparagraph=$row30['maxparagraph'];
	}
	
	$newparagraph=$maxparagraph+1;
	
	$sql31="INSERT INTO prepairpoints_details (finact,status,perparepoints_key,paragraph,casedetails_key,casecycle_key,points,act_person)
									VALUES (0,'A',NULL,'$newparagraph','$_GET[pcd]','$_GET[cy]','$_POST[txt_prepairpoints]','$ses_ukey')";
	if(mysqli_query($link,$sql31)){
				echo "<script>
							alert('Sucessfully Added New Points.');
							window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
					</script>";	
	}
}

$sql33="SELECT * FROM prepairpoints_details WHERE casedetails_key='$_GET[pcd]' AND casecycle_key='$_GET[cy]' AND finact=0 ORDER BY paragraph ASC";
$result33 = mysqli_query($link,$sql33);
while($row33=mysqli_fetch_array($result33)){
	$p_b1="txt_edtprepairpoints".$row33['perparepoints_key'];
	$p_b2="btn_edit".$row33['perparepoints_key'];
	$p_b3="btn_del".$row33['perparepoints_key'];
	$p_b4="txt_prepairkey".$row33['perparepoints_key'];
	
	if(isset($_POST[$p_b2])){
		$sql34="UPDATE prepairpoints_details SET points='$_POST[$p_b1]' WHERE perparepoints_key='$_POST[$p_b4]'";
		if(mysqli_query($link,$sql34)){
				echo "<script>
							alert('Sucessfully Update Points.');
							window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
					</script>";	
		}
		
	}
	if(isset($_POST[$p_b3])){
		$sql35="UPDATE prepairpoints_details SET finact=1 WHERE perparepoints_key='$_POST[$p_b4]'";
		if(mysqli_query($link,$sql35)){
				echo "<script>
							alert('Sucessfully Delete Points.');
							window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
					</script>";	
		}
		
	}
	
}


if(isset($_POST['btn_addobservation'])){
	$maxparagraph_ob=0;
	$sql37="SELECT MAX(paragraph) AS maxparagraph_ob FROM  observation_details  WHERE casedetails_key='$_GET[pcd]' AND casecycle_key='$_GET[cy]'";
	$result37 = mysqli_query($link,$sql37);
	while($row37=mysqli_fetch_array($result37)){
		$maxparagraph_ob=$row37['maxparagraph_ob'];
	}
	
	$newparagraph_ob=$maxparagraph_ob+1;
	
	$sql38="INSERT INTO  observation_details  (finact,status,observationdetail_key,paragraph,casedetails_key,casecycle_key,observationn,act_person)
									VALUES (0,'A',NULL,'$newparagraph_ob','$_GET[pcd]','$_GET[cy]','$_POST[txt_observation]','$ses_ukey')";
	if(mysqli_query($link,$sql38)){
				echo "<script>
							alert('Sucessfully Added New Observation.');
							window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
					</script>";	
	}
}

$sql39="SELECT * FROM observation_details WHERE casedetails_key='$_GET[pcd]' AND casecycle_key='$_GET[cy]' AND finact=0 ORDER BY paragraph ASC";
$result39 = mysqli_query($link,$sql39);
while($row39=mysqli_fetch_array($result39)){
	$o_b1="txt_edtobservation".$row39['observationdetail_key'];
	$o_b2="btn_editobser".$row39['observationdetail_key'];
	$o_b3="btn_delobser".$row39['observationdetail_key'];
	$o_b4="txt_obserkey".$row39['observationdetail_key'];
	
	if(isset($_POST[$o_b2])){
		$sql40="UPDATE observation_details SET observationn='$_POST[$o_b1]' WHERE  observationdetail_key='$_POST[$o_b4]'";
		if(mysqli_query($link,$sql40)){
				echo "<script>
							alert('Sucessfully Update Observation.');
							window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
					</script>";	
		}
		
	}
	if(isset($_POST[$o_b3])){
		$sql41="UPDATE  observation_details SET finact=1 WHERE observationdetail_key='$_POST[$o_b4]'";
		if(mysqli_query($link,$sql41)){
				echo "<script>
							alert('Sucessfully Delete Observation.');
							window.location.href='view_casecycle.php?pcd=$_GET[pcd]&cy=$_GET[cy]';
					</script>";	
		}
		
	}
	
}
?>



<!DOCTYPE html>

<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Case Cycle</title>
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
		.bottom-right {
			position: absolute;
			bottom: 8px;
			right: 16px;
			font-size:50px;
			color:white;
			 text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
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
					<div class="col-md-1">
					
					</div>
					<div class="col-md-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<div class="row">
									<div class="col-md-6">
										<table class="table" id="t1" border="0">
												<tr>
													<td width="40%"><label class="lblsty">Case Cycle  </label></td>
													<td width="60%"><label class="lblsty"><?php echo $g2; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Date </label></td>
													<td width="60%"><label class="lblsty"><?php echo $g1; ?></label></td>
												</tr>
												
												
										</table>
									</div>
									<div class="col-md-6">
										<table class="table" id="t1" border="0">
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
								</div>					
							</div>
						</section>
					</div>
			</div>
				
				<div class="row">
					<div class="col-md-6">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h2 align="center">Lawyer Chagers</h2>
								<form name="f3" method="POST" enctype="multipart/form-data">
									<?php
									if($g2==1){
									?>
									
										<div class="form-group">
											<label><font color="red">&lowast;</font>Lawyer Charges</label>
											<input type="text" class="form-control input-sm" name="txt_lawyerfee" value="<?php echo $t11;?>" required>
										</div>
										<div class="form-group">
											<button type="submit" name="btn_lawyerchagers" class="btn btn-primary btn-lg btn-block">Lawyer Chagers</button>
										</div>
									<?php
									}
									else{
										$sql29="SELECT * FROM lawyerfeehistory_details WHERE casedetails_key='$_GET[pcd]' AND casecycle_key='$_GET[cy]' AND finact=0";
										$result29 = mysqli_query($link,$sql29);
										while($row29=mysqli_fetch_array($result29)){
											 	$reasons=$row29['reasons'];
										}
									?>	
										<div class="form-group">
											<label><font color="red">&lowast;</font>Reason</label>
											<textarea class="form-control input-sm" name="txt_reason" required><?php echo $reasons; ?></textarea>
										</div>
										<div class="form-group">
											<label><font color="red">&lowast;</font>Lawyer Charges</label>
											<input type="text" class="form-control input-sm" name="txt_lawyerfee" value="<?php echo $t11;?>" required>
										</div>
										<div class="form-group">
											<button type="submit" name="btn_lawyerchagers" class="btn btn-primary btn-lg btn-block">Lawyer Chagers</button>
										</div>
									
									<?php
									}
									?>
								</form>
							</div>
						</section>
					</div>
					<div class="col-md-6">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
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
									
								</form>
							</div>
						</section>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-12">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h2 align="center">Request Documents</h2>
								
								<div class="col-md-6">
									<form role="form" method="post" name="f1">
									
										<h4>Initial Documents</h4>
										<table class="table " width="100%">
											<tbody>
											
															<?php
																$sql4="SELECT * FROM initialimages_details WHERE case_key='$t5' AND finact=0";
																$result4 = mysqli_query($link,$sql4);
																while($row4=mysqli_fetch_array($result4)){
																	
																	 $ini_a1="chk_initialimg".$row4['initialimages_key'];
																	 $ini_a2="txt_initialimg".$row4['initialimages_key'];
																	 
																	 
																				echo "<tr>
																						<td class='yy'>
																							<input type=hidden name=".$ini_a2." value=".$row4['initialimages_key']." style=color:black;>";
																							$sql16="SELECT * FROM requestdocument_details WHERE casedetails_key='$_GET[pcd]' 
																													   AND casecycle_key='$_GET[cy]'
																													   AND document_name='$row4[initialimg_name]' 
																													   AND finact=0";
																							$result16 = mysqli_query($link,$sql16);
																							if(mysqli_num_rows($result16)==0){
																								echo "<input type=checkbox id=nfs  name=".$ini_a1." style=color:black; value=".$row4['initialimages_key'].">";
																							}
																							else{
																								echo "<input type=checkbox id=nfs  name=".$ini_a1." style=color:black; value=".$row4['initialimages_key']." checked='checked'>";
																							}
																						echo "</td>
																						<td class='yy'>".$row4['initialimg_name']."</td>";
																				echo "</tr>";
																}
																
																
															?>
															<tr>
																<td colspan="2">
																	<label> Submission Date</label>
																	<input type="date" class="form-control input-sm" name="txt_initialsubmissiondte" required placeholder="Submission Date">
																</td>
															</tr>
															<tr>
																<td colspan="2">
																	<input type="submit" name="btn_initialimges" value="Initial Images"  class="btn btn-primary btn-lg btn-block">
																</td>
															</tr>
											</tbody>
										</table>
									</form>
									<form role="form" method="post" name="f2">
										<h4>Special Request Documents</h4>
										<table class="table " width="100%">
											<tbody>
												<tr>
													<td>Special Documents</td>
													<td>Submission Date</td>
													<td>Action</td>
												</tr>
												<tr>
													<td><input type="text" class="form-control input-sm" name="txt_spdocumentnme" required placeholder="Special Documents"></td>
													<td><input type="date" class="form-control input-sm" name="txt_submissiondte" required placeholder="Submission Date"></td>
													<td><input type="submit" name="btn_spinitialimges" value="Add"  class="btn btn-primary btn-sm btn-block"></td>
												</tr>
											</tbody>
										</table>
									</form>
									 
								</div>
								
								<div class="col-md-6">
									<form role="form" method="Post" name="form2" enctype="multipart/form-data">
										<table class="table table-striped table-bordered display example" width="100%">
											<thead>
												<tr>
													
													<th>Request Date</th>
													<th>Documents</th>
													<th>Submission Date</th>
													<th>Upload Date</th>
													<th>Image Path</th>
													<th>Action</th>
													
												</tr>
											</thead>
											<tbody>
											
															<?php
																$sql19="SELECT * FROM requestdocument_details WHERE casedetails_key='$_GET[pcd]' 
																											  AND casecycle_key='$_GET[cy]'
																											  AND finact=0";
																$result19 = mysqli_query($link,$sql19);
																while($row19=mysqli_fetch_array($result19)){
																		
																		if($row19['upload_dte']==null){
																				
																				$upd_a1="upd_images".$row19['requestdoc_key'];
																				$upd_a2="btn_imgupload".$row19['requestdoc_key'];
																				$upd_a3="btn_imgdel".$row19['requestdoc_key'];
																				$upd_a4="txt_imagesskeys1".$row19['requestdoc_key'];
																				
																				echo "
																				<tr>
																						<td class='yy'>".$row19['request_dte']."</td>
																						<td class='yy'>".$row19['document_name']."</td>
																						<td class='yy'>".$row19['submission_date']."</td>
																						<td class='yy' colspan='2'>
																							<a href='view_caseimg.php?re=".$row19['requestdoc_key']."' target='_blank'><button type='button' class='btn btn-success btn-sm btn-block'>Upload</button></a>
																						</td>
																						<td class='yy'>
																							<input type='hidden' value='".$row19['requestdoc_key']."' name='".$upd_a4."'>
																							<input type='submit' value='Delete' name='".$upd_a3."'  class='btn btn-danger btn-sm btn-block'>
																						</td>
																						";
																						
																				echo "</tr>";
																		}
																		else{
																				
																			echo "
																				<tr>
																					
																						
																						<td class='yy'>".$row19['request_dte']."</td>
																						<td class='yy'>".$row19['document_name']."</td>
																						<td class='yy'>".$row19['submission_date']."</td>
																						<td class='yy'>".$row19['upload_dte']."</td>
																						<td class='yy' colspan='2'>
																							<a href='view_caseimg.php?re=".$row19['requestdoc_key']."' target='_blank'><button type='button' class='btn btn-primary btn-sm btn-block'>View</button></a>
																						</td>
																						";
																						
																				echo "</tr>";
																		}
																
																}
																
																
															?>
											
											</tbody>
										</table>
									</form>
								</div>
							</div>
						</section>
					</div>
				</div>
				
				
				
				<div class="row">
					<div class="col-md-12">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h2 align="center">Prepair Points</h2>
								<form role="form" method="Post" name="f5">	
									<table class="table" id="t1" border="0" width="100%">
										<tr style="font-size:20px;font-weight:bold;">
											<td width="90%">
												<textarea class='form-control input-lg' name="txt_prepairpoints"></textarea>
											</td>
											<td width="10%">
												<button type="submit" name="btn_addpoint" class="btn btn-primary btn-md btn-block">Add Points</button>
											</td>
										</tr>
										<?php
										$sql32="SELECT * FROM prepairpoints_details WHERE casedetails_key='$_GET[pcd]' AND casecycle_key='$_GET[cy]' AND finact=0 ORDER BY paragraph ASC";
										$result32 = mysqli_query($link,$sql32);
										while($row32=mysqli_fetch_array($result32)){
											$p_a1="txt_edtprepairpoints".$row32['perparepoints_key'];
											$p_a2="btn_edit".$row32['perparepoints_key'];
											$p_a3="btn_del".$row32['perparepoints_key'];
											$p_a4="txt_prepairkey".$row32['perparepoints_key'];
										  echo '<tr style="font-size:20px;font-weight:bold;">
													<td width="90%">
														<input type="hidden" name="'.$p_a4.'" value="'.$row32['perparepoints_key'].'">
														<textarea class="form-control input-lg" name="'.$p_a1.'">'.$row32['points'].'</textarea>
													</td>
													<td width="10%">
														<button type="submit" name="'.$p_a2.'" class="btn btn-success btn-md btn-block">Edit</button>
														<button type="submit" name="'.$p_a3.'" class="btn btn-danger btn-md btn-block">Delete</button>
													</td>
												</tr>';
										}
										?>
									</table>
								</form>
							</div>
						</section>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-12">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h2 align="center">Observation</h2>
								<form role="form" method="Post" name="f6">	
									<table class="table" id="t1" border="0" width="100%">
										<tr style="font-size:20px;font-weight:bold;">
											<td width="90%">
												<textarea class='form-control input-lg' name="txt_observation"></textarea>
											</td>
											<td width="10%">
												<button type="submit" name="btn_addobservation" class="btn btn-primary btn-md btn-block">Add Observation</button>
											</td>
										</tr>
										<?php
										$sql36="SELECT * FROM observation_details  WHERE casedetails_key='$_GET[pcd]' AND casecycle_key='$_GET[cy]' AND finact=0 ORDER BY paragraph ASC";
										$result36 = mysqli_query($link,$sql36);
										while($row36=mysqli_fetch_array($result36)){
											$o_a1="txt_edtobservation".$row36['observationdetail_key'];
											$o_a2="btn_editobser".$row36['observationdetail_key'];
											$o_a3="btn_delobser".$row36['observationdetail_key'];
											$o_a4="txt_obserkey".$row36['observationdetail_key'];
										  echo '<tr style="font-size:20px;font-weight:bold;">
													<td width="90%">
														<input type="hidden" name="'.$o_a4.'" value="'.$row36['observationdetail_key'].'">
														<textarea class="form-control input-lg" name="'.$o_a1.'">'.$row36['observationn'].'</textarea>
													</td>
													<td width="10%">
														<button type="submit" name="'.$o_a2.'" class="btn btn-success btn-md btn-block">Edit</button>
														<button type="submit" name="'.$o_a3.'" class="btn btn-danger btn-md btn-block">Delete</button>
													</td>
												</tr>';
										}
										?>
									</table>
								</form>
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
																					AND casecycle_key='$_GET[cy]' 
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
																				<td width="12%" class="subphead">Upload Date</td>
																				<td  width="3%" class="subphead">:</td>
																				<td width="30%" class="subphead"><?php echo $row45['upload_dte'];?></td>
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
