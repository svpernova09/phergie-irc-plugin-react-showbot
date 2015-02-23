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
     * Tests that getSubscribedEvents() returns an array.
     */
    public function testGetSubscribedEvents()
    {
        $plugin = new Plugin;
        $this->assertInternalType('array', $plugin->getSubscribedEvents());
    }
}
