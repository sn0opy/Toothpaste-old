<?

class toothPaste {
	public $validTypes = array('AS3', 'Bash', 'ColdFusion', 'Cpp', 'CSharp', 'Css', 'Delphi', 'Diff', 'Erlang', 'Groovy', 'Java', 'JavaFX', 'JScript', 'Perl', 'Php', 'Plain', 'PowerShell', 'Python', 'Ruby', 'Scala', 'Sql', 'Vb', 'Xml');
		

	public function __construct() {
		$this->db = new db;
		$this->db2 = new db;
	}
	
	public function addPaste($source, $type = 'plain', $private = 0, $ip) {
		if(empty($source))
			$error[] = 'No code given.';
			
		if(!$this->validateType($type))
			$error[] = 'Sourcetype is invalid.';

		if($private == 'on')
			$private = 1;
		else
			$private = 0;	
		
		if($error) {
			foreach($error as $err)
				error::show($err);
				return false;
		} else {
			if($private)
				$key = $this->randString();
			else
				$key = '';
		
			$this->db->query('INSERT INTO `tp_pastes` SET pasteSource = "' .$this->db->escape($source). '", pasteType = "' .$this->db->escape($type). '", pasteKey = "' .$this->db->escape($key). '", pastePrivate = '. (int) $private. ', pasteIP = "' .$this->db->escape($ip). '", pasteDate = ' .time());
			$pasteID = $this->db->insertID();
			
			if($private)
				return array($pasteID, $key);
			else
				return $pasteID;
		}
	}
	
	public function getPaste($pasteID, $lastPastes = false, $key = '') {	
		if($lastPastes)
			$this->db->query('SELECT substring_index(pasteSource, "\n", 5) as pasteSource, pasteType, pastePrivate, pasteID, pasteDate, pasteHits FROM `tp_pastes` WHERE pastePrivate = 0 AND pasteID = ' .(int) $pasteID);
		else
			$this->db->query('SELECT * FROM `tp_pastes` WHERE pasteID = ' .(int) $pasteID);	
			
		
		if($this->db->numRows()) {
			$this->db->fetch();
			
			$pasteID = $this->db->row('pasteID');
			$source = htmlentities($this->db->row('pasteSource'));
			$type = $this->db->row('pasteType');
			$private = $this->db->row('pastePrivate');
			$date = $this->db->row('pasteDate');
			$hits = $this->db->row('pasteHits');
			$getKey = $this->db->row('pasteKey');
			
			if($getKey != $key) {
				error::show('Key invalid.');
				return array('error' => 'Key invalid.');
			}
			
			return array('pasteID' => $pasteID, 'hits' => $hits, 'date' => $date, 'source' => $source, 'type' => $type, 'private' => $private);
		}
	}
	
	public function getPastes($limit = 10, $query = '') {
		if(!empty($query)) 
			$this->db2->query('SELECT * FROM `tp_pastes` WHERE pastePrivate = 0 AND pasteSource LIKE "%' .$this->db2->escape($query). '%" ORDER BY pasteDate DESC LIMIT ' . (int) $limit);
		else 
			$this->db2->query('SELECT * FROM `tp_pastes` WHERE pastePrivate = 0 ORDER BY pasteDate DESC LIMIT ' . (int) $limit);
		
		while($this->db2->fetch()) {
			$ret[] = $this->getPaste($this->db2->row('pasteID'), true);
		}
		
		return $ret;
	}
	
	public function raiseHits($pasteID) {
		$this->db->query('UPDATE `tp_pastes` SET pasteHits = pasteHits + 1 WHERE pasteID = ' .(int) $pasteID);
	}
	
	public function validateType($type) {
		if(in_array($type, $this->validTypes))
			return true;
		else
			return false;
			
	}
	
	public function randString() {
		for($i=0; $i<6; $i++) { 
			$d = rand(1,30) % 2; 
			$e .= $d ? chr(rand(65,90)) : chr(rand(48,57)); 
		}
		return $e;
	}
	
	public function codeDiff() {
	
	}
}

?>
