<?php
/**
* @developer-Lead: David Hernandez
* @senior-developer: J. Sanchez @mozpit
* @team: Software Engineering Team 4 @ Lehman
* @members: Eddy Vittini, Jhon Sanchez, Vanessa Ortiz, Melida Grullon, Madelin Arias Bueno, Rafael Velazquez, Moumouni Sawadogo, Jordan Falcon, David Hernandez
* @description: Leo's Lasagna Project by Team 4 Fall 2018
* @software-license: MIT
*/

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
$sessions = "{$base_dir}services{$ds}sessions.php";
$cookies = "{$base_dir}services{$ds}processCookie.php";

require($sessions);
//require($cookies);

$header = file_get_contents('header.php');
$footer = file_get_contents('footer.php');
$modals = file_get_contents('modals.php');

	/* begin header */
	echo $header;
	/* end header */

?>
<!-- begin body -->
<div class="container" style="max-width: 550px!important;">
<center><a href="/" target="_self"><img class="login-logo" alt="logo" src="../images/Logo.png" width="200" height="200"/></a></center>
		<form id="checkRegistration" action="../../services/processRegistration.php" method="POST">
				<div class="form-group">
			    <label for="formGroupExampleInput">Name</label>
			    <input type="text" class="form-control" name="userName" placeholder="Enter name" required>
  			</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" name="userEmail" placeholder="Enter email" required>
				</div>
<?php
			if($_SESSION['user_type'] == "ADMIN"){
?>
								<div class="form-group">
								    <label for="exampleFormControlSelect2">Client Type</label>
								    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required>
											<option>CHOOSE ONE</option>
								      <option>ADMINISTRATOR</option>
								      <option>AIRLINE</option>
								      <option>HOTEL</option>
								    </select>
				  			</div>
<?php 	}	  ?>
				<br/>
				<center><button type="submit" class="btn btn-lg btn-primary btn-block"
												style="color: #fff; background-color: #f96566!important; border-color: #f96566!important;">
												Register
								</button>
				</center>
		</form>
</div> <!-- /container -->
<?php echo $_SESSION['err_msg']; ?>
<!-- end body -->

<?php echo $modals; ?>
<!-- begin footer -->
<?php echo $footer; ?>
<!-- end footer -->
