
<?php
include 'conn.php';
include 'session_handler.php';

$cur_dte=date("Y-m-d");

$afteddate= date('Y-m-d', strtotime('today + 7 days'));
$afted14date= date('Y-m-d', strtotime('today + 14 days'));
$afted4date= date('Y-m-d', strtotime('today + 4 days'));
?>






<!DOCTYPE html>

<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Notification</title>
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
									
										<table class="table table-striped table-bordered display example" width="100%">
											
											<tbody>
												<?php
												$sql1="SELECT * FROM case_details WHERE lawyer_key='$ses_ukey' AND case_date>='$cur_dte' AND case_date<='$afteddate' AND finact=0";
												$result1 = mysqli_query($link,$sql1);
												while($row1=mysqli_fetch_array($result1)){
													
															$sql2="SELECT * FROM courttype_master WHERE courttype_key='$row1[courttype_key]' AND finact=0";
															$result2 = mysqli_query($link,$sql2);
															while($row2=mysqli_fetch_array($result2)){
																 	$courtype_name=$row2['courtype_name'];
															}
															
															$sql3="SELECT * FROM court_master WHERE courtmas_key='$row1[court_key]' AND finact=0";
															$result3 = mysqli_query($link,$sql3);
															while($row3=mysqli_fetch_array($result3)){
																$court_name=$row3['court_name'];
															}
															
															$sql4="SELECT * FROM client_master WHERE client_key='$row1[client_key]' AND finact=0";
															$result4 = mysqli_query($link,$sql4);
															while($row4=mysqli_fetch_array($result4)){
																$client_name=$row4['client_name'];
															}
															
															$sql5="SELECT * FROM case_master WHERE casemas_key='$row1[case_key]' AND finact=0";
															$result5 = mysqli_query($link,$sql5);
															while($row5=mysqli_fetch_array($result5)){
																$case_name=$row5['case_name'];
															}
															
															$sql6="SELECT * FROM complaintype_master WHERE complaintypemas_key='$row1[compalintype_key]' AND finact=0";
															$result6 = mysqli_query($link,$sql6);
															while($row6=mysqli_fetch_array($result6)){
																$complain_name=$row6['complain_name'];
															}
												?>
														<tr>
															<td>
																Successfully added new case file open.  &nbsp;&nbsp; 
																Case Code : <?php echo $row1['case_code']; ?> &nbsp; 
																Case: <?php echo $case_name; ?> &nbsp; 
																Court: <?php echo $courtype_name." - ".$court_name; ?> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;   
																<?php echo $row1['case_date']; ?>&nbsp; 
																<a href="view_case.php?pcd=<?php echo $row1['casedetail_key'];?>" target="_blank"><button type="button" class="btn btn-success btn-sm">View case</button></a>
															</td>
														</tr>
												<?php
												}
												?>

												<?php
												$sql17="SELECT * FROM requestdocument_details INNER JOIN case_details ON requestdocument_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.lawyer_key='$ses_ukey' AND 
																	  requestdocument_details.request_dte>='$cur_dte' AND 
																	  requestdocument_details.request_dte<='$afteddate' AND 
																	  requestdocument_details.upload_dte IS NULL AND 
																	  requestdocument_details.finact=0";
												$result17 = mysqli_query($link,$sql17);
												while($row17=mysqli_fetch_array($result17)){
															
															$sql18="SELECT * FROM courttype_master WHERE courttype_key='$row17[courttype_key]' AND finact=0";
															$result18 = mysqli_query($link,$sql18);
															while($row18=mysqli_fetch_array($result18)){
																 	$courtype_name=$row18['courtype_name'];
															}
															
															$sql19="SELECT * FROM court_master WHERE courtmas_key='$row17[court_key]' AND finact=0";
															$result19 = mysqli_query($link,$sql19);
															while($row19=mysqli_fetch_array($result19)){
																$court_name=$row19['court_name'];
															}
															
														
															$sql20="SELECT * FROM case_master WHERE casemas_key='$row17[case_key]' AND finact=0";
															$result20 = mysqli_query($link,$sql20);
															while($row20=mysqli_fetch_array($result20)){
																$case_name=$row20['case_name'];
															}
															
															$sql21="SELECT * FROM complaintype_master WHERE complaintypemas_key='$row17[compalintype_key]' AND finact=0";
															$result21 = mysqli_query($link,$sql21);
															while($row21=mysqli_fetch_array($result21)){
																$complain_name=$row21['complain_name'];
															}
												?>														
														<tr>
															<td>
																	You are request <?php echo $row17['document_name']; ?> in submission before <?php echo $row17['submission_date']; ?>&nbsp;&nbsp; 
																	Case Code : <?php echo $row17['case_code']; ?> &nbsp; 
																	Case: <?php echo $case_name; ?> &nbsp; 
																	Court: <?php echo $courtype_name." - ".$court_name; ?> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;   
																	<?php echo $row17['request_dte']; ?>&nbsp;&nbsp;&nbsp;&nbsp; 
																	<a href="view_caseimg.php?re=<?php echo $row17['requestdoc_key'];?>" target="_blank"><button type="button" class="btn btn-success btn-sm">Upload</button></a>
															</td>
														</tr>
												<?php
												}
												?>
												
												<?php
												$sql7="SELECT * FROM requestdocument_details INNER JOIN case_details ON requestdocument_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.lawyer_key='$ses_ukey' AND 
																	  requestdocument_details.upload_dte>='$cur_dte' AND 
																	  requestdocument_details.upload_dte<='$afteddate' AND 
																	  requestdocument_details.upload_dte IS NOT NULL AND 
																	  requestdocument_details.finact=0";
												$result7 = mysqli_query($link,$sql7);
												while($row7=mysqli_fetch_array($result7)){
															
															$sql8="SELECT * FROM courttype_master WHERE courttype_key='$row7[courttype_key]' AND finact=0";
															$result8 = mysqli_query($link,$sql8);
															while($row8=mysqli_fetch_array($result8)){
																 	$courtype_name=$row8['courtype_name'];
															}
															
															$sql9="SELECT * FROM court_master WHERE courtmas_key='$row7[court_key]' AND finact=0";
															$result9 = mysqli_query($link,$sql9);
															while($row9=mysqli_fetch_array($result9)){
																$court_name=$row9['court_name'];
															}
															
														
															$sql10="SELECT * FROM case_master WHERE casemas_key='$row7[case_key]' AND finact=0";
															$result10 = mysqli_query($link,$sql10);
															while($row10=mysqli_fetch_array($result10)){
																$case_name=$row10['case_name'];
															}
															
															$sql11="SELECT * FROM complaintype_master WHERE complaintypemas_key='$row7[compalintype_key]' AND finact=0";
															$result11 = mysqli_query($link,$sql11);
															while($row11=mysqli_fetch_array($result11)){
																$complain_name=$row11['complain_name'];
															}
												?>
														<tr>
															<td>
																	You requested <?php echo $row7['document_name']; ?> is Upload your Client&nbsp;&nbsp; 
																	Case Code : <?php echo $row7['case_code']; ?> &nbsp; 
																	Case: <?php echo $case_name; ?> &nbsp; 
																	Court: <?php echo $courtype_name." - ".$court_name; ?> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;   
																	<?php echo $row7['upload_dte']; ?>&nbsp;&nbsp;&nbsp;&nbsp; 
																	<a href="view_caseimg.php?re=<?php echo $row7['requestdoc_key'];?>" target="_blank"><button type="button" class="btn btn-success btn-sm">View Documents</button></a>
															</td>
														</tr>
												
												<?php
												}
												?>
												
												<?php
												$sql12="SELECT * FROM casecycle_details INNER JOIN case_details ON casecycle_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.lawyer_key='$ses_ukey' AND 
																	  casecycle_details.nextcourt_dte='$afted14date' AND 
																	  casecycle_details.finact=0";
												$result12 = mysqli_query($link,$sql12);
												while($row12=mysqli_fetch_array($result12)){
															
															$sql13="SELECT * FROM courttype_master WHERE courttype_key='$row12[courttype_key]' AND finact=0";
															$result13 = mysqli_query($link,$sql13);
															while($row13=mysqli_fetch_array($result13)){
																 	$courtype_name=$row13['courtype_name'];
															}
															
															$sql14="SELECT * FROM court_master WHERE courtmas_key='$row12[court_key]' AND finact=0";
															$result14 = mysqli_query($link,$sql14);
															while($row14=mysqli_fetch_array($result14)){
																$court_name=$row14['court_name'];
															}
															
														
															$sql15="SELECT * FROM case_master WHERE casemas_key='$row12[case_key]' AND finact=0";
															$result15 = mysqli_query($link,$sql15);
															while($row15=mysqli_fetch_array($result15)){
																$case_name=$row15['case_name'];
															}
															
															$sql16="SELECT * FROM complaintype_master WHERE complaintypemas_key='$row12[compalintype_key]' AND finact=0";
															$result16 = mysqli_query($link,$sql16);
															while($row16=mysqli_fetch_array($result16)){
																$complain_name=$row16['complain_name'];
															}
															
															$sql32="SELECT * FROM lowyer_registration WHERE lowyer_key='$row12[lawyer_key]' AND finact=0";
															$result32 = mysqli_query($link,$sql32);
															while($row32=mysqli_fetch_array($result32)){
																$l99=$row32['lowyer_name'];
																$l98=$row32['email'];
																
															}
															
															
															$to=$l98;
															$subject='Case Management System - Your Next Court date '.$row12['nextcourt_dte'].' is '.$row12['case_code'].'.';				//subject eka danna
															$msg1="Dear  ".$l99." \r\n"
																."Your Next Court date ".$row12['nextcourt_dte']." is ".$row12['case_code']." \r\n"
																."Your Case Code ".$row12['case_code']." \r\n"
																."Case ".$case_name." \r\n"
																."Case Cycle ".$row12['noof_casedefined']." \r\n"
																."Court ".$courtype_name." ".$court_name." \r\n"
																."Thank You \r\n"
																."Case Management System \r\n";	
															$ok3=mail($to,$subject,$msg1);
												?>
												
															<tr>
																<td>
																		Your Next Court date <?php echo $row12['nextcourt_dte']; ?> is <?php echo $row12['case_code']; ?>&nbsp;&nbsp; 
																		Case Code : <?php echo $row12['case_code']; ?> &nbsp; 
																		Case: <?php echo $case_name; ?> &nbsp; 
																		Case Cycle :<?php echo $row12['noof_casedefined']; ?> &nbsp; 
																		Court: <?php echo $courtype_name." - ".$court_name; ?> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;   
																		<?php echo $afted14date; ?>&nbsp;&nbsp;&nbsp;&nbsp; 
																		<a href="view_case.php?pcd=<?php echo $row12['casedetail_key'];?>" target="_blank"><button type="button" class="btn btn-success btn-sm">View case</button></a>
																</td>
															</tr>
												<?php
												}
												?>
												
												<?php
												$sql22="SELECT * FROM casecycle_details INNER JOIN case_details ON casecycle_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.lawyer_key='$ses_ukey' AND 
																	  casecycle_details.nextcourt_dte='$afted4date' AND 
																	  casecycle_details.finact=0";
												$result22 = mysqli_query($link,$sql22);
												while($row22=mysqli_fetch_array($result22)){
															
															$sql23="SELECT * FROM courttype_master WHERE courttype_key='$row22[courttype_key]' AND finact=0";
															$result23 = mysqli_query($link,$sql23);
															while($row23=mysqli_fetch_array($result23)){
																 	$courtype_name=$row23['courtype_name'];
															}
															
															$sql24="SELECT * FROM court_master WHERE courtmas_key='$row22[court_key]' AND finact=0";
															$result24 = mysqli_query($link,$sql24);
															while($row24=mysqli_fetch_array($result24)){
																$court_name=$row24['court_name'];
															}
															
														
															$sql25="SELECT * FROM case_master WHERE casemas_key='$row22[case_key]' AND finact=0";
															$result25 = mysqli_query($link,$sql25);
															while($row25=mysqli_fetch_array($result25)){
																$case_name=$row25['case_name'];
															}
															
															$sql26="SELECT * FROM complaintype_master WHERE complaintypemas_key='$row22[compalintype_key]' AND finact=0";
															$result26 = mysqli_query($link,$sql26);
															while($row26=mysqli_fetch_array($result26)){
																$complain_name=$row26['complain_name'];
															}
															
															$sql34="SELECT * FROM lowyer_registration WHERE lowyer_key='$row22[lawyer_key]' AND finact=0";
															$result34 = mysqli_query($link,$sql34);
															while($row34=mysqli_fetch_array($result34)){
																$l97=$row34['lowyer_name'];
																$l96=$row34['email'];
																
															}
															
															
															$to=$l96;
															$subject='Case Management System - Your Next Court date '.$row22['nextcourt_dte'].' is '.$row22['case_code'].'.';				//subject eka danna
															$msg1="Dear  ".$l97." \r\n"
																."Your Next Court date. ".$_POST['nextcourt_dte'].". in ".$row22['case_code']." \r\n"
																."Your Case Code ".$row22['case_code']." \r\n"
																."Case ".$case_name." \r\n"
																."Case Cycle ".$row22['noof_casedefined']." \r\n"
																."Court ".$courtype_name." ".$court_name." \r\n"
																."Thank You \r\n"
																."Case Management System \r\n";	
															$ok3=mail($to,$subject,$msg1);
												?>
												
															<tr>
																<td>
																		Your Next Court date <?php echo $row22['nextcourt_dte']; ?> is <?php echo $row22['case_code']; ?>&nbsp;&nbsp; 
																		Case Code : <?php echo $row22['case_code']; ?> &nbsp; 
																		Case: <?php echo $case_name; ?> &nbsp; 
																		Case Cycle :<?php echo $row22['noof_casedefined']; ?> &nbsp; 
																		Court: <?php echo $courtype_name." - ".$court_name; ?> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;   
																		<?php echo $afted4date; ?>&nbsp;&nbsp;&nbsp;&nbsp; 
																		<a href="view_case.php?pcd=<?php echo $row22['casedetail_key'];?>" target="_blank"><button type="button" class="btn btn-success btn-sm">View case</button></a>
																</td>
															</tr>
												<?php
												}
												?>
												
												<?php
												$sql27="SELECT * FROM requestdocument_details INNER JOIN case_details ON requestdocument_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.lawyer_key='$ses_ukey' AND 
																	  requestdocument_details.submission_date<='$cur_dte' AND 
																	  requestdocument_details.upload_dte IS NULL AND 
																	  requestdocument_details.finact=0";
												$result27 = mysqli_query($link,$sql27);
												while($row27=mysqli_fetch_array($result27)){
															$sql31="SELECT * FROM courttype_master WHERE courttype_key='$row27[courttype_key]' AND finact=0";
															$result31 = mysqli_query($link,$sql31);
															while($row31=mysqli_fetch_array($result31)){
																 	$courtype_name=$row31['courtype_name'];
															}
															
															$sql28="SELECT * FROM court_master WHERE courtmas_key='$row27[court_key]' AND finact=0";
															$result28 = mysqli_query($link,$sql28);
															while($row28=mysqli_fetch_array($result28)){
																$court_name=$row28['court_name'];
															}
															
														
															$sql29="SELECT * FROM case_master WHERE casemas_key='$row27[case_key]' AND finact=0";
															$result29 = mysqli_query($link,$sql29);
															while($row29=mysqli_fetch_array($result29)){
																$case_name=$row29['case_name'];
															}
															
															$sql30="SELECT * FROM complaintype_master WHERE complaintypemas_key='$row27[compalintype_key]' AND finact=0";
															$result30 = mysqli_query($link,$sql30);
															while($row30=mysqli_fetch_array($result30)){
																$complain_name=$row30['complain_name'];
															}
															
															$sql35="SELECT * FROM lowyer_registration WHERE lowyer_key='$row27[lawyer_key]' AND finact=0";
															$result35 = mysqli_query($link,$sql35);
															while($row35=mysqli_fetch_array($result35)){
																$l95=$row35['lowyer_name'];
																$l94=$row35['email'];
																
															}
															
															
															$to=$l94;
															$subject='Case Management System - !Opps. Expire of Submitting Date. Please Followup. Are you request '.$row27['document_name'].'.';				//subject eka danna
															$msg1="Dear  ".$l95." \r\n"
																."Expire of Submitting Date. Please Followup. Are you request ".$row27['document_name']." \r\n"
																."Your Case Code ".$row27['case_code']." \r\n"
																."Case ".$case_name." \r\n"
																."Court ".$courtype_name." ".$court_name." \r\n"
																."Thank You \r\n"
																."Case Management System \r\n";	
															$ok3=mail($to,$subject,$msg1);
												?>	
														<tr>
															<td>
																	!Opps. Expire of Submitting Date. Please Followup. Are you request <?php echo $row27['document_name']; ?>&nbsp;&nbsp; 
																	Case Code : <?php echo $row27['case_code']; ?> &nbsp; 
																	Case: <?php echo $case_name; ?> &nbsp; 
																	Court: <?php echo $courtype_name." - ".$court_name; ?> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;   
																	<?php echo $row27['submission_date']; ?>&nbsp;&nbsp;&nbsp;&nbsp; 
																	<a href="view_caseimg.php?re=<?php echo $row27['requestdoc_key'];?>" target="_blank"><button type="button" class="btn btn-success btn-sm">Upload</button></a>
															</td>
														</tr>

												<?php
												}
												?>
											</tbody>
										</table>
										
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
