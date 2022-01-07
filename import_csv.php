<?php

//database connection details
$connect = mysql_connect('localhost','root','');
mysql_query("SET NAMES utf8");

if (!$connect) {
 die('Could not connect to MySQL: ' . mysql_error());
}

//your database name
$cid =mysql_select_db('mennica_magazyn',$connect);

// path where your CSV file is located
define('CSV_PATH','C:/xampp/htdocs/mennica_magazyn/');

// Name of your CSV file
$csv_file = CSV_PATH . "hardware_list.csv"; 


if (($handle = fopen($csv_file, "r")) !== FALSE) {
   fgetcsv($handle);   
   while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          $col[$c] = $data[$c];
        }

 $col1 = $col[0];
 $col2 = $col[1];

   
// SQL Query to insert data into DataBase
$query = "INSERT INTO products(name,automat_type) VALUES('".$col1."','".$col2."')";
$s     = mysql_query($query, $connect );
 }
    fclose($handle);
}

echo "File data successfully imported to database!!";
mysql_close($connect);
?>