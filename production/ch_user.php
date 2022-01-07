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

<!-- Page Content  ---------------------------------------------------------------------------------------------------------------------------------->          
<div class="right_col" role="main">
    <div class="">
            
        <!-- top part------------------------------------------------------------------------------------- -->
        <div class="page-title">
            <div class="title_left">
            <h3>User Management</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <!-- --------------------------------------------------------------------------------------------- -->

            
            <!-- Result Table----------------------------------------------------------------------------------- -->
            <div class="row" style="display: block;">

              <div class="col-md-12 col-sm-12">
                  
                <div class="x_panel">

							<?php
								$dao = new UsermanagementnewDAO();                              
								$user_list = $dao->retrieve();

								if ($user_list != null)
								{
									echo '<h4>New Request</h4>
									<hr>
									<div class="x_content">
										<div class = "table-responsive">
										<table class="table table-striped" style="font-size: 15px;">
											
											<thead>
											<tr style="background-color:#2a3f54; color: white;" >
														<th>Email</th>
														<th>Name</th>
														<th>Action</th>
											</tr>
											</thead>
					
											<tbody>';

											foreach ($user_list as $user)
											{
												$username2 = $user->getusername();
												$name2 = $user->getname_of_user();
			
												echo "<tr>";
													echo "<th scope='row'>";
													echo $username2;
													echo "</th>";
				
													echo "<td>";
													echo $name2;
													echo "</td>";
			
													echo "<td>";
													echo "<form action='add_user.php' method='POST'>";
														echo "<input type='hidden' id='username' name='username' value='" . $username2 . "'>";
														echo "<input type='hidden' id='name' name='name' value='" . $name2 . "'>";
														echo "<button type='submit' class='btn btn-primary' style = 'background-color: green; border-color: green;'>Add User</button>";
														echo "<button type='submit' formaction='reject_user.php' class='btn btn-primary' style = 'background-color: red; border-color: red;'>Reject</button>";
													echo "</form>";
			
													echo "</td>";
			
												echo "</tr>";
											}
											echo "</tbody>

												</table>
												</div>
											  </div>";
                                }
                            ?>
                          

					<h4>Current User <small>(Last access longer than 6 months will be in red)</small></h4>
					<hr>
                    <form action='add_user.php' method='GET'>
                        <button type='submit' class='btn btn-success'>Add New User</button>
                    </form>

                  <div class="x_content">
				  <div class = 'table-responsive'>
                    <table class="table table-striped" style="font-size: 15px;">
                      
                      <thead>
                        <tr style="background-color:#2a3f54; color: white;" >
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Role</th>
									<th>Enrollment Date</th>
									<th>Last Access</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                        
                            <?php
                                $dao = new UsermanagementDAO();
                                $username2 = '';
                                $name2 = '';
                                $role2 = '';
								$enroll_date = '';
								$last_access = '';
                                
                                $user_list = $dao->retrieve($username);

                                foreach ($user_list as $user)
                                {
                                    $username2 = $user->getusername();
                                    $name2 = $user->getname_of_user();
                                    $role2 = $user->getrole();
									$enroll_date = $user->getenroll_date();
									$last_access = $user->getlast_access();


									
									$todaydate =date_create(date("Y-m-d"));
									$access =date_create($last_access);

									$diff= date_diff($todaydate, $access);

									$diffdate = intval($diff->format("%a"));

                                    echo "<tr>";
                                        echo "<th scope='row'>";
                                        echo $username2;
                                        echo "</th>";
    
                                        echo "<td>";
                                        echo $name2;
                                        echo "</td>";
    
                                        echo "<td>";
                                        echo $role2;
                                        echo "</td>";

										echo "<td>";
                                        echo $enroll_date;
                                        echo "</td>";

										if ($diffdate > 183)
											echo "<td style='color:red;'>";
										else
											echo "<td>";
                                        echo $last_access;
                                        echo "</td>";

                                        echo "<td>";
                                        echo "<form action='delete_confirmation.php' method='GET'>";
                                            echo "<input type='hidden' id='username' name='username' value=" . $username2 . ">";
                                            echo "<button type='submit' class='btn btn-primary' style = 'background-color: red; border-color: red;'>Delete</button>";
                                        echo "</form>";
                                        echo "</td>";

                                    echo "</tr>";

                                }

                            ?>
                          
                          </tbody>

                        </table>
						</div>
                      </div>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    
    <!-- Javascript functions	-->
	<script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>

    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>

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

</body>

</html>
