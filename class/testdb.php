<?php
ini_set('display_errors', 1);
error_reporting(~0);
require_once( 'Database.php' );
require_once( 'User.php' );
$database = new Database();


date_default_timezone_set('EST');
$datet = date("F j, Y", strtotime("1992-10-15"));
echo $datet; 
$today = date("Y-m-d: H:i:s", strtotime("1992-10-15")); 
echo $today;
$date_parse = date_parse($today);
/*
echo $date_parse['year'];
$date = "2014-10-15";
*/
$update = array(
    'DateOpened' => $datet
);
//Add the WHERE clauses
$where_clause = array(
    'BusinessID' => 3
);
$updated = $database->update( 'Businesses', $update, $where_clause, 1 );
if( $updated )
{
    echo '<p>Successfully updated '.$where_clause['UserID']. ' to '. $update['Email'].'</p>';
}




$user = new User();

/* print $row.FirstName; */

$login = $user->login('bob','pass123');
/* echo 'uid' . $login; */

$_POST['name'] = 'This database class is "super awesome" & whatnots';
if( isset( $_POST ) )
{
    foreach( $_POST as $key => $value )
    {
        $_POST[$key] = $database->filter( $value );
    }
}
echo '<pre>';
print_r($_POST);
echo '</pre>';


$array = array(
    'name' => array( 'first' => '"Super awesome"' ), 
    'email' => '%&&<stuff'
);
$array = $database->filter( $array );
echo '<pre>';
print_r($array);
echo '</pre>';

$query = "SELECT * FROM Journals WHERE BusinessID = 3";
$results = $database->get_results( $query );
foreach( $results as $row )
{
    echo $row['NetSales'] .'<br />';
}

$query = "SELECT * FROM Journals WHERE BusinessID = 3";
if( $database->num_rows( $query ) > 0 )
{
    $row = $database->get_row( $query );
    echo $row[0] . 'yee';
}
else
{
    echo 'No results found for a group name like &quot;production&quot;';
}

$names = array(
    'Username' => 'newto',
    'Password' => md5('newtoopass') //Random thing to insert
);
//if username already exists dont add.
/* $add_query = $database->insert( 'Users', $names ); */
/*
if( $add_query )
{
    echo '<p>Successfully inserted &quot;'. $names['Username']. '&quot; into the database.</p>';
}
*/

$last = $database->lastid();

$update = array(
    'Email' => 'joe@gm.com', 
    'FirstName' => 'ha'
);
//Add the WHERE clauses
$where_clause = array(
    'UserID' => 4
);
$updated = $database->update( 'Users', $update, $where_clause, 1 );
if( $updated )
{
    echo '<p>Successfully updated '.$where_clause['UserID']. ' to '. $update['Email'].'</p>';
}

$delete = array(
    'UserID' => 6,
);
$deleted = $database->delete( 'Users', $delete, 1 );
if( $deleted )
{
    echo '<p>Successfully deleted '.$delete['group_name'] .' from the database.</p>';
}

$check_column = '*';
$check_for = array( 'Username' => 'bill' );
$exists = $database->exists( 'Users', $check_column,  $check_for );
if( $exists )
{
    echo '<p>bill DOES exist!</p>';
}else{
	echo '<p>bill DOES NOT exist!</p>';
}
?>
