<?php
include 'conn.php';	
include 'session_handler.php';	

ini_set('SMTP', "server.com");
ini_set('smtp_port', "25");
ini_set('sendmail_from', "email@domain.com");
?>

<?php

$cur_dte=date("Y-m-d");
?>

<?php

if(isset($_POST['btn_add'])) {

    $nm1 = $_POST['sele_courttype'];
	$nm2 = $_POST['sele_court'];
    $nm3 = $_POST['sele_clientnme'];
    $nm4 = $_POST['sele_header'];
	$nm5 = $_POST['sele_casetype'];
	$nm6 = $_POST['txt_casedte'];
	$nm7 = $_POST['txt_party'];
	
	
	
	$sql1="SELECT * FROM case_details WHERE case_date='$nm6' AND lawyer_key='$ses_ukey' AND case_key='$nm5' AND court_key='$nm2' AND client_key='$nm3' AND compalintype_key='$nm4' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)==0){
					$sql3="SELECT * FROM courttype_master WHERE courttype_key='$nm1' AND finact=0";
					$result3 = mysqli_query($link,$sql3);
					while($row3=mysqli_fetch_array($result3)){
						$courttypeos=$row3['courttype_key'];
					}
					
					$sql5="SELECT * FROM case_master WHERE casemas_key='$nm5' AND finact=0";
					$result5 = mysqli_query($link,$sql5);
					while($row5=mysqli_fetch_array($result5)){
						$casetypos=$row5['case_code'];
					}
					
					$dste = explode('-',$nm6);
					$caseyr=$dste[0];
					
					$sql6="SELECT MAX(support_no) AS maxsuppno FROM case_details WHERE lawyer_key='$ses_ukey' AND case_key='$nm5' AND finact=0";
					$result6 = mysqli_query($link,$sql6);
					while($row6=mysqli_fetch_array($result6)){
						$maxsuppno=$row6['maxsuppno'];
					}
					
					$maxaftersupport=$maxsuppno+1;
					$maxpprifix = sprintf('%03d',$maxaftersupport);
					
					$casess_code=$courttypeos."".$casetypos."".$maxpprifix."".$caseyr;
					
					$sql4="INSERT INTO case_details (finact,status,casedetail_key,case_date,case_code,lawyer_key,case_key,court_key,courttype_key,client_key,compalintype_key,case_year,support_no,party,act_person) 
					                         VALUES(0,'A',NULL,'$nm6','$casess_code','$ses_ukey','$nm5','$nm2','$nm1','$nm3','$nm4','$caseyr','$maxaftersupport','$nm7','$ses_ukey')";
					if(mysqli_query($link,$sql4)){
						
						$sql2="SELECT * FROM case_details WHERE case_date='$nm6' AND lawyer_key='$ses_ukey' AND case_key='$nm5' AND court_key='$nm2' AND client_key='$nm3' AND compalintype_key='$nm4' AND finact=0";
						$result2 = mysqli_query($link,$sql2);
						while($row2=mysqli_fetch_array($result2)){
							$case_keyos=$row2['casedetail_key'];
						}
						
						$sql16="SELECT * FROM case_details WHERE casedetail_key='$case_keyos' AND finact=0";
						$result16 = mysqli_query($link,$sql16);
						while($row16=mysqli_fetch_array($result16)){
							$ns1=$row16['case_code'];
							$ns2=$row16['case_key'];
							$ns3=$row16['court_key'];
							$ns4=$row16['courttype_key'];
							$ns5=$row16['client_key'];
							$ns6=$row16['compalintype_key'];
							$ns7=$row16['party'];
						}
						
						$sql17="SELECT * FROM case_master WHERE  casemas_key='$ns2' AND finact=0";
						$result17 = mysqli_query($link,$sql17);
						while($row17=mysqli_fetch_array($result17)){
							$ny1=$row17['case_name'];
						}
						
						$sql18="SELECT * FROM court_master WHERE courtmas_key='$ns3' AND finact=0";
						$result18 = mysqli_query($link,$sql18);
						while($row18=mysqli_fetch_array($result18)){
							$ny2=$row18['court_name'];
						}
						
						$sql19="SELECT * FROM courttype_master WHERE courttype_key='$ns4' AND finact=0";
						$result19 = mysqli_query($link,$sql19);
						while($row19=mysqli_fetch_array($result19)){
							$ny3=$row19['courtype_name'];
						}
						
						$sql20="SELECT * FROM client_master WHERE client_key='$ns5' AND finact=0";
						$result20 = mysqli_query($link,$sql20);
						while($row20=mysqli_fetch_array($result20)){
							$ny4=$row20['client_name'];
							$ny5=$row20['email_address'];
							
						}
						
						$sql21="SELECT * FROM complaintype_master WHERE complaintypemas_key='$ns6' AND finact=0";
						$result21 = mysqli_query($link,$sql21);
						while($row21=mysqli_fetch_array($result21)){
							$ny6=$row21['complain_name'];
							
						}
						
						$to=$ny5;
						
						$subject='Case Management System - The Case has been initialized Successfully';				//subject eka danna
						$msg1="Dear  ".$ny4." \r\n"
							."Your Case Code ".$ns1." \r\n"
							."Case ".$ny1." \r\n"
							."Court ".$ny3." ".$ny2." \r\n"
							."Case Type  ".$ny6." \r\n"
							."Party  ".$ns7." \r\n"
							."Thank You \r\n"
							."Case Management System \r\n";					
						
						
						$ok3=mail($to,$subject,$msg1);
						if($ok3){
							echo "<script>
							alert('Successfully Added This Case and Email Sent.');
								window.location.href='view_case.php?pcd=$case_keyos';
							</script>";
						}
						else{
							echo "<script>
							alert('Successfully Added This Case and But Email Not Sent.');
								window.location.href='view_case.php?pcd=$case_keyos';
							</script>";
						}
						
						
					}
					else{
						echo "<script>
							alert('Execute Error.');
							window.location.href='initial_case.php';
						</script>";
					}
		
	}
	else{
		echo "<script>
							alert('Sorry, Already Added this Case.');
							window.location.href='initial_case.php';
			</script>";
	}
}

?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initial Case</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme-change-size.css">

        <!-- Vendors -->
        <link rel="stylesheet" media="screen" href="vendors/easypiechart/jquery.easy-pie-chart.css">
        <link rel="stylesheet" media="screen" href="vendors/easypiechart/jquery.easy-pie-chart_custom.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
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
		label{
			color:#ffffff;
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
<body class="bc" style="background-image: url('images/8.jpg')">
     <?php include('navi.php') ?>
		<br>
		<br>
		<br>
		<br>
       
    	
		<div class="row">

            <div class="col-lg-2">

            </div>
            
                
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-12">
						<section class="panel panel-primary panel-transparent">
                          
							<div class="panel-body">
								<form role="form" method="post" name="f1">
									
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Case File Date</label>
									  <input type="date" class="form-control input-sm" name="txt_casedte" required value="<?php if(isset($_POST['txt_casedte'])){ echo $_POST['txt_casedte'];} ?>">
									</div>
									
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Court Type</label>
									  <select class="form-control input-sm" name="sele_courttype" required onchange="this.form.submit()">
												<?php
													
													$sql10="SELECT * FROM courttype_master WHERE finact=0 ORDER BY courtype_name ASC";
													$result10=mysqli_query($link,$sql10);
													$option10 ="";
													while($row10=mysqli_fetch_array($result10)){
														$option10 = $option10."<option value=$row10[courttype_key]>$row10[courtype_name]</option>";			//Load Branch
													}
													
													if(isset($_POST['sele_courttype'])) {
														
														$sql11="SELECT * FROM courttype_master WHERE courttype_key='$_POST[sele_courttype]' AND finact=0";
														$result11=mysqli_query($link,$sql11);
														$option11 ="";
														while($row11=mysqli_fetch_array($result11)){
															$option11= $option11."<option value=$row11[courttype_key]>$row11[courtype_name]</option>";
														}
														
														 
														 echo $option11;
													}
													else{
														echo "<option value='' disabled selected hidden>Please Choose.............</option>";
														echo $option10;
													}
												?>
										</select>
                                     
									</div>
									
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Court</label>
                                      	<select class="form-control input-sm" name="sele_court" required >
												<?php
													
													$sql12="SELECT * FROM court_master WHERE courttype_key='$_POST[sele_courttype]' AND finact=0 ORDER BY court_name ASC";
													$result12=mysqli_query($link,$sql12);
													$option12 ="";
													while($row12=mysqli_fetch_array($result12)){
														$option12 = $option12."<option value=$row12[courtmas_key]>$row12[court_name]</option>";			//Load Branch
													}
													
													
														echo "<option value='' disabled selected hidden>Please Choose.............</option>";
														echo $option12;
													
												?>
										</select>
									</div>
									
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Client Name</label>
                                      <select class="form-control input-sm" name="sele_clientnme" required >
												<?php
													
													$sql13="SELECT * FROM client_master WHERE lowyer_key='$ses_ukey' AND finact=0 ORDER BY client_name ASC";
													$result13=mysqli_query($link,$sql13);
													$option13 ="";
													while($row13=mysqli_fetch_array($result13)){
														$option13 = $option13."<option value=$row13[client_key]>$row13[client_name] - $row13[nic_no]</option>";			//Load Branch
													}
													
													
														echo "<option value='' disabled selected hidden>Please Choose.............</option>";
														echo $option13;
													
												?>
										</select>
									</div>
									
									<div class="form-group">
										<label><font color="red">&lowast;</font>Type</label>
										<select class="form-control input-sm" name="sele_header" required >
												<?php
													
													$sql15="SELECT * FROM complaintype_master WHERE finact=0 ORDER BY complain_name ASC";
													$result15=mysqli_query($link,$sql15);
													$option15 ="";
													while($row15=mysqli_fetch_array($result15)){
														$option15 = $option15."<option value=$row15[complaintypemas_key]>$row15[complain_name]</option>";			//Load Branch
													}
													
													echo "<option value='' disabled selected hidden>Please Choose.............</option>";
													echo $option15;
														
													
												?>
										</select>
									</div>
									
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Case Type</label>
                                      <select class="form-control input-sm" name="sele_casetype" required >
												<?php
													
													$sql14="SELECT * FROM case_master WHERE finact=0 ORDER BY case_name ASC";
													$result14=mysqli_query($link,$sql14);
													$option14 ="";
													while($row14=mysqli_fetch_array($result14)){
														$option14 = $option14."<option value=$row14[casemas_key]>$row14[case_code] - $row14[case_name]</option>";			//Load Branch
													}
													
													
														echo "<option value='' disabled selected hidden>Please Choose.............</option>";
														echo $option14;
													
												?>
										</select>
									</div>
									<div class="form-group">
										<label><font color="red">&lowast;</font>Party</label>
										 <input type="text" class="form-control input-sm" name="txt_party" required>
									</div>
                                  <button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Add New Case</button>
								</form>

							</div>
						</section>

					</div>
				</div>
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
<?php
mysqli_close($link);
?>
</html>
