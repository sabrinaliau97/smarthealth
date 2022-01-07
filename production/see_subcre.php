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
                <h3>Criteria Management</h3>
              </div>
            </div>

            <div class="clearfix"></div>



            <!-- --------------------------------------------------------------------------------------------- -->

            
            <!-- Result Table----------------------------------------------------------------------------------- -->
            <div class="row" style="display: block;">

              <div class="col-md-12 col-sm-12">
                <div class="x_panel">

               
                  <?php
                    if (count($_POST) == 6 or isset($_POST['sub_com_old']))
                    {
                        if (count($_POST) == 6)
                        {
                          $postarray = $_POST;
                          $i = 0;
                          foreach ($postarray as $i2)
                          {
                            if ($i == 5)
                            {
                              $component = $i2;
                              $i = $i + 1;
                            }
                            else 
                            {
                              $i = $i + 1;
                            }
                          }
                          $component_comp = $_POST['component'];
                          $component_disp = $_POST['display'];
                        }
                        else
                        {
                          $component_comp = $_POST['component'];
                          $component_disp = $_POST['display'];
                          $component = $_POST['sub_com_old'];
                        }




                          $dao = new CreDAO();
                          $component_new = str_replace("_"," ",$component);

                          $cre_list = $dao->retrieve($component);

                          if ($cre_list !=null)
                          {
                            if(empty($component)==FALSE)
                            {
                              echo '
                                <div class="x_title">
                                  <h2>'.$component_new.'</h2>
                                  <div class="clearfix"></div>
                                </div>
        
                                <div class="table-responsive">
                                <form action="edit_subcre.php" method="POST">
                                  <table class="table table-striped jambo_table bulk_action" style="font-size: 15px;">
                                    
                                    <thead>
                                      <tr style="background-color: white; color: black;" >
                                        <th>
                                        </th>
                                        <th>Criteria</th>
                                        <th>Status</th>
                                        <th>Reject reason</th>
                                        
                                      </tr>
                                    </thead>
        
                                    <tbody>';
        
                                foreach ($cre_list as $cre)
                                {
                                    $sub_component = $cre->getsub_component();
                                    $reason = $cre->getreason();
                                    $status2 = $cre->getstatus2();
                                    $sub_component_new = str_replace("_"," ",$sub_component);
                                    if($component != "WARD_CLASS" && $component != "GENDER")
                                    {
                                      echo ("<tr>");
                                          if($sub_component != "ORAL")
                                          {
                                            if(isset($_POST['selectall']))
                                            {
                                              echo ("<td class='a-center '><input type='checkbox' class='flat' name='table_records[]' id=".$sub_component." value=".$sub_component." checked></td>");
                                            }
                                            elseif(isset($_POST['unselectall']))
                                            {
                                              echo ("<td class='a-center '><input type='checkbox' class='flat' name='table_records[]' id=".$sub_component." value=".$sub_component."></td>");
                                            }
                                            else
                                            {
                                              echo ("<td class='a-center '><input type='checkbox' class='flat' name='table_records[]' id=".$sub_component." value=".$sub_component."></td>");
                                            }
                                          }
                                          else
                                          {
                                            echo "<td></td>";
                                          }
                                    }
                                    else
                                    {
                                      echo "<td></td>";
                                    }
                                        
                                        echo("<td>".$sub_component_new."</td>");
                                        echo("<td>".$status2."</td>");
                                        echo("<td>".$reason."</td>");
                                    echo("</tr>");
                                }
        
                                echo '
        
                                      </tbody>
                                    </table>
                                    <div style = "vertical-align: baseline;">
                                        <table>
                                        <tr>';
        
                                if($component != "WARD_CLASS" && $component != "GENDER")
                                {
                                  echo "<input type='hidden' id='component_comp' name='component_comp' value=" . $component_comp . ">";
                                  echo "<input type='hidden' id='component_disp' name='component_disp' value=" . $component_disp . ">";
                                  echo "<input type='hidden' id='component' name='component' value=" . $component . ">";
                                  echo "<button type='submit' formaction='deletecre_confirmation2.php' class='btn btn-success' style = 'background-color: red; border-color: red;'>Delete Criteria</button>";
                                  echo "<button type='submit' class='btn btn-success'>Edit Criteria</button>";
                                }
                                  
                                echo "</form>";
        
                                if($component != "WARD_CLASS" && $component != "GENDER")
                                {
                                echo "<form action='add_subcre.php' method='POST'>
                                        <input type='hidden' id='component_comp' name='component_comp' value=" . $component_comp . ">
                                        <input type='hidden' id='component_disp' name='component_disp' value=" . $component_disp . ">
                                        <input type='hidden' id='component' name='component' value=" . $component . ">
                                        <button type='submit' class='btn btn-success'>Add Criteria</button>
                                        </form>";
                                }
                                
                                echo "<form action='' method='POST'>";
        
                                if($component != "WARD_CLASS" && $component != "GENDER")
                                {
                                  echo "<input type='hidden' id='sub_com_old' name='sub_com_old' value=" . $component . ">";
                                  echo '<input type="hidden" id="component" name="component" value=' . $component_comp . '>
                                        <input type="hidden" id="display" name="display" value=' . $component_disp . '>
                                  ';
                                  if(isset($_POST['selectall']))
                                  {
                                    echo "<button type='submit' class='btn btn-success' name='unselectall'>UnSelect all</button>";
                                  }
                                  else
                                  {
                                    echo "<button type='submit' class='btn btn-success' name='selectall'>Select all</button>";
                                  }
                                }
        
                                $website = "see_cre.php";
                                echo '
                                </form>
                                <form action='.$website.' method="GET">
                                  <input type="hidden" id="component" name="component" value=' . $component_comp . '>
                                  <input type="hidden" id="display" name="display" value=' . $component_disp . '>
                                  <button onclick="document.location='.$website.'" class="btn btn-success">Back</button>
                                </form>
                                </tr>
                              </table>
                              </div>
                              </div>
                              </div>
                              </div>
        
                                </div>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>';
                            }
                            else
                            {
                              $website = "ch_comp.php";
                              echo '<form action='.$website.'>
                              <div style="font-size: 25px; color: red;">Please go back to Component Page.</style><br><br></div>
                              <button type="submit" class="btn btn-success">Back</button>
                              </form>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>';
        
                            }

                          }
                          
                          // when new sub-component is created
                          else
                          {
                            if(empty($component)==FALSE)
                            {
                              echo '
                                <div class="x_title">
                                  <h2>'.$component_new.'</h2>
                                  <div class="clearfix"></div>
                                </div>
        
                                <div class="table-responsive">
                                  <table class="table table-striped jambo_table bulk_action" style="font-size: 15px;">
                                    
                                    <thead>
                                      <tr style="background-color: white; color: black;" >
                                        <th>
                                        </th>
                                        <th>Criteria</th>
                                        <th>Status</th>
                                        <th>Reject reason</th>
                                      </tr>
                                    </thead>
        
                                    <tbody>';
        
                                echo '
        
                                      </tbody>
                                    </table>
                                    <div style = "vertical-align: baseline;">
                                        <table>
                                        <tr>';
        
                                if($component != "WARD_CLASS" && $component != "GENDER")
                                {
                                  echo "<form action='add_subcre2.php' method='POST'>
                                          <input type='hidden' id='component_comp' name='component_comp' value=" . $component_comp . ">
                                          <input type='hidden' id='component_disp' name='component_disp' value=" . $component_disp . ">
                                          <input type='hidden' id='component' name='component' value=" . $component . ">
                                          <button type='submit' class='btn btn-success'>Add Criteria</button>
                                        </form>";
                                }
                                
                                
                                $website = "ch_comp.php";
                                echo '
                                </form>
                                <form action='.$website.'>
                                  <button onclick="document.location='.$website.'" class="btn btn-success">Back</button>
                                </form>
                                </tr>
                              </table>
                              </div>
                              </div>
                              </div>
                              </div>
        
                                </div>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>';
                            }
                            else
                            {
                              $website = "ch_comp.php";
                              echo '<form action='.$website.'>
                              <div style="font-size: 25px; color: red;">Please go back to Component Page.</style><br><br></div>
                              <button type="submit" class="btn btn-success">Back</button>
                              </form>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>';
        
                            }
                          }
                    }
                    else if (isset($_POST['component']) && isset($_POST['display']))
                    { 
                      $component_comp = $_POST['component'];
                      $component_disp = $_POST['display'];
                      echo '<input type="hidden" id="component" name="component" value=' . $component_comp . '>
                        <input type="hidden" id="display" name="display" value=' . $component_disp . '>';
                        
                        $website = "see_cre.php";
                        echo '<form action='.$website.' method="GET">
                        <div style="font-size: 25px; color: red;">For Sub Component, please choose only one criteria to edit.</style><br><br></div>
                        <button type="submit" class="btn btn-success">Back</button>
                        </form>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>';
                    }
                    else
                    {
                      $website = "ch_comp.php";
                      echo '<form action='.$website.'>
                      <div style="font-size: 25px; color: red;">Please go back to Component Page.</style><br><br></div>
                      <button type="submit" class="btn btn-success">Back</button>
                      </form>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>';
                    }

                        

?>
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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>



</html>
