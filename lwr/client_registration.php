<?php
include 'conn.php';	
include 'session_handler.php';	

?>

<?php

$cur_dte=date("Y-m-d");
?>

<?php

if(isset($_POST['btn_add'])) {
  
    $nm1 = $_POST['txt_fullnme'];
	$nm2 = $_POST['txt_address'];
    $nm3 = $_POST['txt_mobcontact'];
    $nm4 = $_POST['txt_tpcontact'];
	$nm5 = $_POST['txt_nicno'];
	$nm6 = $_POST['txt_nationality'];
	
	$nm8 = $_POST['txt_emailaddress'];
	$nm9 = $_POST['sele_nictype'];
	$nm10 = $_POST['txt_nicletter'];
	
	if($nm9==1){
		$niccc=$nm5."".$nm10;
	}
	if($nm9==2){
		$niccc=$nm5;
	}
	
	
	$sql1="SELECT * FROM client_master WHERE nic_no='$niccc' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)==0){
		
		$sql3="SELECT * FROM client_master WHERE mobile_no='$nm3' AND finact=0";
		$result3 = mysqli_query($link,$sql3);
		if(mysqli_num_rows($result3)==0){
				
						$pw=MD5(9900);
						
							$sql4="INSERT INTO client_master (finact,status,client_key,client_name,address,mobile_no,tp_no,nic_no,nationality,email_address,password,lowyer_key) 
													 VALUES(0,'A',NULL,'$nm1','$nm2','$nm3','$nm4','$niccc','$nm6','$nm8','$pw','$ses_ukey')";
							if(mysqli_query($link,$sql4)){
								echo "<script>
									alert('Successfully Client Registration.');
									window.location.href='client_registration.php';
								</script>";
								
								$to=$nm8;
								$subject='Case Management System - Your account register successfully.';				//subject eka danna
								$msg1="Dear  ".$nm1." \r\n"
									."Your account register successfully. Your user name is ".$niccc." and defult password 9900 \r\n"
									."Thank You \r\n"
									."Case Management System \r\n";					
								
								
								$ok3=mail($to,$subject,$msg1);
								if($ok3){
									echo "<script>
									alert('Successfully Client Registration and Email Sent.');
										window.location.href='client_registration.php';
									</script>";
								}
								else{
									echo "<script>
									alert('Successfully Client Registration and But Email Not Sent.');
										window.location.href='client_registration.php';
									</script>";
								}
							}
							else{
								echo "<script>
									alert('Execute Error.');
									window.location.href='client_registration.php';
								</script>";
							}
				
		}
		else{
			echo "<script>
							alert('Sorry, Already Registered this Client.');
							window.location.href='client_registration.php';
			</script>";
		}
		
	}
	else{
		echo "<script>
							alert('Sorry, Already Registered this Client.');
							window.location.href='client_registration.php';
			</script>";
	}
}

?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Registration</title>

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
				font-size:80px;
				color:white;
				 text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
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
                                      <label><font color="red">&lowast;</font>Full Name</label>
                                      <input type="text" class="form-control input-sm" name="txt_fullnme" placeholder="Please Enter Full Name" required value="<?php if(isset($_POST['sele_nictype'])){echo $_POST['txt_fullnme'];} ?>">
									</div>
									
									
									<div class="form-group">
                                       <label><font color="red">&lowast;</font>Address</label>
                                      <input type="text" class="form-control input-sm" name="txt_address" placeholder="Please Enter Address" required value="<?php if(isset($_POST['sele_nictype'])){echo $_POST['txt_address'];} ?>">
									</div>
									
									<div class="form-group">
                                       <label><font color="red">&lowast;</font>Mobile No</label>
                                      <input type="text" class="form-control input-sm" name="txt_mobcontact" placeholder="Please Enter Mobile No" required value="<?php if(isset($_POST['sele_nictype'])){echo $_POST['txt_mobcontact'];} ?>" pattern="^\d{10}$">
									</div>
									
									<div class="form-group">
                                       <label>Telephone No</label>
                                      <input type="text" class="form-control input-sm" name="txt_tpcontact" placeholder="Please Enter Telephone No" value="<?php if(isset($_POST['sele_nictype'])){echo $_POST['txt_tpcontact'];} ?>" pattern="^\d{10}$">
									</div>
									<div class="form-group">
                                       <label><font color="red">&lowast;</font>NIC Type</label>
										<select class="form-control input-sm" name="sele_nictype" required onchange="this.form.submit();">
												<?php
													if(isset($_POST['sele_nictype'])){
														if($_POST['sele_nictype']==1){
															echo "<option value='1'>Old ID 123456789V</option>";
															echo "<option value='2'>New ID 200112345678</option>";
														}
														if($_POST['sele_nictype']==2){
															echo "<option value='2'>New ID 200112345678</option>";
															echo "<option value='1'>Old ID 123456789V</option>";
														}
														
													}
													else{
														echo "<option value='' disabled selected hidden>Please Choose.............</option>";
														echo "<option value='1'>Old ID 123456789V</option>";
														echo "<option value='2'>New ID 200112345678</option>";
													}
													
												?>
										</select>
									</div>
									
									   <?php
										if(isset($_POST['sele_nictype'])){
									   ?>
											<?php
											if($_POST['sele_nictype']==1){
											?>
												<div class="form-group">
														<label><font color="red">&lowast;</font>NIC No</label>
														<div class="row">
															<div class="col-md-8">
																<input type="text" class="form-control input-sm" name="txt_nicno" placeholder="Please Enter NIC No" required pattern="^\d{9}$">
															</div>
															<div class="col-md-4">
																<input type="text" class="form-control input-sm" name="txt_nicletter" placeholder="Please Enter NIC Letter" required value="V">
															</div>
														</div>
												</div>
											<?php
											}
											?>
											
											<?php
											if($_POST['sele_nictype']==2){
											?>
												<div class="form-group">
													<label><font color="red">&lowast;</font>NIC No</label>
													<input type="text" class="form-control input-sm" name="txt_nicno" placeholder="Please Enter NIC No" required pattern="^\d{12}$">
												</div>	
											<?php
											}
											?>
									   <?php
										}
									   ?>
                                      
									
									
									<div class="form-group">
                                       <label><font color="red">&lowast;</font>Nationality</label>
                                      <input type="text" class="form-control input-sm" name="txt_nationality" placeholder="Please Enter Nationality" required>
									</div>
									
									<div class="form-group">
                                       <label>Email Address</label>
                                      <input type="email" class="form-control input-sm" name="txt_emailaddress" placeholder="Please Enter Email Address">
									</div>
									
                                  <button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Add New Client</button>
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
</body>
<?php
mysqli_close($link);
?>
</html>
