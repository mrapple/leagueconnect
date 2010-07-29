<?php
session_start(); 
header("Cache-control: private");
include("include/mysql.php");
if(!$_GET['token'] || !$_GET['username']){
die("Incorrect information submitted.");
} else {
	
	// TODO: Add some error handling/reporting

function validate_token($token, $username, $groups = array(), $checkIP = true)
{
  if (isset($token, $username) && strlen($token) > 0 && strlen($username) > 0)
  {
    $listserver = Array();

    // First off, start with the base URL
    $listserver['url'] = 'http://my.bzflag.org/db/';
    // Add on the action and the username
    $listserver['url'] .= '?action=CHECKTOKENS&checktokens='.urlencode($username);
    // Make sure we match the IP address of the user
    if ($checkIP) $listserver['url'] .= '@'.$_SERVER['REMOTE_ADDR'];
    // Add the token
    $listserver['url'] .= '%3D'.$token;
    // If use have groups to check, add those now
    if (is_array($groups) && sizeof($groups) > 0)
      $listserver['url'] .= '&groups='.implode("%0D%0A", $groups);

    // Run the web query and trim the result
    // An alternative to this method would be to use cURL
    $listserver['reply'] = trim(file_get_contents($listserver['url']));

    // Fix up the line endings just in case
    $listserver['reply'] = str_replace("\r\n", "\n", $listserver['reply']);
    $listserver['reply'] = str_replace("\r", "\n", $listserver['reply']);
    $listserver['reply'] = explode("\n", $listserver['reply']);

    // Grab the groups they are in, and their BZID
    foreach ($listserver['reply'] as $line)
    {
      if (substr($line, 0, strlen('TOKGOOD: ')) == 'TOKGOOD: ')
      {
        if (strpos($line, ':', strlen('TOKGOOD: ')) == FALSE) continue;
        $listserver['groups'] = explode(':', substr($line, strpos($line, ':', strlen('TOKGOOD: '))+1 ));
      }
      else if (substr($line, 0, strlen('BZID: ')) == 'BZID: ')
      {
        list($listserver['bzid'],$listserver['username']) = explode(' ', substr($line, strlen('BZID: ')), 2);
      }
    }

    if (isset($listserver['bzid']) && is_numeric($listserver['bzid']))
    {
      $return['username'] = $listserver['username'];
      $return['bzid'] = $listserver['bzid'];

      if (isset($listserver['groups']) && sizeof($listserver['groups']) > 0)
      {
        $return['groups'] = $listserver['groups'];
      }
      else
      {
        $return['groups'] = Array();
      }

      return $return;
    }
  } 
} 

$datafile="global/groups.txt"; //name of the data file
$banned=file_get_contents("bans.txt"); //name of the data file
    $groups = file($datafile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $fuser = $_GET['username'];
    $ftoken = $_GET['token']; 
    $fusercap = strtoupper($fuser);
    $bannedcap = strtoupper($banned);
$result = validate_token($_GET['token'], $_GET['username'], $groups);
	if(strstr($bannedcap,$fusercap)) { 
		exit("You have been banned from this server by an administrator.");
	} else {
	$users = mysql_query("SELECT * FROM users WHERE `name`='".$result['username']."'");
	echo mysql_error();
	$userar = mysql_fetch_array($users);
		if(count($userar['name']) > 0) { 
		$ts = time();
		$_SESSION['callsign'] = $fuser;
		$_SESSION['pass'] = $ftoken;
		$_SESSION['id'] = $userar['id'];
	mysql_query("UPDATE users SET `last login`='$ts' WHERE `name`='$fuser'");
	header('Location: index.php');
	} else {
	header('Location: index.php?p=error&error=4');
}
}
}
?>