
<?php
// START SESSION (CONTROL)
session_start();

// print json_encode($_POST);

require_once "database.php";

// CHECK CSRF TOKEN (CONTROL)
if ( ! hash_equals( $_POST['csrf'], $_SESSION['latest_csrf'] ) )
{
    header( "Location: no_access.php");
    die();
}
else
{
    print "CSRF is OK!!!!<br>";
}

// RETRIEVE TABLE DATA AND UPDATE WITH USER INPUT
/*
$table_name=$_POST["table"];

$sql = "SHOW FULL COLUMNS FROM $table_name";
$rows = GetData($sql);

$fields_values = [];
foreach ( $rows as $row )
{
    // print $row["Field"] . "<br>";

    if ( $row["Key"] == "PRI" ) continue;

    if ( key_exists( $row["Field"], $_POST ))
    {
        $fields_values[] = $row["Field"] . "=" . "'" . htmlentities( trim($_POST[$row["Field"]]), ENT_QUOTES ) . "'"  ;
    }
}

print implode(", " , $fields_values) . "<br>";

$sql = "UPDATE $table_name SET " . implode(", " , $fields_values) . "WHERE img_id=" . $_POST["img_id"];

print $sql . "<br>";

$result = ExecSQL($sql);

//var_dump($result); print "<br>";
*/



$sql = "UPDATE image SET " .
    " img_filename=" . "'" . $_POST["img_filename"] . "'," .
    " img_title=" . "'" . $_POST["img_title"] . "'," .
    " img_width=" . "'" . $_POST["img_width"] . "'," .
    " img_height=" . "'" . $_POST["img_height"] . "'" .
    " WHERE img_id=" . $_POST["img_id"];

ExecSQL($sql);

header("Location: ../steden2.php");

