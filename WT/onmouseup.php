slip13.html-

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Name Input</title>
<style>
    #studentName {
        font-size: 16px;
    }
</style>
</head>
<body>
    <h2>Enter Student Name:</h2>
    <input type="text" id="studentName" onblur="changeStyle()" onmouseup="displayImage()">
    <img src="index.jpeg" id="studentImage" onload="changeImageSize()" onmouseover="enlargeImage()" onmouseout="shrinkImage()" style="display: none;">    
    <script>
        function changeStyle() {
            var studentNameInput = document.getElementById("studentName");
            if (studentNameInput.value.trim() !== "") {
                studentNameInput.style.color = "red";
                studentNameInput.style.fontSize = "18px";
            } else {
                displayImage();
            }
        }
        function displayImage() 
        {
            var studentImage = document.getElementById("studentImage");
            studentImage.style.display = "inline";
        }
        function changeImageSize() 
        {
            var studentImage = document.getElementById("studentImage");
            studentImage.style.width = "200px";
        }
        function enlargeImage() 
        {
            var studentImage = document.getElementById("studentImage");
            studentImage.style.width = "250px";
        }
        function shrinkImage() 
        {
            var studentImage = document.getElementById("studentImage");
            studentImage.style.width = "200px";
        }
    </script>
</body>
</html>