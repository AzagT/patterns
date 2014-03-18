<?php
use ChainOfResponsibility\APoster;

class FacebookPoster extends APoster {

	protected function writeMessage($msg) {
		echo sprintf("Notify Facebook: %s\n", $msg);
	}

}