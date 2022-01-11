<?php

//create dynamic header
function PrintHead($pageTitle) {
    $string = file_get_contents("./templates/head.html");
    print str_replace('@title@', $pageTitle, $string);
}

//create dynamic jumbotron
function PrintJumbo($jumboTitle, $jumboSubtitle) {
    $string = file_get_contents("./templates/jumbo.html");
    $placeholders = ["@@title@@", "@@subtitle@@"];
    $newText = [$jumboTitle,$jumboSubtitle];
    $newString = str_replace($placeholders, $newText, $string);
    print $newString;
}

// print body tag
function PrintBody() {
    print '<body>';
}

//print end of page
function EndOfPage() {
    print "</body>";
    print "</html>";
}