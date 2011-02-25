<?

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
