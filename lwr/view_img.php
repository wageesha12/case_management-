<?php
include 'conn.php';
include 'session_handler.php';
?>


<!DOCTYPE html>
<html>
 <title>View Documents</title>
<link href="galf/bootstrap.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="galf/font-awesome.css">

<script src="galf/bootstrap.js"></script>
<script src="galf/jquery.js"></script>
<!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

 <style>
	body {
  background-color:#1d1d1d !important;
  font-family: "Asap", sans-serif;
  color:#989898;
  margin:10px;
  font-size:16px;
}

#demo {
  height:100%;
  position:relative;
  overflow:hidden;
}

.lblsty{
	font-weight:bold;
}

.green{
  background-color:#6fb936;
}
        .thumb{
            margin-bottom: 20px;
        }
        
        .page-top{
            margin-top:150px;
        }

   
img.zoom {
    width: 250px;
    height: 200px;
    
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
}
        
 
.transition {
    -webkit-transform: scale(1.2); 
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}
    .modal-header {
   
     border-bottom: none;
}
    .modal-title {
        color:#000;
    }
    .modal-footer{
      display:none;  
    }
 </style>
 
<script>
 $(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
		
		$(this).addClass('transition');
	}, function(){
        
		$(this).removeClass('transition');
	});
});
</script>

		<?php
			if(isset($_GET['doc'])){
				
				$sql2="SELECT * FROM requestdocument_details WHERE requestdoc_key='$_GET[doc]' AND finact=0";
				$result2 = mysqli_query($link,$sql2);
				while($row2=mysqli_fetch_array($result2)){
					$s1=$row2['casedetails_key'];
					$s2=$row2['casecycle_key'];
					$s3=$row2['document_name'];
				
				}
				
				$sql4="SELECT * FROM case_details WHERE casedetail_key='$s1' AND finact=0";
				$result4 = mysqli_query($link,$sql4);
				while($row4=mysqli_fetch_array($result4)){
					$t2=$row4['case_date'];
					$t3=$row4['case_code'];
					$t4=$row4['lawyer_key'];
					$t5=$row4['case_key'];
					$t6=$row4['court_key'];
					$t7=$row4['courttype_key'];
					$t8=$row4['client_key'];
					$t9=$row4['compalintype_key'];
					$t10=$row4['case_year'];
					$t11=$row4['amount'];
				}
				
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
				
				$sql12="SELECT * FROM complaintype_master WHERE complaintypemas_key='$t9' AND finact=0";
				$result12 = mysqli_query($link,$sql12);
				while($row12=mysqli_fetch_array($result12)){
					$f1=$row12['complain_name'];
					
				}
				
				$sql5="SELECT * FROM casecycle_details WHERE casecycle_key='$s2' AND finact=0";
				$result5 = mysqli_query($link,$sql5);
				while($row5=mysqli_fetch_array($result5)){
					$g1=$row5['enter_date'];
					$g2=$row5['noof_casedefined'];
					$g3=$row5['nextcourt_dte'];
				}
					
		?>
 <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<div class="col-md-2">
					<a href="home.php" style="text-decoration:none; font-size:30px; font-weight: bold; color:red">Back<i class="glyphicon glyphicon-arrow-left"></i></a>
			</div>
			<div class="col-md-8">
				
					<a class="navbar-brand" href="#">
				
					<table class="table" id="t1" border="0">
												<tr>
													<td width="40%"><label class="lblsty">Case Code  : <?php echo $t3; ?></label></td>
													<td width="60%"><label class="lblsty">Case Name  : <?php echo $b1; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Case Year : <?php echo $t10;?></label></td>
													<td width="60%"><label class="lblsty">Court :  <?php echo $c1." ".$d1; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Complain Type  </label></td>
													<td width="60%"><label class="lblsty">: <?php echo $f1; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Case Cycle  : <?php echo $g2; ?></label></td>
													<td width="60%"><label class="lblsty">Court Date  : <?php echo $g3; ?></label></td>
												</tr>
												<tr>
													<td width="40%"><label class="lblsty">Documet Name  </label></td>
													<td width="60%"><label class="lblsty">: <?php echo $s3; ?></label></td>
												</tr>
												
					</table>
					</a>
			</div>
			<div class="col-md-2 text-right">
			
			</div>				 
				
        
		</div>
		
    </nav>

    <!-- Page Content -->
	<div class="container page-top">
		<br>
		<br>
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
	
			<?php
						
						$sql6="SELECT * FROM images_details WHERE requestdoc_key='$_GET[doc]'";
						$result6 = mysqli_query($link,$sql6);
						$yy=mysqli_num_rows($result6);
						while($row6=mysqli_fetch_array($result6)){
							
			?>
					<div class="col-lg-3 col-md-4 col-xs-6 thumb">
						<a href="requireddoc/<?php echo $row6['img_path'] ?>" class="fancybox" rel="ligthbox">
							<img src="requireddoc/<?php echo $row6['img_path'] ?>?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid "  alt="">
						   
						</a>
					</div>
			<?php
						}
			?>
		</div>
    </div>
	<?php
			}
	?>

</html>