<?

class db {	
	protected $db;
	protected $res;	
	
	public $row;
	public $num;	
	public $debug = false;
	
	public function __construct() {
		$this->connect();
	}
	
	public function connect() {	
		$this->db = mysql_connect(HOST, USER, PWD);
		
		if(mysql_select_db(DB) == false)
			die('Database not available.');
	}
	
	public function disconnect() {	
		mysql_close($this->db);		
	}
	
	public function query($query) {	
		if($this->debug == false) {
			$this->res = @mysql_query($query);			
		} else {
			$this->res = mysql_query($query);
			$this->db_info($query);
		}
		
		return $this->res; 
	}
	
	private function db_info($sql) {
		if(mysql_errno($this->db)) 
			$color = '#FF7575'; 
		else 
			$color = '#C7FFB3';
		
		$infooutput  = "<div style=\"font: 8px Verdana; padding-top:3px;padding-bottom:3px;background-color:".$color.";border-bottom:1px solid #333;border-top:1px solid #333;z-index:9999; width: 100%; position: relative; top: 0px; left: 0px; height: 20px;\">".date("Y-m-d H:i:s")." - <span style=\"color:black; font-weight:bold;\">".$sql."</span><br />".$this->getErrors()."</div>\n\n";
		echo $infooutput;
	}
	
	public function getErrors(){
		return "Error: ".mysql_errno($this->db)." ".mysql_error($this->db)." - Rows: ".mysql_affected_rows($this->db)." called by ".$_SERVER['HTTP_HOST']." -> ".$_SERVER['PHP_SELF'];
	}
	
	public function numRows() {	
		$this->num = mysql_num_rows($this->res);
		return $this->num;		
	}
	
	public function result() {	
		return $this->res;			
	}
	
	public function fetch() {	
		$this->row = mysql_fetch_array($this->res);
		return $this->row;			
	}
	
	public function row($field) {				
		return $this->row[$field];		
	}
	
	public function insertID() {
		$this->id = mysql_insert_id();
		return $this->id;
	}
	
	public function escape($url) {
		return mysql_real_escape_string($url);
	}
}
	
?>