<!DOCTYPE html>
<html lang="en">

<!--THE TOP ============================================================================== -->
<head>

	<!-- Meta, title, CSS, favicons, etc. -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Community Hospital Referral Wizard</title>
	<link rel="icon" href="images/icons/favicon2.png" type="image/gif">
    
	
	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
	<!-- new font -->
	<link href="../newfonts/style.css" rel="stylesheet">

</head>
<!--========================================================================================-->

<!-- SESSION ======================================================== -->
<?php
	require_once 'include/common.php';

	// Declare SESSION
	if (isset($_SESSION['USER']))
	{
		// If user login as usual, allow user to access the website
		$name = $_SESSION['USER'];
		$role = $_SESSION['ROLE'];
		$username = $_SESSION['USERNAME'];

	}
	else
	{
		// If user just key in URL, redirect user to login page (index.php/landing page)
		header("Location: ../index.php");
		return;
	}
?>
<!-- ================================================================ -->


<!-- Side Bar ===================================================================================================================================================-->
	
	<!-- Side bar head ===========================================================================================================================-->
	<body class="nav-md" style="background-color: white;">
		<div class="container body"  style="background-color: #0a8c6a;">
			<div class="main_container" style="background-color: #0a8c6a;">
				<div class="col-md-3 left_col menu_fixed" style="background-color: #0a8c6a;">
					<div class="left_col scroll-view" style="background-color: #0a8c6a;">
						<div class="navbar nav_title" style="border: 0; background-color: #0a8c6a;">
							<div class="newfont">
								<!-- words on the top left side bar -->
								<a href="querypage.php" class="site_title"><img src='images/logo3.png' alt='' width="60">CH Referral</a>
							</div>
						</div>

						<div class="clearfix"></div>

						<!-- Menu profile quick info ========================================================================-->
						
						<div class="profile clearfix">
							<div class="profile_info">
								<span style="color:white;"><h6 style="font-size:18px">Welcome,</h6></span> 
								<div style="color:white;"><h6 style="font-size:20px"><b><?php echo $name; ?></b></h6></div>
							</div>
						</div>

						<br />
						<!-- =================================================================================================-->

						
	<!--=========================================================================================================================================--->

	<!-- side bar menu ==========================================================================================================================-->
          			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						
						<div class="menu_section">
							<!-- Unordered list for the sidebar -->
							<ul class="nav side-menu">
								<!-- Link to Home Page -->
								<li style="font-size:18px";><a href = "querypage.php"><i class="fa fa-home"></i>Home</a></li>
								<!-- Link to CH basic information page -->

								<li style="font-size:18px";><a><i class="fa fa-info-circle"></i>CH Information <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="ch_info.php">Basic Information</a></li>
										<li><a href="ch_info_bed.php">Bed Availability</a></li>
									</ul>
								</li>

								<?php
									// if user, have access to User Management, Criteria Setting and CH Setting
                    				if($role == "admin")
									{
										echo '<li style="font-size:18px";><a href = "ch_user.php"><i class="fa fa-users"></i>User Management</a></li>
										
										
										<li style="font-size:18px";><a href = "ch_comp.php"><i class="fa fa-gear"></i>Criteria Setting</a></li>


										<li style="font-size:18px";><a><i class="fa fa-cogs"></i>CH Setting <span class="fa fa-chevron-down"></span></a>
											<ul class="nav child_menu">
												<li><a href="ch_bed_avail.php">CH Bed Availability</a></li>
												<li><a href="ch_management.php">CH Management</a></li>
												<li><a href="ch_pri.php">CH Priority Update</a></li>
												<li><a href="ch_cap_setting.php">CH Capability Setting</a></li>
											</ul>
										</li>';
									}
								?>
							</ul>
						</div>

					</div>
	<!--=========================================================================================================================================--->
				</div>
            </div>
<!-- =============================================================================================================================================================-->



<!-- top navigation ==============================================================================================================================================-->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<?php echo $name; ?>
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="profile.php">Profile</a>
									<a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
								</div>
							</li>
						</ul>
					</nav>
				</div>
			</div>
<!--===========================================================================================================================================================-->



<!-- Website content  ==============================================================================================================================================-->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
              <div class="title_left">
                  <h3>CH Management</h3><br>
              </div>
          </div>


          <div class="clearfix"></div>
          
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">


              <?php
			  	// check if user had added the CH or just landed on the page (Whether $_SESSION['MSG'] is set or not)
                if (isset($_SESSION['MSG']))
                {
                    // After CH is added a MSG (message) will be passed over and this will be displayed
					$msg = $_SESSION['MSG'];
                    unset($_SESSION['MSG']);
                    echo '
                    <div class="x_title">
                      <h2>';

                    echo $msg;
                      
                    echo '</h2>
                      <div class="clearfix"></div>
                    </div>
                
                    <div class="x_content">
                        <button onclick="document.location=\'add_comhos.php\'" class="btn btn-primary">Add more Community Hospital</button>
                        <button onclick="document.location=\'ch_management.php\'" class="btn btn-success">Back to CH Management</button>
                    </div>
                    ';
        
                }
                else
                {
					// User first enter the page (when MSG is not set), it will display a form for user to fill up
					echo '
					<div class="x_title">
					<h2>Create Community Hospital</h2>
					<div class="clearfix"></div>
					</div>

					<div class="x_content">
					<form action="process_createch.php" method="POST">

						<div class="field item form-group">
						<label class="col-form-label col-md-3 col-sm-3  label-align">Community Hospital Name<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6">
							<input class="form-control" name="comhos_name" required="required" />
						</div>
						</div>

						<div class="field item form-group">
						<label class="col-form-label col-md-3 col-sm-3  label-align">Shortform<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6">
							<input class="form-control" name="comhos_short" required="required" />
						</div>
					</div>

					<div class="field item form-group">
						<label class="col-form-label col-md-3 col-sm-3  label-align">Address</label>
						<div class="col-md-6 col-sm-6">
							<textarea id="comhos_address" class="form-control" name="comhos_address" rows="4" cols="100"></textarea>
						</div>
					</div>

					<div class="field item form-group">
						<label class="col-form-label col-md-3 col-sm-3  label-align">Contact<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6">
							<input type = "number" class="form-control" name="comhos_contact" required="required" />
						</div>
					</div>

					<div class="field item form-group">
						<label class="col-form-label col-md-3 col-sm-3  label-align">Fax</label>
						<div class="col-md-6 col-sm-6">
							<input type = "number" class="form-control" name="comhos_fax"/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 offset-md-3">
							<table>
							<tr>
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-success">Reset</button>
							</form>';
							$website = "ch_management.php";
						
						
						echo'
							<form action='.$website.'>
								<button onclick="document.location='.$website.'" class="btn btn-success">Back</button>
							</form>
							</tr>
							</table>
						</div>
					</div>

				</div>
					';
				}
				?>


              </div>
            </div>
          </div>
        </div>
      </div>
<!--===========================================================================================================================================================-->



<!-- Footer content  ==============================================================================================================================================-->
            <footer>
                <div class="pull-right">
                </div>
                <div class="clearfix"></div>
            </footer>
<!--===========================================================================================================================================================-->
        </div>
    </div>
	

	<!-- Script ==============================================================================================================================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	<!--===========================================================================================================================================================-->

</body>

</html>
