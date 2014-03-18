<?php
use ChainOfResponsibility\APoster;

class TwitterPoster extends APoster {

	protected function writeMessage($msg) {
		echo sprintf("Notify Twitter: %s\n", $msg);
	}

}