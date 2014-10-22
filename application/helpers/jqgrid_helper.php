<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------

/**
 * CodeIgniter JqGrid Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Ahmad Alimuddin
 * @link		http://bangkamedia.com
 */

// ------------------------------------------------------------------------

/**
 * jqGrid ColNames, ColModel
 */
if(!function_exists('colname')) {
	function colname($table='',$attribut=array())
	{
		$CI =& get_instance();
		$coln = 'colNames: [';
		$fields = $CI->db->list_fields($table);
		foreach ($fields as $field){
			if(count($attribut)>0) {
				if(isset($attribut[$field])) { $write = $attribut[$field]; } else{ $write = $field; };
			 }
			$coln .= '"'.$write.'",';
		}
		$coln .= '],';
		return $coln;
	}
}
if(!function_exists('colmodel')) {
	function colmodel($table='',$attribut=array())
	{
		$CI =& get_instance();
		// $write = '';
		// echo $attribut['id']; good
		$colm = ' colModel: [';
		$fields = $CI->db->list_fields($table);
		foreach ($fields as $field){
			if(count($attribut)>0) {
				if(isset($attribut[$field])) { $write = $attribut[$field]; } else{ $write = ""; };
				// if(isset($attribut[$result['COLUMN_NAME']])) { $write = $attribut[$result['COLUMN_NAME']]; } else{ $write = ""; };
			 }
			$colm .= '{ name: "'.$field.'", index: "'.$field.'", '.$write.'},';
			// $colm .= '"'.$write.'",';
		}
		/*
		$fields = mysql_query("
			SELECT COLUMN_NAME 
			FROM  `INFORMATION_SCHEMA`.`COLUMNS` 
			WHERE  `TABLE_SCHEMA` =  'aset'
			AND  `TABLE_NAME` =  '$table'
			");
			while ($result = mysql_fetch_array($fields)) {
			  if(count($attribut)>0) {
				if(isset($attribut[$result['COLUMN_NAME']])) { $write = $attribut[$result['COLUMN_NAME']]; } else{ $write = ""; };
			  }
				$colm .= '{ name: "'.$result['COLUMN_NAME'].'", index: "'.$result['COLUMN_NAME'].'", '.$write.'},';
			}
			*/
        $colm .= '],';
		return $colm;
	}
}


/* End of file bootstrap_helper.php */
/* Location: ./application/helpers/bootstrap_helper.php */
