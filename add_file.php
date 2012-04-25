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

    //echo $user_id."</br>";
?>

<?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
       $dbLink = new mysqli('localhost', 'career_admin', 'r4z0r', 'cpsc_careers');
      // $dbLink = mysql_connect('localhost','career_admin','r4z0r')  
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Gather all required data
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
 
        // Create the SQL query
        $query = "
            INSERT INTO `file` (
                `student_id`, `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$user_id}', '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
 
        // Execute the query
        $result = $dbLink->query($query);
 
        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $dbLink->close();
}
else {
    echo 'Error! A file was not sent!';
}
 
// Echo a link back to the main page
echo '<p>Click <a href="manager.php">here</a> to go back</p>';
?>
 
