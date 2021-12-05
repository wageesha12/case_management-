 <html>
	<style>
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
</style>
<!-- main / large navbar -->
        <nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar bootstrap-admin-navbar-small" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="home.php">User Panel</a>
                        </div>
                        <div class="collapse navbar-collapse main-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="home.php">Home</a></li>
                                <li><a href="upload_doc.php">Upload Documents</a></li>
                                
                            </ul>
							<ul class="nav navbar-nav navbar-right">
							  <?php
								$cur_dte=date("Y-m-d");
								$afteddate= date('Y-m-d', strtotime('today + 7 days'));
								
								$num_of_notifications=0;
								$sql9999="SELECT * FROM case_details WHERE client_key='$ses_ukey' AND case_date>='$cur_dte' AND case_date<='$afteddate' AND finact=0";
								$result9999 = mysqli_query($link,$sql9999);
								$num_of_notifications+=mysqli_num_rows($result9999);
								
								$sql9998="SELECT * FROM lawyerfeehistory_details INNER JOIN case_details ON lawyerfeehistory_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.client_key='$ses_ukey' AND 
																	  lawyerfeehistory_details.date>='$cur_dte' AND 
																	  lawyerfeehistory_details.date<='$afteddate' AND 
																	  lawyerfeehistory_details.finact=0";
								$result9998 = mysqli_query($link,$sql9998);
								$num_of_notifications+=mysqli_num_rows($result9998);
								
								$sql9997="SELECT *,casepayment_details.amount AS casepayamu FROM casepayment_details INNER JOIN case_details ON casepayment_details.casedetails_key=case_details.casedetail_key
																WHERE casepayment_details.client_key='$ses_ukey' AND 
																	  casepayment_details.datos>='$cur_dte' AND 
																	  casepayment_details.datos<='$afteddate' AND 
																	  casepayment_details.finact=0";
								$result9997 = mysqli_query($link,$sql9997);
								$num_of_notifications+=mysqli_num_rows($result9997);
								
								$sql9996="SELECT * FROM requestdocument_details INNER JOIN case_details ON requestdocument_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.client_key='$ses_ukey' AND 
																	  requestdocument_details.request_dte>='$cur_dte' AND 
																	  requestdocument_details.request_dte<='$afteddate' AND 
																	  requestdocument_details.upload_dte IS NULL AND 
																	  requestdocument_details.finact=0";
								$result9996 = mysqli_query($link,$sql9996);
								$num_of_notifications+=mysqli_num_rows($result9996);
								
								$sql9995="SELECT * FROM requestdocument_details INNER JOIN case_details ON requestdocument_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.client_key='$ses_ukey' AND 
																	  requestdocument_details.submission_date='$afteddate' AND 
																	  requestdocument_details.upload_dte IS NULL AND 
																	  requestdocument_details.finact=0";
								$result9995 = mysqli_query($link,$sql9995);
								$num_of_notifications+=mysqli_num_rows($result9995);
								
								$sql9994="SELECT * FROM requestdocument_details INNER JOIN case_details ON requestdocument_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.client_key='$ses_ukey' AND 
																	  requestdocument_details.submission_date<='$cur_dte' AND 
																	  requestdocument_details.upload_dte IS NULL AND 
																	  requestdocument_details.finact=0";
								$result9994 = mysqli_query($link,$sql9994);
								$num_of_notifications+=mysqli_num_rows($result9994);
							  ?>
							  <li><a href="notification.php"><span class="glyphicon glyphicon-bell"></span>  <?php echo $num_of_notifications; ?></a></li>
							  <li><a><span class="glyphicon glyphicon-user"></span>  <?php echo $ses_user;?></a></li>
							  <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
							
							</ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </div>
            </div><!-- /.container -->
        </nav>
</html>