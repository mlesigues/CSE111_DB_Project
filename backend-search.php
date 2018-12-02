<?php
include ('config.php');
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($link, $_POST["query"]);
 $query = "
  SELECT * FROM Movies 
  WHERE title LIKE '%".$search."%'
  LIMIT 10
 ";
}
else
{
 $query = "SELECT * FROM Movies";
}
$result = mysqli_query($link, $query) or die(mysqli_query($result));
if(mysqli_num_rows($result) > 0) {
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
        <th>Title</th>
        <th>Year</th>
        <th>Runtime (mins)</th>
        <th>Description</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
        <td>'.$row["title"].'</td>
        <td>'.$row["year"].'</td>
        <td>'.$row["runtime"].'</td> 
        <td>'.$row["description"].'</td>   
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>