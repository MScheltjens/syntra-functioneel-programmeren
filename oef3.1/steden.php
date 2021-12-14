<?php
require_once 'lib/html_components.php';

//print header
PrintHead("De leukste plekken in Europa");
PrintBody();
PrintJumbo("");
?>

<div class="container">
    <div class="row">

        <?php
        //we need data from the database, so...
        require_once "database.php";

        $rows = GetData( "select * from image" );

        //loop over de afbeeldingen
        foreach ( $rows as $row )
        {
            //de kolom met de titel en de afbeelding erin
            print '<div class="col-sm-4">';
            print '<h3>' . $row['img_title'] . '</h3>';
            print '<p>' .  $row['img_width'] . " x " . $row['img_height'] . ' pixels</p>';
            print '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>';
            $link_image = "../images/" . $row['img_filename'];
            print '<img class="img-fluid" src="' . $link_image . '">';

            print '</div>' ;
        }
        ?>

    </div>
</div>

</body>
</html>