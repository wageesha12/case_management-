<?php
error_reporting(0);
include 'conn.php';		
include 'session_handler.php';		
?>
<?php

$cur_dte=date("Y-m-d");
?>

<?php
	$sql1="SELECT * FROM user_master WHERE NOT user_key='$ses_ukey'";
	$result1=mysqli_query($link,$sql1);
	$option1 ="";
	while($row1=mysqli_fetch_array($result1)){
		$option1 = $option1."<option>$row1[user_nme]</option>";
	}
	
	if(isset($_POST['btn_resetpw'])){
		$n1=$_POST['d2'];
		
		$sql2="SELECT * FROM user_master WHERE user_nme='$n1'";
		$result2=mysqli_query($link,$sql2);
		while($row2=mysqli_fetch_array($result2)){
			 	$ukeyo=$row2['user_key'];
		}
		
		$pw=MD5(9900);
		$sql3="UPDATE user_master SET password ='$pw' WHERE user_key='$ukeyo'";
		if(mysqli_query($link,$sql3)){
			$message="Successfully Reset Password";
		}
		
	}
?>

<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Reset Password</title>
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
			font-size:80px;
			color:white;
			 text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
		}
		
		.fheader{
				 color:#000000;
				 font-family: "Times New Roman", Times, serif;
				 font-size:18px;
		}
	
		</style>
    </head>
    <body class="bc" style="background-image: url(images/6.jpg);">
        <!-- small navbar -->
        <?php include('navi.php') ?>
		<br>
		<br>
		<br>
		<br>
		<br>
       
            <div class="row">   
				<div class="col-lg-2">
					
				</div>
				<div class="col-lg-8">
					<?php
						if($message==""){
					?>
						<div class="alert alert-info">
							<a class="close" data-dismiss="alert" href="#">&times;</a>
						   <strong>Reset Password</strong>
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
								
								<div class="form-group" >
									<label class="fheader">User Name</label>
									<select class="form-control input-sm" name="d2">
									<?php
                                       
												echo "<option value='' disabled selected hidden>Please Choose.............</option>";
												echo $option1;				
									?>
									</select>
								</div>
								
								<button type="submit" name="btn_resetpw" class="btn btn-lg btn-primary btn-block">Reset Password</button>
							</form>
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
						$(document).ready(function() {
							$('#example thead th').each( function () {
								 var title = $('#example thead th').eq( $(this).index() ).text();
								
								$(this).html( '<label style="font-size:18px;color:white">'+title+'</label><input type="text" placeholder="'+title+'" style="color:black;" class="form-control input-sm" />' );
							} );
			 
						// DataTable
							var table = $('#example').DataTable({

								"stateSave": true,
									
							});
						
							var state = table.state.loaded();
							if ( state ) {
							  table.columns().eq( 0 ).each( function ( colIdx ) {
								var colSearch = state.columns[colIdx].search;
								
								if ( colSearch.search ) {
								  $( 'input', table.column( colIdx ).header() ).val( colSearch.search );
								}
							  } );
							  
							  table.draw();
							}
							// Apply the search
					
							table.columns().eq( 0 ).each( function ( colIdx ) {
								$( 'input', table.column( colIdx ).header() ).on( 'keyup change', function () {
									table
										.column( colIdx )
										.search( this.value )
										.draw();
								} );
							} );
						
						
							$(".clickable-row").click(function() {
								window.location = $(this).data("href");
							  });
							});
				
			</script>
    </body>
</html>