

<!DOCTYPE html>
<html>
<head>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
  #top-ribbon{
       margin-top:20px;
       width:100%;
       height: 40px;
    }
h1{
   background-color: lightblue;
   text-align: center;
   font-family: cursive;
   width: 100%;
   height: 70px;
   }
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 200px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 14px;
}

 
.card button:hover {
  opacity: 0.7;
}
 #menu{
   margin-top :60px;
 }
 
footer{
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
  }
  #quote{
       color:white;
       direction:right;
       width: 50%;
       font-size: 20px;
       text-shadow: 2px 2px #FF0000;
  }
 
</style>
<script type="text/javascript">
      var items = [];
      var total_items;
       window.onload=getFood;


      function onAddCardClick(i){
        console.log(i);
        items.push(i);
        total_items=items.length;
        document.getElementById("num").innerHTML = total_items;
        } 

      function onCartClick(){
        document.location.href='/vishvesh/order/'+items;
      }
     
			function getFood() {
        $.ajax({
            type:'Get',
            url:'/api/food/',
            success:function(response) {
            console.dir(response);
            var len = response.data.length;
            var out,i;
            console.log("length of response"+len);
            for(i=0;i<len;i++){
              out='<div class="col"  style="background-color:lavender;">.col</div>';
              out='<div class="card">';
              out+='<h2>'+ response.data[i].fname +'</h2>';
              out+='<p class="price">'+response.data[i].price+'</p>';
              //out+='<p>'+response.data[i].Description+'</p>';
              out+='<p><button onClick=onAddCardClick("'+ response.data[i].fid+'") name="i">Add to Cart</button></p>';
              out+='</div>';
              $('#menu').append(out);
              }
        
            }
          
        });
   };

           
</script>
</head>
  <body >
     <div class="container-fluid">
      <header>
        <h1> HOTEL VISHVESH </h1>
      </header>
      
        <div class="row" id="top-ribbon">
          <div class="col-sm-10" style="background-color:#9400D3;">   </div>
            <div class="col-sm-2" style="background-color:#FFC0CB;">
              <div  onClick=onCartClick()>
               <i  class="fas fa-cart-plus"> </i> <span id="num" > </span> 
              </div>
            </div>
        </div>
   
   
        <div class="row" id="menu">   </div>

        <footer>
            <div class="row" id="last">
              <div class="col-sm-10" style="background-color:#9400D3;"> <marquee id="quote">        V follow ....."Good Food Good Mood"......   </marquee>   </div>
               <div class="col-sm-2" style="background-color:#FFC0CB;">
                             <p style="color:blue">  Thank you... </p>
                </div>
              </div>
          </div>
        </footer> 
     </div>
</body>
</html>
