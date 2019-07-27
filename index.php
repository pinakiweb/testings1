
<?php
// include 'process.php';
?>



<!------ Include the above in your HEAD tag ---------->

<html>
  <head>
    <title>Awesome Search Box</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css" type="text/css">
  </head>
  <!-- Coded with love by Mutiullah Samim-->
  <body>


        <input type="radio" name="type" id = "tab" value="Name">Search by name
        <input type="radio" name="type" id = "tab" value="Category">Search by category
        <input type="radio" name="type" id = "tab" value="mnf_date">Search by Manf. date
        <input type="radio" name="type" id = "tab" value="desc">Search by description
        <div class="topnav">
          <a class="active" href="#home">Search by name</a>
          <a href="#about">About</a>
          <a href="#contact">Search by category</a>
          <a href="#about"><a href="#about">About</a></a>
          <div class="search-container">
              <input type="text" id="uid" onkeydown="func2(this.value)" placeholder="Search.." name="search">
              <button type="button" onclick="myFunction()">Submit</button>
          </div>
        </div>
        <div id="mylist">
        </div>


    <script>
    function func2(str)
    {
      if(str.length==0){
        document.getElementById("mylist").innerHTML = "";
      }
      else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("mylist").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "process.php?id=" + str, true);
        xmlhttp.send();
    }
    }
    function myFunction() {
      // var input, filter, ul, li, a, i;
      // input = document.getElementById("mySearch");
      // filter = input.value.toUpperCase();
      // ul = document.getElementById("myMenu");
      // li = ul.getElementsByTagName("li");
      // for (i = 0; i < li.length; i++) {
      //   a = li[i].getElementsByTagName("a")[0];
      //   if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      //     li[i].style.display = "";
      //   } else {
      //     li[i].style.display = "none";
      //   }
      // }
      var uid = $("#uid").val();
      var tab = $("#tab").val();
      $.ajax({
                type : 'GET',
                url:  'process.php',
                data:  {
                    id : uid,
                    id_tab : tab
                } ,
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert('error'); },
                success : function(data) {
                    $("#mylist").html(data);
                }
            });
    }
    </script>
  </body>
</html>
