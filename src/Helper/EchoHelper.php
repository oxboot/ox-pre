<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorcastudio. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Helper;

use Symfony\Component\Console\Output\ConsoleOutput;

class EchoHelper
{
    public function standard($message, $color = 'white')
    {
        if (isset($message)) {
            $output = new ConsoleOutput();
            $output->writeln('<fg=' . $color .'>' . $message . '</>');
        }
    }

    public function info($message)
    {
        $this->standard($message, 'blue');
    }

    public function success($message)
    {
        $this->standard($message, 'green');
    }

    public function error($message)
    {
        $this->standard($message, 'red');
    }
}
