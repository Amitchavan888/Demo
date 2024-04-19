
slip10.html
<!DOCTYPE HTML>
 <html>
   <head>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
       $(document).ready(function(){
           $("#btn1").click(function(){
            $("p").before("<b>Before Text</b>.");
              });
        $("#btn2").click(function(){
            $("p").after("<b>After Text</b>");
          });
       });
   </script>
  </head>
 <body>
   <p>This is a paragraph for trial.Text will be inserted....
      Before and After this!!!!  </p>
      <img id="p" src="index.jpeg"> 
    <button id="btn1">Insert Before</button>
     <button id="btn2">Insert After</button>     
  </body>
</html>