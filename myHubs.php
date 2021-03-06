<?php
include 'assets/my_user.php';
include "partials/head.php";
?>
<!-- SUCCESS PAGE HEADER -->
	<header class="register-header">
		<div class="top-nav">
			<div class="logo-nav">
				<!-- LOGO IMAGE -->
				<img src="img/logo.png" class="logo" alt="logo" class="img-fluid">
			</div>
			<div class="logout-nav">
				<!-- SIGN IN BUTTON -->
				<a href="actions/logout_process.php" class="signin-btn">LOGOUT</a>
			</div>
		</div>
	</header>
<!-- MAIN SECTION -->
	<main>
	<!-- REGISTER SECTION -->
		<section class="container">
			<div class="row">
			<!-- SUCCESS PAGE -->
				<article class="col-md-6 panel">
					<div class="form-register">
					<!-- SUCCESS HEADING -->
						<h1>SUCESS!</h1>
						<?php
							if(isset($_GET["hub_created"])) {
								if($_GET["hub_created"] == true) {
									echo "<p>Success - Hub created!</p>";
								}
							}
						?>
						<p>Click on any of your Hubs to explore it; you can invite family members and add content!</p>

				    <!-- SUBMIT BUTTON -->
		        		<!-- <input type="submit" name="view-hub" class="register-btn login-btn" value="Create Hub"> -->
						<!-- <a href="createHub.php" class="signin-btn" title="Create New Hub">Create New Hub</a> -->

					<!-- HELP LINKS -->
						<h3> If you have any questions try these links:</h3>
						<ul class="link-ul">
							<li><a href="">Help</a></li>
							<li><a href="">FAQ</a></li>
							<li><a href="">About Us</a></li>
						</ul>
						<a href="createHub.php" class="signin-btn" title="Create New Hub">Create New Hub</a>
					</div>
				</article>
			<!-- REGISTER IMAGE -->
				<article class="col-md-6 hubs">
					<div class="text-center row">
						<?php
							$query = "SELECT hubs.id, hubs.strName, hubs.strDescription
										FROM hubs
										LEFT JOIN usersInHubs ON hubs.id = usersInHubs.nHubId
										LEFT JOIN users ON usersInHubs.nUserId = users.id
										WHERE users.id = ".$arrWhoAmI['id'];
							$myHubs = getRecords($query);
							// var_dump($myHubs);
							// die();

							$count=0;
							if($myHubs) {
								foreach ($myHubs as $key => $value) {
									if($count % 2) {
										echo "<br>";
									};
									echo "<div class=\"hubDiv col-md-6\">";
									echo 	"<p>Hub Name: ".$myHubs[$key]['strName']."</p>";
									echo 	"<p>Hub Description: ".$myHubs[$key]['strDescription']."</p>";
									echo "<button class='btn' onclick= hubPage(".$myHubs[$key]['id'].",'".$myHubs[$key]['strName']."');>View Hub</button>";
									echo "</div>";
									$count++;
								}
							}
							else {
								echo "<p>You do not have any Hubs yet! Create a new hub now...</p>";
							}
						?>
					<div>
				</article>
			</div>
		</section>


	</main>
<!-- END OF MAIN SECTION -->
	<?php include "partials/footer.php" ?>
<!-- EXTERNAL FOOTER -->
