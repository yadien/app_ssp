<?php
$page = $_REQUEST['page']; // get the requested page
$limit = $_REQUEST['rows']; // get how many rows we want to have into the grid
$sidx = $_REQUEST['sidx']; // get index row - i.e. user click to sort
$sord = $_REQUEST['sord']; // get the direction
if(!$sidx) $sidx =1;

$wh = "";
$searchOn = $_REQUEST['_search'];
// str_replace(' ', '', $string);
if($searchOn==true) {
	$sarr = $searchOn;
	foreach( $sarr as $k=>$v) {
		switch ($k) {
			case 'id':
			case 'nama_aset':
			case 'merek':
			case 'model':
				$wh .= " AND ".$k." LIKE '".$v."%'";
				break;
			case 'tipe':
				$wh .= " AND ".$k." = ".$v;
				break;
		}
	}
}
// echo $wh;

switch ($examp) {
    case 1:
		$result = mysql_query("SELECT COUNT(*) AS count FROM aset_baku WHERE ".$wh);
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		$count = $row['count'];

		if( $count >0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
        if ($page > $total_pages) $page=$total_pages;
		$start = $limit*$page - $limit; // do not put $limit*($page - 1)
        if ($start<0) $start = 0;
        $SQL = "SELECT * FROM aset_baku WHERE ".$wh." ORDER BY ".$sidx." ".$sord. " LIMIT ".$start." , ".$limit;
		$result = mysql_query( $SQL ) or die("Could not execute query.".mysql_error());
       
		// we should set the appropriate header information. Do not forget this.
		header("Content-type: text/xml;charset=utf-8");
		 
		$s = "<?xml version='1.0' encoding='utf-8'?>";
		$s .=  "<rows>";
		$s .= "<page>".$page."</page>";
		$s .= "<total>".$total_pages."</total>";
		$s .= "<records>".$count."</records>";
		 
		// be sure to put text data in CDATA
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
    $s .= "<row id='". $row['id']."'>";            
    $s .= "<cell>". $row['id']."</cell>";
    $s .= "<cell>". $row['nama_aset']."</cell>";
    $s .= "<cell>". $row['merek']."</cell>";
    $s .= "<cell>". $row['model']."</cell>";
    $s .= "<cell>". $row['id_tipe']."</cell>";
    $s .= "</row>";
}
		$s .= "</rows>"; 
		 
		echo $s;
           
        break;
    case 3:
}
mysql_close($db);
?>