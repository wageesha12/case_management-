<?php
error_reporting(0);
 include 'conn.php';	
 include 'session_handler.php';		 
 ?>


<?php
  
  $message="";

  if(!isset($_SESSION['login_user'])){
    header("location:index.php");
  }
?>

<?php
  if(isset($_POST['btn_newpwadd'])){
       $nwp=$_POST['txt_newpassword'];
       $nwcp=$_POST['txt_confirmpassword'];

       if($nwp==""){
            $message="Please Enter the New Password";
       }
       else if($nwcp==""){
             $message="Please Enter the Confirm Password";
       }
       else if($nwp!==$nwcp){
            $message="Not Match the Password";
       }
       else if($nwcp=="9900" || $nwcp=="9900"){
              $message="This Password Not Used";
       }
       else{
            $password=MD5($_POST['txt_newpassword']);
            $sql13 = "UPDATE user_master SET password='$password' WHERE user_key='$ses_ukey'";
            mysqli_query($link, $sql13);
            header("location:index.php");
       }

  }


?>

<!DOCTYPE html>
<html lang="en">


    <head>
        <title>New Password</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">
		<link rel="stylesheet" media="screen" href="css/common.css">
        <!-- Custom styles -->
        <style type="text/css">
            .alert{
                margin: 0 auto 20px;
            }
			.fheader{
				 color:#000000;
				 font-family: "Times New Roman", Times, serif;
				 font-size:18px;
			}
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="background-position:center;
            background-attachment:fixed;
            background-size:100% 100%;background-image: url(images/8.jpg);">
        <div class="container">
		
			<div class="row">
                <div class="col-lg-2">
					
				</div>
				<div class="col-lg-8">
					<?php
						if($message==""){
					?>
						<div class="alert alert-info">
							<a class="close" data-dismiss="alert" href="#">&times;</a>
						   <strong>New Password</strong>
						</div>
					<?php
						}
						else{
					?>
						<div class="alert alert-danger">
						  <a class="close" data-dismiss="alert" href="#">&times;</a>
						  <strong><?php echo $message; ?></strong>
						</div>
                   <?php
						}
				   ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-2">
				
				</div>
				<div class="col-lg-8">
					<section class="panel-primary panel-transparent">
						<div class="panel-body">
							<form role="form" id="form1" name="form1" method="post" action="">
								<div class="form-group" align="center">
											<label style="font-size: 30px;">User Name: <?php echo $ses_user; ?></label>
											
								</div>
								<div class="form-group" >
											<label class="fheader">New Password</label>
											<input type="password" name="txt_newpassword" class="form-control" >
								</div>
								<div class="form-group" >
											<label class="fheader">Confirm Password</label>
											<input type="password" name="txt_confirmpassword" class="form-control" >
								</div>
								<button type="submit" name="btn_newpwadd" class="btn btn-lg btn-primary btn-block">New Password</button>
							</form>
						</div>
									 
					</section>
				</div>
            </div>
		</div>  
		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

<?php
mysqli_close($link);
?>
</html>
