<?php
//error_reporting(0);
include 'conn.php';		
include 'session_handler.php';		

$cur_dte=date("Y-m-d");

?>


<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Home</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">

        <!-- Custom styles -->
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
			font-size:40px;
			color:white;
			 text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
		}
		
		.phead{
			 font-family: "Times New Roman", Times, serif;
			 font-size:20px;
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
    <body class="bc" style="background-image: url('images/9.jpg')">
        <!-- small navbar -->
        <?php include('navi.php') ?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		
			
	
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
							
							$('#example1 thead th').each( function () {
								var title = $(this).text();
									$(this).html( '<label style="font-size:18px;color:white">'+title+'</label><input type="text" placeholder="'+title+'" class="form-control input-sm" style="color:black" />' );
								} );
											 
								// DataTable
								var table1 = $('#example1').DataTable({ "order": [[ 1, "asc" ]]});
											 
								// Apply the search
								table1.columns().every( function () {
								var that = this;
											 
								$( 'input', this.header() ).on( 'keyup change', function () {
										if ( that.search() !== this.value ) {
												that
												.search( this.value )
												.draw();
											}
										} );
								} );

							//............................................................. table 2 Jaquery
							
							$('#example2 thead th').each( function () {
								var title = $(this).text();
									$(this).html( '<label style="font-size:18px;color:white">'+title+'</label><input type="text" placeholder="'+title+'" class="form-control input-sm" style="color:black" />' );
								} );
											 
								// DataTable
								var table2 = $('#example2').DataTable({ "order": [[ 1, "asc" ]]});
											 
								// Apply the search
								table2.columns().every( function () {
								var that = this;
											 
								$( 'input', this.header() ).on( 'keyup change', function () {
										if ( that.search() !== this.value ) {
												that
												.search( this.value )
												.draw();
											}
										} );
								} );

							//............................................................. table 3 Jaquery
							
							$('#example3 thead th').each( function () {
								var title = $(this).text();
									$(this).html( '<label style="font-size:18px;color:white">'+title+'</label><input type="text" class="form-control input-sm" placeholder="'+title+'" style="color:black" />' );
								} );
											 
								// DataTable
								var table3 = $('#example3').DataTable({ "order": [[ 1, "asc" ]]});
											 
								// Apply the search
								table3.columns().every( function () {
								var that = this;
											 
								$( 'input', this.header() ).on( 'keyup change', function () {
										if ( that.search() !== this.value ) {
												that
												.search( this.value )
												.draw();
											}
										} );
								} );

							//............................................................. table 4 Jaquery
							
							$('#example4 thead th').each( function () {
								var title = $(this).text();
									$(this).html( '<label style="font-size:18px;color:white">'+title+'</label><input type="text" class="form-control input-sm" placeholder="'+title+'" style="color:black" />' );
								} );
											 
								// DataTable
								var table4 = $('#example4').DataTable({ "order": [[ 1, "asc" ]]});
											 
								// Apply the search
								table4.columns().every( function () {
								var that = this;
											 
								$( 'input', this.header() ).on( 'keyup change', function () {
										if ( that.search() !== this.value ) {
												that
												.search( this.value )
												.draw();
											}
										} );
								} );

							//............................................................. table 5 Jaquery
						
						if (sessionStorage.scrollTop != "undefined") {
									$(window).scrollTop(sessionStorage.scrollTop);
						}
					});	
			</script>
    </body>
</html>