<?php
// $examp = $_GET["q"]; //query number

$id = $_GET['id'];

$SQL = "SELECT * FROM {$gridsubgrid['table']} WHERE id_guru=".$id;
$result = mysql_query( $SQL ) or die("Couldnt execute query.".mysql_error());

if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) {
header("Content-type: application/xhtml+xml;charset=utf-8"); } else {
header("Content-type: text/xml;charset=utf-8");
}
$et = ">";
echo "<?xml version='1.0' encoding='utf-8'?$et\n";
echo "<rows>";
// be sure to put text data in CDATA
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	echo "<row>";			
	echo "<cell>". $row['idid']."</cell>";
	echo "<cell><![CDATA[". $row['menikah']."]]></cell>";
	echo "<cell>". $row['anak']."</cell>";
	echo "</row>";
}
echo "</rows>";	
?>