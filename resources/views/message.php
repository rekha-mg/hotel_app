  <html>
     <head>
        <title>Ajax Example</title>

        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>

        <script>
          var foodid;
            $(document).ready(function(){
            $('#foods').change(function(){
             foodid = $(this).children("option:selected").val();
           // alert("You have selected the food - " + fid);
              });
            });

           function getFood() {
            
              $.ajax({
                type:'Get',
                url:'/api/food/'+foodid,
                success:function(response) {
                console.dir(response);
               // $("#showFood").html(JSON.stringify(response.data[1]));
                $('#f1').empty();
                $('#f1').val(JSON.stringify(response.data[0].fname));
                $('#f2').val(JSON.stringify(response.data[0].fid));
                $('#f3').val(JSON.stringify(response.data[0].price));
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
        <div id = 'showFood'>Select the food and place order</div>
           <br>
            <div>
              <table>
                <tr> 
                  <td>
                     <?php
                        echo Form::button('get food List', ['onClick' => 'getFoodname()']);
                      ?>
                  </td>
                  </tr>
                   <tr>
                      <td> select Food </td>
                      <td><select id="foods">
                          </select>
                      </td>
                  
                        <td><?php 
                          echo Form::button('get details', ['onClick' => 'getFood()']);
                           ?>
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
                        <tr>
                          <td> <input type="button" name="Place order" value="Place Order">
                          </td>
                        </tr>
              </table>
            </div>
       

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