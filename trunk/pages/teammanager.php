<?php
if(!CurrentPlayer::HasPerm(Permissions::ManageTeams)){
	require_once("include/noperm.php");
	require_once("include/footer.php");
	die();
}		
?>		<h2>Team Manager</h2>
		<p>Under Development</p>
