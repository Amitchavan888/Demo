<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Details</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <label for="teacher">Select Teacher:</label>
    <select id="teacher">
        <!-- Options will be populated dynamically via AJAX -->
    </select>
    <div id="teacherDetails">
        <!-- Teacher details will be displayed here -->
    </div>
    <script>
        $(document).ready(function(){
            // AJAX call to fetch teacher names
            $.ajax({
                url: 'getTeachers.php',
                type: 'GET',
                success: function(response) {
                    $('#teacher').html(response);
                }
            });

            // Event listener for select change
            $('#teacher').change(function(){
                var tno = $(this).val();
                // AJAX call to fetch teacher details
                $.ajax({
                    url: 'getTeacherDetails.php',
                    type: 'GET',
                    data: { tno: tno },
                    success: function(response) {
                        $('#teacherDetails').html(response);
                    }
                });
            });
        });
    </script>

    <?php
    // Establish database connection
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "your_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch teacher names
    $sql = "SELECT tno, tname FROM TEACHER";
    $result = $conn->query($sql);

    $options = '';
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $options .= '<option value="' . $row["tno"] . '">' . $row["tname"] . '</option>';
        }
    }
    ?>

    <script>
        // Populate select options from PHP
        $(document).ready(function(){
            $('#teacher').html(`<?php echo $options; ?>`);
        });
    </script>

    <?php
    // Fetch teacher details based on selected teacher number
    if (isset($_GET['tno'])) {
        $tno = $_GET['tno'];
        $sql = "SELECT * FROM TEACHER WHERE tno = $tno";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<script>";
            echo "document.getElementById('teacherDetails').innerHTML = '";
            echo "Teacher Name: " . $row["tname"] . "<br>";
            echo "Qualification: " . $row["qualification"] . "<br>";
            echo "Salary: $" . $row["salary"];
            echo "';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "document.getElementById('teacherDetails').innerHTML = 'Teacher not found.';";
            echo "</script>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
