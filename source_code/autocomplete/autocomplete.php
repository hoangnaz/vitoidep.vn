<?php
$host="localhost";
$username="";
$password="root";
$databasename="sale_book_learning_tools";

$connect=mysql_connect($host,$username,$password);
$db=mysql_select_db($databasename);

$searchTerm = $_GET['term'];

$select =mysql_query("SELECT * FROM product_info WHERE name_product LIKE '%".$searchTerm."%'");
while ($row=mysql_fetch_array($select)) 
{
 $data[] = $row['name_product'];
}
//return json data
echo json_encode($data);

?>