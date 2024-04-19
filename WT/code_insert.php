<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter Database Interaction</title>
</head>
<body>
    <?php
    // Load CodeIgniter framework
    require_once 'codeigniter/system/core/CodeIgniter.php';

    // Create a model to interact with the database
    class Student_model extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database(); // Load database library
        }

        // Function to create the student table
        public function create_table() {
            $this->db->query("CREATE TABLE IF NOT EXISTS student (
                rollno INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                class VARCHAR(50) NOT NULL
            )");
        }

        // Function to insert 5 records into the student table
        public function insert_records() {
            $data = array(
                array('name' => 'John Doe', 'class' => '10th'),
                array('name' => 'Jane Smith', 'class' => '9th'),
                array('name' => 'Alice Johnson', 'class' => '11th'),
                array('name' => 'Bob Williams', 'class' => '12th'),
                array('name' => 'Emma Brown', 'class' => '10th')
            );

            $this->db->insert_batch('student', $data);
        }
    }

    // Create an instance of the model
    $student_model = new Student_model();

    // Call the function to create the table
    $student_model->create_table();

    // Call the function to insert records
    $student_model->insert_records();

    echo "<h2>Table 'student' created and 5 records inserted successfully!</h2>";
    ?>
</body>
</html>
