<?php
use ChainOfResponsibility\APoster;

class InstagramPoster extends APoster {

	protected function writeMessage($msg) {
		echo sprintf("Notify Instagram: %s\n", $msg);
	}

}