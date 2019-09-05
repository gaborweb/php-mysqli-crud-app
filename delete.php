<?php
    include "db.php";

    if(isset($_GET["id"]) && is_numeric($_GET["id"])){
        $id = $_GET["id"];
        $delete = "DELETE FROM registeredpeople WHERE id='$id';";

        if(mysqli_query($conn,$delete)){
            ?>
                <script>alert("Record was deleted successfully");</script>
                <script>window.location.href="index.php"</script>
            <?php
        }
    }
?>