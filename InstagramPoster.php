<?php
use ChainOfResponsibility\APoster;

/**
 * Posting message in Instagram.
 */
class InstagramPoster extends APoster {

	protected function writeMessage($msg) {
		echo sprintf("Notify Instagram: %s\n", $msg);
	}

}