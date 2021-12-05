<?php
//error_reporting(0);
include 'conn.php';		
include 'session_handler.php';		

$cur_dte=date("Y-m-d");

?>


<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Home</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">

        <!-- Custom styles -->
      <link rel="stylesheet" media="screen" href="css/common.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
		<style type="text/css">
		.padding-0{
			padding-right:0;
			padding-left:0;
		}
		
		.bottom-right {
			position: absolute;
			bottom: 8px;
			right: 16px;
			font-size:40px;
			color:white;
			 text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
		}
		
		.phead{
			 font-family: "Times New Roman", Times, serif;
			 font-size:20px;
		}
		
		 .panel-transparent {
              background: none;
            }
            .panel-transparent .panel-body{
              background: rgba( 6, 94, 168 , 0.6)!important;
            }
			
			.panel-transparent .panel-heading{
              background: rgba( 6, 94, 168 , 0.2)!important;
            }
			
			 .panel-transparent1 .panel-body{
              background: rgba( 247, 34, 6 , 0.6)!important;
            }
			
			.panel-transparent1 .panel-heading{
              background: rgba( 247, 34, 6 , 0.6)!important;
            }
            .thumbnail{
                background-color: orange;
            }

            .panel-transparent .thumbnail{
              background: rgba( 255, 102, 0, 0.9)!important;
            }
			
			.cardhead{
				
				font-weight:bold;
				font-family: "Times New Roman", Times, serif;
			}
	
		</style>
    </head>
    <body class="bc" style="background-image: url('images/9.jpg')">
        <!-- small navbar -->
        <?php include('navi.php') ?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		<div class="row">
					
					<div class="col-md-12">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<table class="table table-striped table-bordered display" id="example" width="100%">
									<thead>
										<tr>
											<th>Case Code</th>
											<th>Case Date</th>
											<th>Case Year</th>
											<th>Court</th>
											<th>Case</th>
											<th>Client</th>
											<th>Complain Type</th>
										</tr>
									</thead>
									<tbody>
									
													<?php
														$sql1="SELECT * FROM case_details WHERE lawyer_key='$ses_ukey' AND finact=0";
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
															
															echo "
															<tr>
																	<td width='4%' class='yy'><a href='view_case.php?pcd=".$row1['casedetail_key']."' target='_blank'>".$row1['case_code']."</a></td>
																	<td width='8%' class='yy'>".$row1['case_date']."</td>
																	<td width='23%' class='yy'>".$row1['case_year']."</td>
																	<td width='18%' class='yy'>".$courtype_name."-".$court_name."</td>
																	<td width='18%' class='yy'>".$case_name."</td>
																	<td width='18%' class='yy'>".$client_name."</td>
																	<td width='18%' class='yy'>".$complain_name."</td>
																	
																	
															</tr>";
														}
														
														
													?>
									
									</tbody>
								</table>
							</div>
						</section>
					</div>
		</div>
		
			
	
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-admin-theme-change-size.js"></script>
        <script type="text/javascript" src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
		
        		<link rel="stylesheet" type="text/css" href="datatable/dataTables.min.css" />
				<script type="text/javascript" src="datatable/dataTables.min.js"></script> 	
	
			<script type="text/javascript" charset="utf-8">
				
					$(window).scroll(function() {
							sessionStorage.scrollTop = $(this).scrollTop();
					});
						
					$(document).ready(function() {
	
						$(".clickable-row").click(function() {
								window.location = $(this).data("href");
						});
						  
								$('#example thead th').each( function () {
									var title = $(this).text();
									$(this).html( '<label style="font-size:18px;color:white">'+title+'</label><input type="text" placeholder="'+title+'" style="color:black" class="form-control input-sm" />' );
								} );
											 
								// DataTable
								var table = $('#example').DataTable({ "order": [[ 1, "asc" ]]});
											 
								// Apply the search
								table.columns().every( function () {
								var that = this;
											 
								$( 'input', this.header() ).on( 'keyup change', function () {
										if ( that.search() !== this.value ) {
												that
												.search( this.value )
												.draw();
											}
										} );
								} );

							//............................................................. table 1 Jaquery
							
						if (sessionStorage.scrollTop != "undefined") {
									$(window).scrollTop(sessionStorage.scrollTop);
						}
					});	
			</script>
    </body>
</html>