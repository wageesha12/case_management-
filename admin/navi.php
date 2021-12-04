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
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-hover="dropdown">Master Menu <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
										<li><a href="user_registration.php">User Registration</a></li>
                                        <li><a href="reset_pws.php">Reset Password - Admin Users</a></li>
										 <li><a href="reset_pws_lawyers.php">Reset Password - Lawyers</a></li>
                                    </ul>
									
                                </li>
								<li><a href="lawyer_registration.php">Lowyer Registration</a></li>
								<li><a href="initial_documents.php">Initial Documents</a></li>
								
                            </ul>
							<ul class="nav navbar-nav navbar-right">
			
							  <li><a><span class="glyphicon glyphicon-user"></span>  <?php echo $ses_user;?></a></li>
							  <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
							
							</ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </div>
            </div><!-- /.container -->
        </nav>
</html>