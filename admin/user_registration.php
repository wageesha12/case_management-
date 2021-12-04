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
    $nm2 = $_POST['txt_contact'];
    $nm3 = $_POST['txt_address'];
	$nm4 = $_POST['txt_username'];
	
	
	$sql1="SELECT * FROM user_master WHERE user_nme='$nm4' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)==0){
		
				
				$pw=MD5(9900);
				
					$sql4="INSERT INTO user_master (finact,status,user_key,full_name,contact_no,address,user_nme,password,act_person) 
					                         VALUES(0,'A',NULL,'$nm1','$nm2','$nm3','$nm4','$pw','$ses_ukey')";
					if(mysqli_query($link,$sql4)){
						echo "<script>
							alert('Sucessfully Registration.');
							window.location.href='user_registration.php';
						</script>";
					}
					else{
						echo "<script>
							alert('Execute Error.');
							window.location.href='user_registration.php';
						</script>";
					}
				
				
		
	}
	else{
		$message="Sorry,Dupilcate User Name";
	}
}

?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

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
                                      <input type="text" class="form-control input-sm" name="txt_fullnme" placeholder="Please Enter Full Name" required>
									</div>
									
									<div class="form-group">
                                       <label><font color="red">&lowast;</font>Contact No</label>
                                      <input type="text" class="form-control input-sm" name="txt_contact" placeholder="Please Enter Contact No" required>
									</div>
									
									<div class="form-group">
                                       <label><font color="red">&lowast;</font>Address</label>
                                      <input type="text" class="form-control input-sm" name="txt_address" placeholder="Please Enter Address" required>
									</div>

									<div class="form-group">
                                        <label><font color="red">&lowast;</font>User Name</label>
										<input type="text" class="form-control input-sm" name="txt_username"  placeholder="Please Enter User Name" required>
									</div>
									
                                  <button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Add New User</button>
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
