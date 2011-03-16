<?php

	require_once('_arc/ARC2.php');

	$ARC_CONFIG = array(
		'db_host' => 'localhost',
		'db_name' => 'scs_reader',
		'db_user' => 'root',
		'db_pwd' => 'root'
	);

	$STORE = ARC2::getStore($ARC_CONFIG);
	if (!$STORE->isSetup()) {
		$STORE->setup();
	}

?>