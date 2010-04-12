<?

/**
 * Template Class
 * Very simple template class
 * 
 * @author Sascha Ohms <sasch9r@gmail.com>
 * @link http://somegas.de
 * @copyright Copyright (c) 2009, Sascha Ohms
 * @package snBoardClasses
 */

class template {
	
	/**
	 * 
	 * @var mixed stores global variables for all templates
	 */	public $globals;

	/**
	 * includes a template and replaces template vars
	 * 
	 * @param string $template
	 * @param mixed $vars
	 */
	public function build($template, $vars = '') {		$glob = $this->globals;		include 'tpl/' .$template. '.tpl.php';	}
	/**
	 * sets global template variables
	 * 
	 * @param mixed $var
	 */	public function setGlobals($var) {		$this->globals = $var;	}}
?>