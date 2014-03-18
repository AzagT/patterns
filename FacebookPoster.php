<?php
use ChainOfResponsibility\APoster;

/**
 * Posting message in FaceBook.
 */
class FacebookPoster extends APoster {

	protected function writeMessage($msg) {
		echo sprintf("Notify Facebook: %s\n", $msg);
	}

}