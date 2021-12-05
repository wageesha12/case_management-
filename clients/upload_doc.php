
<?php
include 'conn.php';
include 'session_handler.php';
?>






<!DOCTYPE html>

<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Upload Documents</title>
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
									<form role="form" method="Post" name="form2" enctype="multipart/form-data">
										<table class="table table-striped table-bordered display example" width="100%">
											<thead>
												<tr>
													
													<th>Submission Date</th>
													<th>Request Date</th>
													<th>Case Code</th>
													<th>Case</th>
													<th>Case Cycle</th>
													<th>Documents</th>
													<th>Action</th>
													
												</tr>
											</thead>
											<tbody>
											
															<?php
																$sql19="SELECT * FROM requestdocument_details WHERE upload_dte IS NULL
																											    AND finact=0";
																$result19 = mysqli_query($link,$sql19);
																while($row19=mysqli_fetch_array($result19)){
																		
																		$sql1="SELECT * FROM case_details WHERE casedetail_key='$row19[casedetails_key]'
																											AND finact=0";
																		$result1 = mysqli_query($link,$sql1);
																		while($row1=mysqli_fetch_array($result1)){
																			$case_code=$row1['case_code'];
																			$case_key=$row1['case_key'];
																		}
																		
																		$sql2="SELECT * FROM case_master WHERE casemas_key='$case_key'
																										   AND finact=0";
																		$result2 = mysqli_query($link,$sql2);
																		while($row2=mysqli_fetch_array($result2)){
																			$case_name=$row2['case_name'];
																		}
																		
																		$sql3="SELECT * FROM casecycle_details WHERE casecycle_key='$row19[casecycle_key]'
																										   AND finact=0";
																		$result3 = mysqli_query($link,$sql3);
																		while($row3=mysqli_fetch_array($result3)){
																			$case_cycle=$row3['noof_casedefined'];
																		}
																				echo "
																				<tr>
																						<td class='yy'>".$row19['submission_date']."</td>
																						<td class='yy'>".$row19['request_dte']."</td>
																						<td class='yy'>".$case_code."</td>
																						<td class='yy'>".$case_name."</td>
																						<td class='yy'>".$case_cycle."</td>
																						<td class='yy'>".$row19['document_name']."</td>
																						<td class='yy'>
																							<a href='view_caseimg.php?re=".$row19['requestdoc_key']."' target='_blank'><button type='button' class='btn btn-success btn-sm btn-block'>Upload</button></a>
																						</td>";
																						
																				echo "</tr>";
																}
																
																
															?>
											
											</tbody>
										</table>
									</form>
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
