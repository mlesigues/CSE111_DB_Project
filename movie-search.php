<link ref="stylesheet" type="text/css" href=main.css>

<?php 

//db connnection variables
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'movies';

/*1) mysqli and mysqli result objs */

//$mysqli = obj of mysqli class
$mysqli = new mysqli($host,$user,$pass,$db);
//print_r($mysqli); die;

//call query method of $mysqli obj
$result = $mysqli->query("Select * from Movies WHERE year BETWEEN 2016 and 2017 ORDER BY rand() LIMIT 5") or die($mysqli->error);

//print_r($result); die;

//$result is an obj
/*whenever we have an obj variable, it means we can call methods on it
    and the objs can also have properties */
?> <div class='main-container'> <?php

/*2) getting data from mysqli result obj */

//call fetch_assoc() method of $result obj
//keep getting row's column data as associative array until NULL (no rows is returned)
//fetch_assoc() will automatically keep fetching next row when called again
//print_r($result->fetch_assoc());
//print_r($result->fetch_assoc()); die;

//this is why we can put it directly in the loop and keep getting new rows until the end
while ($movie = $result->fetch_assoc()): ?>
    <div class='movie-container'>
        <div class='header'>
        <h1><?= $movie['title'] ?></h1>
        <span class='year'>( <?= $movie['year'] ?> )</span>
        
        </div>
        <div class='content description'>
        <div class='left-column'>
        <span class='content'>( <?= $movie['description'] ?> )</span>
       
    
        </div>
        </div>

        <div class='right-column'>

        <span class='content-blue'>
        
        </span>

<!---
        <span class='content-blue'>
        <?= $movie['runtime'] . 'min'; ?>
        </span>
-->
      

        <div class='content description'><?= $movie['description'] ?></div>

        <div>




        </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
