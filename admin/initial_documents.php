<?php
include 'conn.php';	
include 'session_handler.php';	

?>

<?php

$cur_dte=date("Y-m-d");
?>

<?php



if(isset($_POST['btn_add'])) {
 
    $nm1 = $_POST['sele_casetype'];
    $nm2 = $_POST['txt_documents'];
  
	
	
	$sql1="SELECT * FROM initialimages_details  WHERE case_key='$nm1' AND initialimg_name='$nm2' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)==0){
		
					$sql4="INSERT INTO initialimages_details (finact,status,initialimages_key,case_key,initialimg_name,act_person) 
					                         VALUES(0,'A',NULL,'$nm1','$nm2','$ses_ukey')";
					if(mysqli_query($link,$sql4)){
						echo "<script>
							alert('Successfully Initial Documents.');
							window.location.href='initial_documents.php';
						</script>";
					}
					else{
						echo "<script>
							alert('Execute Error.');
							window.location.href='initial_documents.php';
						</script>";
					}
				
				
		
	}
	else{
		echo "<script>
							alert('Sorry, Already Added this Documents.');
							window.location.href='initial_documents.php';
			</script>";
	}
}

?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initial Documents</title>

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
                                      <label><font color="red">&lowast;</font>Case</label>
										<select class="form-control input-sm" name="sele_casetype" required onchange="this.form.submit()">
												<?php
													
													$sql2="SELECT * FROM case_master WHERE finact=0 ORDER BY case_name ASC";
													$result2=mysqli_query($link,$sql2);
													$option2 ="";
													while($row2=mysqli_fetch_array($result2)){
														$option2 = $option2."<option value=$row2[casemas_key]>$row2[case_code] - $row2[case_name]</option>";			//Load Branch
													}
													
												if(isset($_POST['sele_casetype'])){	
													$sql3="SELECT * FROM case_master WHERE casemas_key='$_POST[sele_casetype]' AND finact=0 ORDER BY case_name ASC";
													$result3=mysqli_query($link,$sql3);
													$option3 ="";
													while($row3=mysqli_fetch_array($result3)){
														$option3 = $option3."<option value=$row3[casemas_key]>$row3[case_code] - $row3[case_name]</option>";			//Load Branch
													}
													echo $option3;
													echo $option2;
												}
												else{
													echo "<option value='' disabled selected hidden>Please Choose.............</option>";
													echo $option2;
												}
													
												?>
										</select>
									</div>
									
									<div class="form-group">
                                       <label><font color="red">&lowast;</font>Documents</label>
                                      <input type="text" class="form-control input-sm" name="txt_documents" placeholder="Please Enter Document Name" required>
									</div>
                                  <button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Add New Documents</button>
								</form>

							</div>
						</section>

					</div>
				</div>
			</div>
		</div>
		
		<?php
		if(isset($_POST['sele_casetype'])){
		?>
			<div class="row">
						<div class="col-md-3">
						
						</div>
						<div class="col-md-6">
							<section class="panel panel-transparent">
								<div class="panel-body panel-transparent">
									<table class="table table-striped table-bordered display" id="example" width="100%">
										<thead>
											<tr>
												<th>Inital Documents</th>
												
											</tr>
										</thead>
										<tbody>
										
														<?php
															$sql1="SELECT * FROM initialimages_details WHERE case_key='$_POST[sele_casetype]' AND finact=0";
															$result1 = mysqli_query($link,$sql1);
															while($row1=mysqli_fetch_array($result1)){
																
																echo "
																<tr>
																		<td width='100%' class='yy'>".$row1['initialimg_name']."</td>
																		
																</tr>";
															}
															
															
														?>
										
										</tbody>
									</table>
								</div>
							</section>
						</div>
			</div>
		<?php
		}
		?>

   

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
