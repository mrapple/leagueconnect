<h2>Teams</h2>
<?php

switch(@$_POST['action'])
{
    case 'add':
        // Add a new team
        $team = $_POST['newteam'];

        if(MySQL::TeamExists($team))
        {
            echo 'Team name unavailable.';
        }
        elseif(MySQL::IsTeamMember(CurrentPlayer::$ID) || MySQL::IsTeamLeader(CurrentPlayer::$ID))
        {
            echo 'You must leave your current team before creating a new one.';
        }
        else
        {
            MySQL::AddTeam($team, CurrentPlayer::$ID);
        }
        break;

    case 'edit':
        break;
    
    case 'join':
        $team = $_GET['team'];
        if(MySQL::IsTeamMember(CurrentPlayer::$ID))
        {
            echo 'You want to abandon this team';
        }
        elseif(MySQL::IsTeamLeader(CurrentPlayer::$ID,$team))
        {
            echo 'You can not leave your team because you are the leader';
        }
        
        break;

    case 'delete':
        break;

    case 'abandon':
        break;

    default:
        break;
}
?>

<table border="0" cellspacing="2" cellpadding="3">
<tr>
  <th>Name</th>
  <th>Leader</th>
  <th>#</th>
  <th>Score</th>
  <th>Join</th>
  <th>Activity</th>
</tr>
<?php

$teams = MySQL::GetTeamInfoList();
$i = 0;

foreach($teams as $team)
{
    $players = MySQL::GetPlayersByTeam($team->ID);
    $leader = MySQL::GetPlayerInfo($team->Leader);

?>

<tr class="<?php echo rowClass($i); ?>">
    <td><?php echo $team->Name; ?></td>
    <td><?php echo $leader->Name; ?></td>
    <td><?php echo count($players); ?></td>
    <td><?php echo $team->Rank; ?></td>
<td><?php echo MySQL::GenerateTeamButton($team->ID, $team->Leader); ?></td>
    <td>&nbsp;</td>
</tr>

<?php

    $i++;
}

?>
</table>
<br>
<h2>Add a Team</h2>

<?php

if(MySQL::IsTeamMember(CurrentPlayer::$ID))
{
    echo 'You must leave your current team before creating a new one.';
}
else
{
?>

    <form method="POST">
    <input type="hidden" name="action" value="add">
    Name: <input type="text" name="newteam">
    <input type="submit" value="Create">
    </form>

<?php
}

?>