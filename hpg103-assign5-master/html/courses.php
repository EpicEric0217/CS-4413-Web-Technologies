<?php
include_once ".env.php";
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
//now to delete...........
// Check connection
if ($link->mysqli_connect_error) {
    echo "Connection failed: " . $link->mysqli_connect_error;
}
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($link, "DELETE FROM book WHERE id=$id");
    echo "DELETE Data";
    header('Location: /html/courses.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses</title>
    <link rel="stylesheet" href="../assign5.css">
</head>
<body>
<h1>
    Courses taken
</h1>
<hr>
<a href="../index.php">Back to menu</a><br>

<h3>
    Add Courses Here:
</h3>
<hr>
<form action="../html/courses.php" method="post" name="myForm">
    <label for="Course_name">Course name</label><br>
    <input type="text" id="Course_name" name="Course_name"><br>
    <label for="Course_number">Course number</label><br>
    <input type="text" id="Course_number" name="Course_number"><br>
    <label for="Description">Description</label><br>

    <textarea id="Description" name="descr" rows="4" cols="50">

    </textarea><br>
    <label for="Final_grade">Final grade</label><br>
    <input type="text" id="Final_grade" name="Final_grade"><br>
    <input type="checkbox" id="crtenr" name="crtenr" value="crtenr">
    <label for="crtenr">Currently enrolled</label><br>
    <input type="submit" value="Add Course">
</form>
<?php
 include_once ".env.php";
 $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);

if($link === false){
    echo "ERROR: Could not connect. " . mysqli_connect_error();
}

$Course_name = mysqli_real_escape_string($link, $_POST['Course_name']);
$Description = mysqli_real_escape_string($link, $_POST['descr']);
$Course_number = mysqli_real_escape_string($link, $_POST['Course_number']);
$Course_number = intval($Course_number);
$Final_grade = mysqli_real_escape_string($link, $_POST['Final_grade']);
//bool is used to check if the course is currently enrolled. By default it is set to zero, and if the value of the check box variable is defined, I set 'bool' to 1.
$bool = 0;
if(isset($_POST['crtenr'])) {
    $bool = 1;
}

if($Course_name != "") {
    $sql = "INSERT INTO book (Course_name, Course_number, Description, Final_grade, Is_enrolled) VALUES ('$Course_name', '$Course_number', '$Description', '$Final_grade', $bool)";
    if (mysqli_query($link, $sql)) {
        echo "The records were added successfully.";
        echo "<br>";
        echo "<br>";
        echo "<a href='../html/courses.php'>Click Here to View All Courses </a>";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// Close connection
//mysqli_close($link);


//now to display the course
if ($link->mysqli_connect_error) {
echo "Connection failed: " . $link->mysqli_connect_error;
}
$sql = "SELECT id, Course_name, Course_number, Description, Final_grade, Is_enrolled FROM book";
$result = $link->query($sql);
?>
<?php
//check if the number of results is greater than zero...
if ($result->num_rows > 0) {
// output data of each row
echo "";
    while($row = $result->fetch_assoc()) {
        $bckgrd_color = '';
        if($row['Is_enrolled'] == 1) {
            $bckgrd_color = 'class="course_info_color"';
        }
    ?>
            <div <?php echo $bckgrd_color; ?>>
                <h3>
                    <?php echo $row['Course_number']; ?>
                    <br>
                </h3>
                <ul>
    <li><strong>Course name:</strong><?php echo  $row["Course_name"]?></li><li><strong>Course number:</strong><?php echo  $row["Course_number"]?></li><li><strong>Description:</strong><?php echo  $row["Description"]?></li><li><strong>Final grade:</strong><?php echo  $row["Final_grade"]?></li>

        <a href="/html/courses.php?del=<?php echo $row['id']; ?>">Delete</a>

                </ul>
            </div>
        <?php
     }
    } else {
    echo "<br>";
    echo "Nothing inserted yet.....";
    }
?>
</body>
</html>