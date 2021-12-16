<?php
require_once 'lib/html_components.php';
require_once 'lib/security.php';
require_once 'lib/database.php';


$sql = "select * from image where img_id = " . $_GET["img_id"];
$rows = GetData( $sql );
$row = $rows[0];

//print header
PrintHead("Bewerk afbeelding");
PrintBody();
PrintJumbo("Bewerk afbeelding", "Voer hier de nieuwe gegevens in ");

?>

<div class="container">
    <form action="lib/save_form.php" method="POST">

        <!-- meta info -->
        <div class="form-group row">
            <input type="hidden" name="table" value="images">
            <input type="hidden" name="csrf" value="<?= GenerateCSRF("stad_form.php") ?>">
            <!-- end meta info -->

            <label for="img_id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="img_id" name="img_id" value="<?= $row["img_id"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="img_title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="img_title" name="img_title" value="<?= $row["img_title"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="img_filename" class="col-sm-2 col-form-label">Filename</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="img_filename" name="img_filename" value="<?= $row["img_filename"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="img_width" class="col-sm-2 col-form-label">Width</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="img_width" name="img_width" value="<?= $row["img_width"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="img_width" class="col-sm-2 col-form-label">Height</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="img_height" name="img_height" value="<?= $row["img_height"]; ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="btnVerzenden" name="btnVerzenden">Save</button>
    </form>
   <?php
    $link_image = "../images/" . $row['img_filename'];
    print '<img class="img-fluid" style="width: 75%;" src="' . $link_image . '"></br>';
    ?>
</div>

<?php
    EndOfPage();
?>