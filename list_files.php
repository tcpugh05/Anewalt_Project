<?php
    session_start();
?>

<?php
    $dbLink = new mysqli('localhost', 'career_admin', 'r4z0r', 'cpsc_careers');
    if(mysqli_connect_errno()) {
        die("MySQL connection faile: ". mysqli_connect_error());
    }

    $sql = "SELECT student_id FROM students WHERE user_name = '".$_SESSION['username']."';";
    //echo $sql."</br>";

    $result = $dbLink->query($sql);
    $user_id = NULL;

    if($result) {
        if($result->num_rows == 0) {
            echo '<p>There are no rows in the database</p>';
        }
        else {
            while($row = $result->fetch_assoc()) {
                $user_id = $row['student_id'];
            }
        }

        $result->free();
    }
    else {
        echo 'Error! SQL Query failed:';
        echo "<pre>{$dbLink->error}</pre>";
    }
?>


<?php
// Connect to the database
$dbLink = new mysqli('localhost', 'career_admin', 'r4z0r', 'cpsc_careers');
if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}
 
// Query for a list of all existing files
$sql = "SELECT `id`, `name`, `mime`, `size`, `created` FROM `file` INNER JOIN
        `students` ON students.student_id = file.student_id
        WHERE students.student_id = {$user_id};";

$result = $dbLink->query($sql);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<table width="100%">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Mime</b></td>
                    <td><b>Size (bytes)</b></td>
                    <td><b>Created</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['mime']}</td>
                    <td>{$row['size']}</td>
                    <td>{$row['created']}</td>
                    <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                </tr>";
        }
 
        // Close table
        echo '</table>';
    }
 
    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$dbLink->error}</pre>";
}
 
// Close the mysql connection
$dbLink->close();

echo '<p>Click <a href="manager.php">here</a> to go back</p>';
?>