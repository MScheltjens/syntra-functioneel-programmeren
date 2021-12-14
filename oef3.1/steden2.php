<?php
require_once 'lib/html_components.php';
require_once "lib/database.php";

//print header
PrintHead("De leukste plekken in europa");
PrintBody();
PrintJumbo("De leukste plekken in Europa", "Maak een keuze uit volgende steden voor meer info");
?>

<div class="container">
    <div class="row">

        <?php
        //we need data from the database, so...

        $rows = GetData( "select * from image" );

        //loop over de afbeeldingen
        foreach ( $rows as $row )
        {
            //de kolom met de titel en de afbeelding erin
            print '<div class="col-sm-4">';
                print '<h3>' . $row['img_title'] . '</h3>';
                print '<p>' .  $row['img_width'] . " x " . $row['img_height'] . ' pixels</p>';
                print '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>';

                //image
                $link_image = "../images/" . $row['img_filename'];
                print '<img class="img-fluid" src="' . $link_image . '"></br>';

                //hyperlink
                print '<a href=stad_form.php?img_id=' . $row['img_id'] . '>Meer info</a>';

            print '</div>' ;
        }
        ?>

    </div>
</div>
<?php
    EndOfPage();
?>