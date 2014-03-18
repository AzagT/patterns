<?php
use ChainOfResponsibility\APoster;

function __autoload($class)
{
	$parts = explode('\\', $class);
	require end($parts) . '.php';
}

class ChainOfResponsibilityExample {

	private $notifier;

	private $messages = array();

	public function __construct() {
		// строим цепочку обязанностей
		$this->notifier  = new FacebookPoster();
		$notifier1 = $this->notifier->setNext(new TwitterPoster(APoster::BREAKING_NEWS));
		$notifier2 = $notifier1->setNext(new InstagramPoster(APoster::JOKE));
	}

	public function run() {
		foreach ($this->messages as $message) {
			$this->notifier->message($message[0], $message[1]);
		}

	}

	public function addMessage($message, $priority = APoster::NEWS) {
		$this->messages[] = array($message, $priority);
	}
}

$chain = new ChainOfResponsibilityExample();

$chain->addMessage("Dark drama of Venice Carnival.");

$chain->addMessage("Russia invaded on Mars.", APoster::BREAKING_NEWS);

$chain->addMessage("Funny cat.", APoster::JOKE);

$chain->run();

