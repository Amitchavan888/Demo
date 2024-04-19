Model: Create a model file (Student_model.php) in application/models folder to interact with the database


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_students() {
        $query = $this->db->get('student');
        return $query->result();
    }
}
?>




Controller: Create a controller (Student.php) in application/controllers folder to handle requests.
php
Copy code
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Student_model');
    }
    
    public function index() {
        $data['students'] = $this->Student_model->get_students();
        $this->load->view('student_list', $data);
    }
}
?>
View: Create a view file (student_list.php) in application/views folder to display the student records.
php
Copy code

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
</head>
<body>
    <h1>Student Records</h1>
    <table border="1">
        <tr>
            <th>Roll No</th>
            <th>Name</th>
            <th>Class</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student->rollno; ?></td>
            <td><?php echo $student->name; ?></td>
            <td><?php echo $student->class; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
Database: Make sure you have created a table named student with the appropriate fields (rollno, name, class). Insert at least 5 records into this table.