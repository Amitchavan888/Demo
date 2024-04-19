<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Checker</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Number Checker</h1>
    <label for="number">Enter a Number:</label>
    <input type="number" id="number">
    <button onclick="checkNumber()">Check</button>
    <p id="result"></p>

    <script>
        function checkNumber() {
            var number = document.getElementById("number").value;
            $.ajax({
                url: '<?php echo base_url('welcome/check_number'); ?>',
                type: 'POST',
                data: { number: number },
                success: function(response) {
                    $('#result').text(response);
                }
            });
        }
    </script>

    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Welcome extends CI_Controller {
        
        public function index()
        {
            $this->load->view('welcome_message');
        }

        public function check_number() {
            $number = $this->input->post('number');

            if ($number > 0) {
                echo "Positive";
            } else if ($number < 0) {
                echo "Negative";
            } else {
                echo "Zero";
            }
        }
    }
    ?>
</body>
</html>
