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
              success:function(response) {
              console.dir(response);
             // $("#showFood").html(JSON.stringify(response.data[1]));
              $('#f1').val(JSON.stringify(response.data[1].fname));
              $('#f2').val(JSON.stringify(response.data[1].fid));
              $('#f3').val(JSON.stringify(response.data[1].price));
               }
            });
         };
         function getFoodname() {
            $.ajax({
              type:'Get',
              url:'/api/food2',
              success:function(response) {
              console.dir(response);
              var len = response.data.length;

                $("#foods").empty();
                for( var i = 0; i<len; i++){
                    var id = response.data[i].fid;
                    var name = response.data[i].fname;
                    $("#foods").append("<option value='"+id+"'>"+name+"</option>");
             
                  }
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

            var raw = JSON.stringify({"fname":"shavige","price":45});

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

   <body >
      <div id = 'showFood'>This message will be replaced using Ajax.
         Click the button to replace the message.</div>
         <br>
          <div>
            <table>
              <tr> 
                <td> select Food </td>
                <td><select name="cars" id="foods">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>Food Name: </td>
                <td>  <input type="text" id="f1"> </td>
              </tr>
              <tr>
                <td>     Food Id: </td>
                <td>  <input type="text" id="f2"> </td>
              </tr>
              <tr>
                <td>  Food Price: </td>
                <td> <input type="text" id="f3"> </td>
              </tr>
            </table>
          </div>
      <?php
      echo Form::button('get food', ['onClick' => 'getFoodname()']);
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