<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 3/18/14
 * Time: 11:32 AM
 */

namespace ChainOfResponsibility;

/**
 * Basic class in ChainOfResponsibility pattern, all chain links must implement this class.
 *
 * @package ChainOfResponsibility
 */
abstract class APoster {

	const BREAKING_NEWS = 999;
	const NEWS          = 10;
	const JOKE          = 5;
	const ACCORDION     = 1;


	protected $priority;

	protected $next;

	public function __construct($priority = APoster::NEWS) {
		$this->priority = $priority;
	}

	public function setNext(APoster $log) {
		$this->next = $log;
		return $log;
	}

	public function message($msg, $priority = APoster::NEWS) {
		if ($priority >= $this->priority) {
			$this->writeMessage($msg);
		}

		if ($this->next != null) {
			$this->next->message($msg, $priority);
		}
	}

	protected abstract function writeMessage($msg);
} 