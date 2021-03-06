<?php
require_once "database.php";

/*
function MakeSelectLand()
{
    $sql = "select * from land";
    $rows = GetData($sql);

    $myselect = "";
    $myselect .= "<select id=Img_lan_id name=Img_lan_id>";
    $myselect .= "<option>Select uw land </option>";

    foreach ( $rows as $row )
    {
        $myselect .= "<option value='" . $row['lan_id'] . "'>" . $row['lan_land'] . "</option>";
    }

    $myselect .= "</select>";

    print $myselect;
}
*/

function MakeSelect( $fieldname, $sql, $list_fields = [], $optional = true )
{
    $rows = GetData($sql);
    $myselect = "";
    $myselect .= "<select id=$fieldname name=$fieldname>";

    if ( $optional ) $myselect .= "<option></option>";

    foreach ( $rows as $row )
    {
        $myselect .= "<option value='" . $row[$list_fields[0]] . "'>" . $row[$list_fields[1]] . "</option>";
    }

    $myselect .= "</select>";

    print $myselect;
}