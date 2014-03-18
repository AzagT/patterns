<?php
use ChainOfResponsibility\APoster;

function __autoload($class)
{
	$parts = explode('\\', $class);
	require end($parts) . '.php';
}

/**
 * Publish messages in social net ranged by priority.
 *
 * Class PublishChain
 */
class PublishChain {

	/**
	 * Root link in chain.
	 *
	 * @var APoster
	 */
	private $notifier;

	/**
	 * Array of messages.
	 *
	 * @var array
	 */
	private $messages = array();

	public function __construct() {
		// строим цепочку обязанностей
		$this->notifier  = new FacebookPoster();
		$notifier1 = $this->notifier->setNext(new TwitterPoster(APoster::BREAKING_NEWS));
		$notifier2 = $notifier1->setNext(new InstagramPoster(APoster::JOKE));
	}

	/**
	 * Publish all messages.
	 */
	public function run() {
		foreach ($this->messages as $message) {
			$this->notifier->message($message[0], $message[1]);
		}
	}

	/**
	 * Add message
	 *
	 * @param string  $message  Message body.
	 * @param integer $priority Message priority.
	 */
	public function addMessage($message, $priority = APoster::NEWS) {
		$this->messages[] = array($message, $priority);
	}
}

$chain = new PublishChain();

$chain->addMessage("Dark drama of Venice Carnival.");

$chain->addMessage("Russia invaded on Mars.", APoster::BREAKING_NEWS);

$chain->addMessage("Funny cat.", APoster::JOKE);

$chain->run();

