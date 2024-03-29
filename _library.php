<?php

	require_once('_setup.php');

	class ScsFeedReader {
		private $store;
		
		public function __construct($store) {
			if (empty($store)) {
				throw new Exception('Store object not given');
			} else {
				$this->store = $store;
			}
		}
		
		public function loadFeed($url) {
			if (empty($url)) {
				throw new Exception('Cannot load from empty URL address');
			} else {
				$this->store->query('DELETE FROM <'.$url.'>');
				$this->store->query('LOAD <'.$url.'> INTO <'.$url.'>');
				
				return $this->store->getErrors();
			}
		}
	}
	
	$READER = new ScsFeedReader($STORE);

?>