<?php
use ChainOfResponsibility\APoster;

/**
 * Posting message in Twitter.
 */
class TwitterPoster extends APoster {

	protected function writeMessage($msg) {
		echo sprintf("Notify Twitter: %s\n", $msg);
	}

}