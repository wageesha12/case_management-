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
                            <a class="navbar-brand" href="home.php">Admin Panel</a>
                        </div>
                        <div class="collapse navbar-collapse main-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="client_registration.php">Client Registration</a></li>
								<li><a href="initial_case.php">Initial Case</a></li>
								<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-hover="dropdown">Reports <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
										<li><a href="rtp_completediscuss.php">Complete Discuss Case</a></li>
                                        <li><a href="rtp_pendingdiscuss.php">Pending Discuss Case</a></li>
										 <li><a href="tcpdf/reports/payments.php">Payment</a></li>
                                    </ul>
									
                                </li>
								<li><a href="update_profile.php">Update Your Profile</a></li>
                            </ul>
							<ul class="nav navbar-nav navbar-right">
							   <?php
									$cur_dte=date("Y-m-d");
									$afteddate= date('Y-m-d', strtotime('today + 7 days'));
									$afted14date= date('Y-m-d', strtotime('today + 14 days'));
									$afted4date= date('Y-m-d', strtotime('today + 4 days'));
									
									$num_of_notifications=0;
									
									$sql9999="SELECT * FROM case_details WHERE lawyer_key='$ses_ukey' AND case_date>='$cur_dte' AND case_date<='$afteddate' AND finact=0";
									$result9999 = mysqli_query($link,$sql9999);
									$num_of_notifications+=mysqli_num_rows($result9999);
									
									$sql9998="SELECT * FROM requestdocument_details INNER JOIN case_details ON requestdocument_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.lawyer_key='$ses_ukey' AND 
																	  requestdocument_details.request_dte>='$cur_dte' AND 
																	  requestdocument_details.request_dte<='$afteddate' AND 
																	  requestdocument_details.upload_dte IS NULL AND 
																	  requestdocument_details.finact=0";
									$result9998 = mysqli_query($link,$sql9998);
									$num_of_notifications+=mysqli_num_rows($result9998);
									
									$sql9997="SELECT * FROM requestdocument_details INNER JOIN case_details ON requestdocument_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.lawyer_key='$ses_ukey' AND 
																	  requestdocument_details.upload_dte>='$cur_dte' AND 
																	  requestdocument_details.upload_dte<='$afteddate' AND 
																	  requestdocument_details.upload_dte IS NOT NULL AND 
																	  requestdocument_details.finact=0";
									$result9997 = mysqli_query($link,$sql9997);
									$num_of_notifications+=mysqli_num_rows($result9997);
									
									$sql9996="SELECT * FROM casecycle_details INNER JOIN case_details ON casecycle_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.lawyer_key='$ses_ukey' AND 
																	  casecycle_details.nextcourt_dte='$afted14date' AND 
																	  casecycle_details.finact=0";
									$result9996 = mysqli_query($link,$sql9996);
									$num_of_notifications+=mysqli_num_rows($result9996);
									
									$sql9995="SELECT * FROM casecycle_details INNER JOIN case_details ON casecycle_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.lawyer_key='$ses_ukey' AND 
																	  casecycle_details.nextcourt_dte='$afted4date' AND 
																	  casecycle_details.finact=0";
									$result9995 = mysqli_query($link,$sql9995);
									$num_of_notifications+=mysqli_num_rows($result9995);
									
									$sql9994="SELECT * FROM requestdocument_details INNER JOIN case_details ON requestdocument_details.casedetails_key=case_details.casedetail_key
																WHERE case_details.lawyer_key='$ses_ukey' AND 
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