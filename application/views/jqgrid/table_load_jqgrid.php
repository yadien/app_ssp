<?php 
//include the information needed for the connection to MySQL data base server. 
// we store here username, database and password 
// include("dbconfig.php"); -> in CI this function already call when database library loaded
 
// to the url parameter are added 4 parameters as described in colModel
// we should get these parameters to construct the needed query
// Since we specify in the options of the grid that we will use a GET method 
// we should use the appropriate command to obtain the parameters. 
// In our case this is $_GET. If we specify that we want to use post 
// we should use $_POST. Maybe the better way is to use $_REQUEST, which
// contain both the GET and POST variables. For more information refer to php documentation.
$page = $_REQUEST['page']; // get the requested page
$limit = $_REQUEST['rows']; // get how many rows we want to have into the grid
$sidx = $_REQUEST['sidx']; // get index row - i.e. user click to sort
$sord = $_REQUEST['sord']; // get the direction

// get table name from url
((isset($table)) ? '' : $table = $_GET['table']); 

// getting field name from url
// $field0 = $_GET['field'];
// $field = explode("-",$field0);
// echo $kolom[1];

// if we not pass at first time index use the first column for the index or what you want
if(!$sidx) $sidx =1; 
 
for($i=1;$i<=count($kolom);$i++){
	if(isset($_GET[$kolom[$i]]))
		${$kolom[$i]} = $_GET[$kolom[$i]];
	else
		${$kolom[$i]} = "";
}

//construct where clause
$where = "WHERE 1=1";
for($i=1;$i<=count($kolom);$i++){
if(${$kolom[$i]}!='')
	$where.= " AND ".$kolom[$i]." LIKE '".${$kolom[$i]}."%'";
}
// $cfilter = 
((ISSET($_GET['filter'])) ? $where.= " AND ".$_GET['filter']." = '".$_GET[$_GET['filter']."_f"]."' " : '' );
((ISSET($_GET['filter2'])) ? $where.= " AND ".$_GET['filter2']." = '".$_GET[$_GET['filter2']."_f"]."' " : '' );
 // echo $where;
// connect to the MySQL database server 
// $db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error()); 
 
// select the database 
// mysql_select_db($database) or die("Error connecting to db."); 
 
// calculate the number of rows for the query. We need this for paging the result 
$result = mysql_query("SELECT COUNT(*) AS count FROM $table ".$where); 
$row = mysql_fetch_array($result,MYSQL_ASSOC); 
$count = $row['count']; 
 
// calculate the total pages for the query 
if( $count > 0 && $limit > 0) { 
              $total_pages = ceil($count/$limit); 
} else {
              $total_pages = 0; 
} 
 
// if for some reasons the requested page is greater than the total 
// set the requested page to total page 
if ($page > $total_pages) $page=$total_pages;
 
// calculate the starting position of the rows 
$start = $limit*$page - $limit;
 
// if for some reasons start position is negative set it to 0 
// typical case is that the user type 0 for the requested page 
if($start <0) $start = 0; 
 
// the actual query for the grid data 
$SQL = "SELECT * FROM $table ".$where." ORDER BY $sidx $sord LIMIT $start , $limit "; 
$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error()); 
// echo $SQL;
// we should set the appropriate header information. Do not forget this.
header("Content-type: text/xml;charset=utf-8");
 
$s = "<?xml version='1.0' encoding='utf-8'?>";
$s .=  "<rows>";
$s .= "<page>".$page."</page>";
$s .= "<total>".$total_pages."</total>";
$s .= "<records>".$count."</records>";
// be sure to put text data in CDATA
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
    $s .= "<row id='". $row[$kolom[1]]."'>";        
	for($i=1;$i<=count($kolom);$i++) {
		if( isset( $join ) && array_key_exists( $kolom[$i],$join ) ):
			$tablekey = array_keys($join[$kolom[$i]])[0];
			$tablekeyex = explode('-',array_keys($join[$kolom[$i]])[0]);
			$s .= "<cell>". @$this->core_model->getSelectedData($tablekeyex[0],array($tablekeyex[1]=>$row[$kolom[$i]]))->row()->$join[$kolom[$i]][$tablekey]."</cell>";
		else:
			$s .= "<cell>". $row[$kolom[$i]]."</cell>";
		endif;
	}
    $s .= "</row>";
}
$s .= "</rows>"; 
 
echo $s;
?>