<?php
/**
 * Phergie plugin for Support a live event in an irc channel (http://www.joeferguson.me)
 *
 * @link https://github.com/svpernova09/phergie-irc-plugin-react-showbot for the canonical source repository
 * @copyright Copyright (c) 2015 Joe Ferguson (http://www.joeferguson.me)
 * @license http://phergie.org/license New BSD License
 * @package Phergie\Irc\Plugin\React\Showbot
 */

namespace Phergie\Irc\Plugin\React\Showbot;

use Phergie\Irc\Bot\React\AbstractPlugin;
use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Plugin\React\Command\CommandEvent as Event;

/**
 * Plugin class.
 *
 * @category Phergie
 * @package Phergie\Irc\Plugin\React\Showbot
 */
class Plugin extends AbstractPlugin
{
	/**
	 * Accepts plugin configuration.
	 *
	 * Supported keys:
	 *
	 *
	 *
	 * @param array $config
	 */
	public function __construct(array $config = array())
	{

	}

	/**
	 *
	 *
	 * @return array
	 */
	public function getSubscribedEvents()
	{
		return array(
			'command.sb.help' => 'handleCommandHelp',
		);
	}

	/**
	 *
	 *
	 * @param \Phergie\Irc\Plugin\React\Command\CommandEvent $event
	 * @param \Phergie\Irc\Bot\React\EventQueueInterface $queue
	 */
	public function handleCommand(Event $event, Queue $queue)
	{
	}


	/**
	 * Handle the help command
	 *
	 * @param \Phergie\Irc\Plugin\React\Command\CommandEvent $event
	 * @param \Phergie\Irc\Bot\React\EventQueueInterface $queue
	 */
	public function handleCommandHelp(Event $event, Queue $queue)
	{
		$this->sendIrcResponse($event, $queue, $this->getHelpLines());
	}

	/**
	 * Return an array of help command response lines
	 *
	 * @return array
	 */
	public function getHelpLines()
	{
		return array(
			'Usage: sb <action>',
			'actions: help, next, schedule, suggest'
		);
	}

	/**
	 * Send an array of response lines back to IRC
	 *
	 * @param \Phergie\Irc\Plugin\React\Command\CommandEvent $event
	 * @param \Phergie\Irc\Bot\React\EventQueueInterface $queue
	 * @param array $ircResponse
	 */
	protected function sendIrcResponse(Event $event, Queue $queue, array $ircResponse)
	{
		foreach ($ircResponse as $ircResponseLine) {
			$this->sendIrcResponseLine($event, $queue, $ircResponseLine);
		}
	}
}
