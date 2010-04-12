<?

ob_start();
include_once('inc/config.php'); // setup stuff
include_once('include.php'); // load stuff

$tooth = new toothPaste;
$tp = new template;

$tp->build('header');

if(isset($_GET['pasteID'])) {			// shows a specific paste
	$key = isset($_GET['k']) ? $_GET['k'] : '';
	$tp->build('paste', $tooth->getPaste($_GET['pasteID'], 0, $key));
	$tooth->raiseHits($_GET['pasteID']);
} elseif(isset($_GET['pastes'])) {		// shows a list of X shortened pastes
	$tp->build('pastes', $tooth->getPastes());
} elseif(isset($_GET['about'])) { 		// shows our about-page
	$tp->build('about');
} elseif(isset($_GET['search'])) {		// searches for pastes
	if(empty($_GET['search']))
		$tp->build('search');
	else
		$tp->build('pastesSearch', $tooth->getPastes(10, $_GET['search']));
	
} elseif(isset($_GET['add'])) {			// adds a new paste or shows the form
	if(isset($_POST['submit'])) {
		$pasteID = $tooth->addPaste($_POST['source'], $_POST['type'], $_POST['private'], $_SERVER['REMOTE_ADDR']);
		
		if($pasteID) {
			if(!is_array($pasteID))
				header('Location: ./?pasteID=' .$pasteID); 	// redirect to added paste
			else
				header('Location: ./?pasteID=' .$pasteID[0]. '&k=' .$pasteID[1]); // redirected to added paste w/ privatekey
		} else {
			$tp->build('add');			// creation failed, will show the form again
		}
	}
} else {								// shows the add-form 
	$tp->build('add');
}

$tp->build('footer');

?>