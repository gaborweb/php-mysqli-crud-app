<?php
    include "db.php";

    if(isset($_GET["id"]) && is_numeric($_GET["id"])){
        $id = $_GET["id"];
        $select = mysqli_query($conn,"SELECT * FROM registeredpeople WHERE id='$id';");
        $fetch = mysqli_fetch_array($select);
        $hobbyValues=explode(",", $fetch['hobby']);
    }

    if(isset($_POST['btnupdate'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $hobby = implode(",", $_POST["hobby"]);
        $country = $_POST['country'];

        $update = "UPDATE registeredpeople SET name='$name', email='$email', gender='$gender', address='$address', hobby='$hobby', country='$country'
        WHERE id='$id'";
    
        if(mysqli_query($conn,$update)){
            ?>
                <script>alert("Record was updated successfully!");</script>
                <script>window.location.href="index.php"</script>
            <?php
            
        }else{
            ?>
                <script>alert("Error by updating record!");</script>
            <?php
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
        <center>
            <form action="update.php" method="post">
                <table>
                    <tr style="display:none">
                        <td>Id</td>
                        <td><input type="text" name="id" value="<?php print_r($fetch['id']);?>"></td>  
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" value="<?php print_r($fetch['name']);?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" value="<?php print_r($fetch['email']);?>"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <input type="radio" name="gender" value="male" <?php if($fetch['gender']=='male'){echo "checked";}?>><span>Male</span>
                            <input type="radio" name="gender" value="female" <?php if($fetch['gender']=='female'){echo "checked";}?>><span>Female</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <textarea name="address"><?php print_r($fetch['address']);?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Hobbies</td>
                        <td>
                            <input type="checkbox" name="hobby[]" value="music" <?php if(in_array("music", $hobbyValues)){echo "checked";} ?> ><span>Music</span>    
                            <input type="checkbox" name="hobby[]" value="movies" <?php if(in_array("movies", $hobbyValues)){echo "checked";} ?> ><span>Movies</span>
                            <input type="checkbox" name="hobby[]" value="games" <?php if(in_array("games", $hobbyValues)){echo "checked";} ?> ><span>Games</span>
                            <input type="checkbox" name="hobby[]" value="travel" <?php if(in_array("travel", $hobbyValues)){echo "checked";} ?> ><span>Travel</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>
                            <select name="country">
                                <option <?php if($fetch['country']=='Hungary'){echo "selected";}?> value="Hungary">Hungary</option>
                                <option <?php if($fetch['country']=='Germany'){echo "selected";}?> value="Germany">Germany</option>
                                <option <?php if($fetch['country']=='England'){echo "selected";}?> value="England">England</option>
                                <option <?php if($fetch['country']=='Australia'){echo "selected";}?> value="Australia">Australia</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit" name="btnupdate" value="Update">
            </form>
        </center>

    </body>
</html>