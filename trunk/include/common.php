<?php
$userid = $_SESSION['userid'];

function hasPerm($i){
	if(@$_SESSION['perm'][$i])
		return true;
}

function rowClass($i){
	if (($i%2) != 0) return "rowOdd";
	else return "rowEven";
}

function getPlayerName($id)
{
	if (is_numeric($id)) {
		$q = mysql_query("SELECT name FROM players WHERE id = ".$id);
		while ($r = mysql_fetch_array($q, MYSQL_ASSOC)) $name = $r['name'];
		if($name)
			return $name;
		else
			return "CTF League System";
	}
}

function getUserId($username) {
        $sql = "SELECT id FROM players WHERE `name` = '".$username."' LIMIT 1";
        $result = mysql_query($sql);
        if(mysql_num_rows($result)) {
            $row = mysql_fetch_row($result);
            return $row[0];
        } else {
            return false;
        }
}

function hasMail() {
	$sql = "SELECT * FROM messages WHERE `to`='$userid' AND `read`='0' AND `to_deleted`='0'";
	$result = mysql_query($sql);
	$result = mysql_fetch_array($result);
	if($result)
		return true;
	else
		return false;
}
?>