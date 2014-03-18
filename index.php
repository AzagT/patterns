<?php
use ChainOfResponsibility\APoster;

function __autoload($class)
{
	$parts = explode('\\', $class);
	require end($parts) . '.php';
}

class ChainOfResponsibilityExample {
	public function run() {

		// строим цепочку обязанностей
		$logger = new FacebookPoster();
		$logger1 = $logger->setNext(new TwitterPoster(APoster::BREAKING_NEWS));
		$logger2 = $logger1->setNext(new InstagramPoster(APoster::JOKE));

		$logger->message("Dark drama of Venice Carnival.");

		$logger->message("Russia invaded on Mars.", APoster::BREAKING_NEWS);

		$logger->message("Funny cat.", APoster::JOKE);
	}
}

$chain = new ChainOfResponsibilityExample();
$chain->run();

