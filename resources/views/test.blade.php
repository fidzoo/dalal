<!DOCTYPE html>
<html>
<head>
    <title>Rating Test</title>
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/js/rate-yo/css/jquery.rateyo.css") !!}'>
    
    <script type="text/javascript" src='{!! asset("ar-assets/front-end/lib/jquery/jquery-1.11.2.min.js") !!}'></script>
    <script src='{!! asset("ar-assets/front-end/js/rate-yo/js/jquery.rateyo.js") !!}'></script>

    <title> </title>
</head>
<body>

<div id="rateYo"></div>

<br>


<script type="text/javascript">
    $(function () {
 
//   $("#rateYo").rateYo({
//     starWidth: "40px",
//     rating: 1.7,
    
//   });
 
// });


//To get the rating value:

$("#rateYo").rateYo({starWidth: "40px", rating: 1.7}).on("rateyo.set", function (e, data) {

alert("The rating is set to " + data.rating + "!");
document.getElementById("rateyoid").value=data.rating;
});


});





</script>
  
</body>
</html>