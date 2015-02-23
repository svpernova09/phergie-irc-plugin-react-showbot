<?php
/**
 * Phergie plugin for Support a live event in an irc channel (http://www.joeferguson.me)
 *
 * @link https://github.com/phergie/phergie-irc-plugin-react-showbot for the canonical source repository
 * @copyright Copyright (c) 2015 Joe Ferguson (http://www.joeferguson.me)
 * @license http://phergie.org/license New BSD License
 * @package Phergie\Irc\Plugin\React\Showbot
 */

namespace Phergie\Irc\Tests\Plugin\React\Showbot;

use Phake;
use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Plugin\React\Command\CommandEvent as Event;
use Phergie\Irc\Plugin\React\Showbot\Plugin;

/**
 * Tests for the Plugin class.
 *
 * @category Phergie
 * @package Phergie\Irc\Plugin\React\Showbot
 */
class PluginTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * Data provider for testHandleHelp().
	 *
	 * @return array
	 */
	public function dataProviderHandleHelp()
	{
		$data = array();
		$methods = array(
			'handleCommandHelp'
		);
		foreach ($methods as $method) {
			$data[] = array($method);
		}
		return $data;
	}

	/**
	 * Tests handleCommand().
	 *
	 * @param string $method
	 * @dataProvider dataProviderHandleHelp
	 */
	public function testHandleCommand($method)
	{
		$event = $this->getMockCommandEvent();
		Phake::when($event)->getCustomParams()->thenReturn(array());
		Phake::when($event)->getSource()->thenReturn('#channel');
		Phake::when($event)->getCommand()->thenReturn('PRIVMSG');
		$queue = $this->getMockEventQueue();
		$plugin = new Plugin;
		$plugin->$method($event, $queue);
		Phake::verify($queue, Phake::atLeast(1))
		     ->ircPrivmsg('#channel', $this->isType('string'));
	}

	/**
	 * Tests handleCommandHelp().
	 *
	 * @param string $method
	 * @dataProvider dataProviderHandleHelp
	 */
	public function testHandleCommandHelp($method)
	{
		$event = $this->getMockCommandEvent();
		Phake::when($event)->getCustomParams()->thenReturn(array());
		Phake::when($event)->getSource()->thenReturn('#channel');
		Phake::when($event)->getCommand()->thenReturn('PRIVMSG');
		$queue = $this->getMockEventQueue();
		$plugin = new Plugin;
		$plugin->$method($event, $queue);
		Phake::verify($queue, Phake::atLeast(1))
		     ->ircPrivmsg('#channel', $this->isType('string'));
	}

    /**
     * Tests that getSubscribedEvents() returns an array.
     */
    public function testGetSubscribedEvents()
    {
        $plugin = new Plugin;
        $this->assertInternalType('array', $plugin->getSubscribedEvents());
    }

	/**
	 * Returns a mock command event.
	 *
	 * @return \Phergie\Irc\Plugin\React\Command\CommandEvent
	 */
	protected function getMockCommandEvent()
	{
		return Phake::mock('Phergie\Irc\Plugin\React\Command\CommandEvent');
	}

	/**
	 * Returns a mock event queue.
	 *
	 * @return \Phergie\Irc\Bot\React\EventQueueInterface
	 */
	protected function getMockEventQueue()
	{
		return Phake::mock('Phergie\Irc\Bot\React\EventQueueInterface');
	}
}
