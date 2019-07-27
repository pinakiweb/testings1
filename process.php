
<style>
table {
  font-family: arial;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  align: center;
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<?php

include 'connect.php';



  $user_input     = $_GET["id"];
  $user_input_tab = "Name";
  $q = $user_input;
  if($user_input_tab == 'Name'){
  $sql = "SELECT Name from items";

  $result = $conn->query($sql);
    if($result->num_rows > 0){
      // echo '<table>
      //       <tr>
      //       <th>Name</th>
      //       </tr>';
       $row = $result->fetch_assoc();
      // {
      $hint = "";
      if ($q !== "") {
           $q = strtolower($q);
           $len=strlen($q);
           foreach($row as $name) {
               if (stristr($q, substr($name, 0, $len))) {
                   if ($hint === "") {
                       $hint = $name;
                       echo $hint;
                   } else {
                       $hint .= ", $name";
                       echo '<tr>
                       <td>'.$hint.'</td></tr>';
                   }
               }
           }
        }

      //   echo '<tr>
      //         <td>'.$row['Name'].'</td>
      //         <td>'.$row['Category'].'</td>
      //         <td>'.$row['Description'].'</td>
      //         <td>'.$row['mnf_date'].'</td>
      //         </tr>';
      //
      //  // }
      echo '</table>';
    }
   }
   else if($user_input_tab == 'Category'){
   $sql = "SELECT * from items where Category = '$user_input'";

   $result = $conn->query($sql);
     if($result->num_rows > 0){
       echo '<table>
             <tr>
             <th>Name</th>
             <th>Category</th>
             <th>Description</th>
             <th>Mnf date</th>
             </tr>';
       while($row = $result->fetch_assoc())
       {
         echo '<tr>
               <td>'.$row['Name'].'</td>
               <td>'.$row['Category'].'</td>
               <td>'.$row['Description'].'</td>
               <td>'.$row['mnf_date'].'</td>
               </tr>';

        }
     }
    }
    else if($user_input_tab == 'mnf_date'){
    $sql = "SELECT * from items where mnf_date = '$user_input'";

    $result = $conn->query($sql);
      if($result->num_rows > 0){
        echo '<table>
              <tr>
              <th>Name</th>
              <th>Category</th>
              <th>Description</th>
              <th>Mnf date</th>
              </tr>';
        while($row = $result->fetch_assoc())
        {
          echo '<tr>
                <td>'.$row['Name'].'</td>
                <td>'.$row['Category'].'</td>
                <td>'.$row['Description'].'</td>
                <td>'.$row['mnf_date'].'</td>
                </tr>';

         }
      }
     }
?>
