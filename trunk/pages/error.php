			<?php if($_SESSION['callsign']){ ?>
			<meta HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">
			<?php
			} else {
			if($_GET['error'] == "1") {  ?>
				<h2>Access Denied</h2>
				<p>Please <a href="index.php">login</a> before attempting to access this page</p>
			<?php } else { if($_GET['error'] == "2") {  ?>
				<h2>Logout Successful</h2>
				<p>You have successfully logged out. Would you like to <a href="./">login</a> again?</p>
			<?php } else { if($_GET['error'] == "3") {  ?>
				<h2>No Permission</h2>
				<p>Your account has been temporarily disabled by an administrator. Please contact <?php echo $sitedata['email'] ?> for more information</p>
			<?php } else { if($_GET['error'] == "4") {  ?>
				<h2>No Permission</h2>
				<p>Your username and password was correct, but you do not have any permissions on this server.</p>
				<p>If you believe this message is in error, please contact <?php echo $sitedata['email'] ?> for more information</p>
			<?php } else { if(!$_GET['error']) {  ?>
				<h2>Please login</h2>
				<p>Please <a href="index.php">login</a></p>
			<?php } else { if($_GET['mode'] == "") {  ?>
				<h2>Unknown Error</h2>
				<p>Please contact <?php echo $sitedata['email'] ?> with error code: <?php echo $_GET['error'].rand(100000,999999); ?> </p>
			<?php 
			}
			}
			}
			}
			}
			}
			}
			?>