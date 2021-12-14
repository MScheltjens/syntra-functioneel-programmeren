<?php
require_once 'html_components.php';

//print header
PrintHead("Detail Stad");
PrintBody();
PrintJumbo("Detail Stad", " ");
?>

<div class="container">
    <div class="row">
    <?php
        //get info from db
        require_once 'database.php';

        //validate GET argument
        if (! is_numeric($_GET["img_id"])) {
            die("Wrong Parameter");
        }

        $rows = GetData("select * from image where img_id=" . $_GET["img_id"]);
        $row = $rows[0];

        //print de kolom
        print '<div class="col-sm-12">';

            //title, filename, pixels
            print '<h3>' . $row['img_title'] . '</h3>';
            print '<p>filename: ' .  $row['img_filename'] . '</p>';
            print '<p>' .  $row['img_width'] . " x " . $row['img_height'] . ' pixels</p>';

            //afbeelding
            $link_image = "../images/" . $row['img_filename'];
            print '<img class="img-fluid" style="width: 75%;" src="' . $link_image . '"></br>';

            //hyperlink

            print '<p><a href=steden2.php>Terug naar overzicht</a></p>';


        print '</div>';
    ?>
    </div>
</div>

<?php
    EndOfPage();
?>