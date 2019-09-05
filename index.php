<?php
    include "db.php";

    if(isset($_POST["btninsert"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $country = $_POST["country"];
        $hobby = implode(",", $_POST["hobby"]);

        $insert = "INSERT INTO registeredpeople (name, email, gender, address, hobby, country)
            VALUES('$name', '$email', '$gender', '$address', '$hobby', '$country');   
        ";
    
        if(mysqli_query($conn,$insert)){
            ?>
                <script>alert("Record was inserted successfully!");</script>
            <?php
        }else{
            ?>
                <script>alert("Error by inserting data!");</script>
            <?php
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CRUD projekt</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>

        <script>
            if(window.history.replaceState){
                window.history.replaceState(null,null,window.location.href);
            }
        </script>

        <center>
            <h2>Registration form</h2>

            <?php
                include "form.html";
            ?>

            <table class="list">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Hobby</th>
                    <th>Country</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php
                    $select = "SELECT * FROM registeredpeople;";
                    $result = mysqli_query($conn, $select);
                    
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td><?php echo $row["name"];?></td>
                                    <td><?php echo $row["email"];?></td>
                                    <td><?php echo $row["gender"];?></td>
                                    <td><?php echo $row["address"];?></td>
                                    <td><?php echo $row["hobby"];?></td>
                                    <td><?php echo $row["country"];?></td>
                                    <td><a href="update.php?id=<?php echo $row['id'];?>">Update</a></td>
                                    <td><a href="delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete this record?')">Delete</a></td>
                                </tr>
                            <?php
                        }
                    }else{
                        echo "Datatable is empty";
                    }
                ?>
            </table>

        </center>
    </body>
</html>