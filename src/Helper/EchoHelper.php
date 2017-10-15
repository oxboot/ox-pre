<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorcastudio. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Helper;

use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Class for the echo helper.
 */
class EchoHelper
{

    /**
     * The console output instance
     *
     * @var ConsoleOutput
     */
    protected $console;

    /**
     * Create an instance of the EchoHelper class
     */
    public function __construct()
    {
        $this->console = new ConsoleOutput();
    }

    /**
     * Writes an info message
     *
     * @param      string  $message  The message
     */
    public function info(string $message)
    {
        $this->write($message, 'blue');
    }

    /**
     * Writes a success message
     *
     * @param      string  $message  The message
     */
    public function success(string $message)
    {
        $this->write($message, 'green');
    }

    /**
     * Writes an error message
     *
     * @param      string  $message  The message
     */
    public function error(string $message)
    {
        $this->write($message, 'red');
    }

    /**
     * Writes a line to the output
     *
     * @param      string  $message
     * @param      string  $color
     */
    protected function write(string $message, string $color = 'white')
    {
        if (!$message) {
            return;
        }

        $this->console->writeln("<fg={$color}>{$message}</>");
    }

}
