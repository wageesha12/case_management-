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
				color:#fffff;
				font-size:18px;
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
		

	
				<?php
				$sql1="SELECT * FROM case_details WHERE client_key='$ses_ukey' AND finact=0";
				$result1 = mysqli_query($link,$sql1);
				while($row1=mysqli_fetch_array($result1)){
				?>
					<div class="row">
						<div class="col-md-3">
						
						</div>
						<div class="col-md-6">
						<?php
					
							$t2=$row1['case_date'];
							$t3=$row1['case_code'];
							$t4=$row1['lawyer_key'];
							$t5=$row1['case_key'];
							$t6=$row1['court_key'];
							$t7=$row1['courttype_key'];
							$t8=$row1['client_key'];
							$t9=$row1['compalintype_key'];
							$t10=$row1['case_year'];
							$t11=$row1['amount'];
							$t12=$row1['party'];
							
							
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
						?>
							
								<a href="view_case.php?pcd=<?php echo $row1['casedetail_key']; ?>"  target="_blank">
									<div class="panel-transparent" style="opacity:0.7;filter:alpha(opacity=10)"
														onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100"
														onmouseout="this.style.opacity=0.6;this.filters.alpha.opacity=40">
													<div class="thumbnail panel-transparent ">
														<!--<img src="images/a6.jpg" alt=""   ><style="height: 100px;"-->
															<div class="cardhead" align="center">Case Code : <?php echo $b2; ?></div>
															<div class="cardhead" align="center">Case Name : <?php echo $b1; ?></div>
															<div class="cardhead" align="center">Court : <?php echo $d1." ".$c1; ?></div>
															<div class="cardhead" align="center">Lawyer : <?php echo $a1; ?></div>
															<div class="cardhead" align="center">Complain Type : <?php echo $f1; ?></div>
													   
													</div>
									</div>
								</a>
						</div>
					</div>	
						
				
			<?php
				}
			?>
	
			
	
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
			
</html>