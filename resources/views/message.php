<html>
   <head>
      <title>Ajax Example</title>

      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>

      <script>
         function getFood() {
            $.ajax({
               type:'Get',
               url:'/api/food',
             //  data:'_token = <?php echo csrf_token() ?>',
               success:function(response) {
                  console.dir(response);
                  $("#showFood").html(JSON.stringify(response.data[0]));
               }
            });
         };
         function saveFood() {
         /*   $.ajax({
               type:'POST',
               url:'/api/food',
               timeout: 0,
               headers: {
                  "Content-Type": "application/json"
               },
               "data": JSON.stringify({"fnamef":"ssdfd","price":123}),
               success:function(response) {
                  console.dir(response);
                  $("#saveFoodResponse").html(JSON.stringify(response));
               },
               error: function(error_response){
                  $("#saveFoodResponse").html(JSON.stringify(error_response));
               }
            });*/
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({"fname":"ssdfd","price":123});

            var requestOptions = {
              method: 'POST',
              headers: myHeaders,
              body: raw,
              redirect: 'follow'
            };

            fetch("http://127.0.0.1:8000/api/food", requestOptions)
              .then(response =>alert(response.text()))
              .then(result => console.log(result))
              .catch(error => console.log('error', error));
         }
      </script>
   </head>

   <body>
      <div id = 'showFood'>This message will be replaced using Ajax.
         Click the button to replace the message.</div>
      <?php
      echo Form::button('get food', ['onClick' => 'getFood()']);
//echo Form::submit('Click Me!');
 ?>

            <br/>
            <br/>

            <br/>

            <br/>

            <br/>

 <div id = 'saveFoodResponse'>This message will be replaced using Ajax.
         Click the button to replace the message.</div>
      <?php
echo Form::button('save food', ['onClick' => 'saveFood()']);
//echo Form::submit('Click Me!');
 ?>

   </body>

</html>