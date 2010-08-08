<?php
session_start();
header("Cache-control: private");
include ("include/database.php");
include ("include/current-user.php");
function validate_token($token, $username, $groups = array(), $checkIP = true) {
    if (isset($token, $username) && strlen($token) > 0 && strlen($username) > 0) {
        $listserver = Array();
        $listserver['url'] = 'http://my.bzflag.org/db/';
        $listserver['url'].= '?action=CHECKTOKENS&checktokens=' . urlencode($username);
        if ($checkIP) $listserver['url'].= '@' . $_SERVER['REMOTE_ADDR'];
        $listserver['url'].= '%3D' . $token;
        if (is_array($groups) && sizeof($groups) > 0) $listserver['url'].= '&groups=' . implode("%0D%0A", $groups);
        $listserver['reply'] = trim(file_get_contents($listserver['url']));
        $listserver['reply'] = str_replace("\r\n", "\n", $listserver['reply']);
        $listserver['reply'] = str_replace("\r", "\n", $listserver['reply']);
        $listserver['reply'] = explode("\n", $listserver['reply']);
        foreach($listserver['reply'] as $line) {
            if (substr($line, 0, strlen('TOKGOOD: ')) == 'TOKGOOD: ') {
                if (strpos($line, ':', strlen('TOKGOOD: ')) == FALSE) continue;
                $listserver['groups'] = explode(':', substr($line, strpos($line, ':', strlen('TOKGOOD: ')) + 1));
            } else if (substr($line, 0, strlen('BZID: ')) == 'BZID: ') {
                list($listserver['bzid'], $listserver['username']) = explode(' ', substr($line, strlen('BZID: ')), 2);
            }
        }
        if (isset($listserver['bzid']) && is_numeric($listserver['bzid'])) {
            $return['username'] = $listserver['username'];
            $return['bzid'] = $listserver['bzid'];
            if (isset($listserver['groups']) && sizeof($listserver['groups']) > 0) {
                $return['groups'] = $listserver['groups'];
            } else {
                $return['groups'] = Array();
            }
            return $return;
        }
    }
}
if (!$_GET['token'] || !$_GET['username'])
{
    die();
}
else
{
    $fuser = $_GET['username'];
    $ftoken = $_GET['token'];
    
    $groups = Database::GetGroupNames();
    $result = validate_token($_GET['token'], $_GET['username'], $groups);

    if (count($result['groups']) > 0)
    {
    
        $_SESSION['callsign'] = $fuser;
        $_SESSION['pass'] = $ftoken;
        $_SESSION['bzid'] = $result['bzid'];
        $_SESSION['groups'] = $result['groups'];
        $bzid = $result['bzid'];
        
        Database::CheckGroups($result['groups']);
        
        // Do we have this user?
        if(Database::PlayerExists($bzid))
        {
            // Update login data
            Database::PlayerLogin($fuser, $bzid);
        }
        else
        {
            // Add player to database
            Database::AddPlayer($fuser, $bzid);
        }

        // Set Player ID
        $_SESSION['player'] = Database::GetPlayerIDByBZID($bzid);
        //header("Location: index.php");
    }
    else
    {
        header("Location: index.php?p=error&error=4");
    }
}
?>