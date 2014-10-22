<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------

/**
 * CodeIgniter Bootstrap Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Ahmad Alimuddin
 * @link		http://bangkamedia.com
 */

// ------------------------------------------------------------------------

/**
 * Bootstrap Components Declaration
 */
if ( ! function_exists('panel'))
{
	function panel($class = '', $content_head = '', $content_body = '', $content_footer = '')
	{
		//$CI =& get_instance();

		if ($class == '')
		{
			$class = 'panel-default';
		}
		
		$panelread = '<div class="panel '.$class.'">';
		(($content_head != '') ? $panelread .= '<div class="panel-heading">'.$content_head.'</div>' : '');
		(($content_body != '') ? $panelread .= '<div class="panel-body">'.$content_body.'</div>' : '');
		(($content_footer!= '') ? $panelread .= '<div class="panel-footer">'.$content_footer.'</div>' : '');
		$panelread .= '</div>';
		
		return $panelread;

	}
}
if(!function_exists('jumbotron')) {
	function jumbotron($class='',$h1='',$paragraph='',$button='')
	{
		$CI =& get_instance();
		$jumbotronread = '<div class="jumbotron '.$class.'">';
		$jumbotronread .= '  <h1>'.$h1.'</h1>';
		$jumbotronread .= '<p>'.$paragraph.'</p>';
		$jumbotronread .= '<p>'.$button.'</p>';
		$jumbotronread .= '</div>';
		
		return $jumbotronread;
	}
}
if(!function_exists('showicon')) {
	function showicon($icon='')
	{
		$CI =& get_instance();
		$glyphiconsread = '<span class="glyphicon glyphicon-'.$icon.'"></span>';
		
		return $glyphiconsread;
	}
}
if(!function_exists('angka')) {
	function angka($num='')
	{
		$CI =& get_instance();
		$conv = number_format($num,0,'','.');
		return $conv;
	}
}
if(!function_exists('load_img')) {
	function load_img($num='')
	{
		$CI =& get_instance();
		$loading = base_url()."assets/img/ajax-".$num;
		$imgload = '<img src='.$loading.'.gif class=loading_gif/>';
		return $imgload;
	}
}


/* End of file bootstrap_helper.php */
/* Location: ./application/helpers/bootstrap_helper.php */
