<?php

function Validate() {
    Sanitize();

    $table = $_POST['table'];
    $pkey = $_POST['pkey'];

    $sql = "show full columns from $table";
    $rows = GetData($sql);

    $field_values = [];
    foreach ($rows as $row) {
        $fieldname = $row['Field'];
        $fieldtype= $row['Type'];
        $fieldlength = 0;

        //tekstvelden
        if(strpos($fieldtype, "varchar") === false) {
            $begin_length = strpos($fieldtype, "(");
            $end_length = strpos($fieldtype, ")");
            $fieldlength = substr($fieldtype, $begin_length + 1,$end_length - $begin_length - 1);

            if(strlen($_POST[$fieldname]) > $fieldlength) {
                print "Probleem met veld $fieldname!! Mag maar $fieldlength tekens lang zijn";
                die();
            }
        }
        // numerieke velden

    }
}


function Sanitize(){
    foreach ( $_POST as $field => $value ) {

        // verwijder white-space
        $_POST[$field] = htmlentities(trim($value), ENT_QUOTES);
    }
}

