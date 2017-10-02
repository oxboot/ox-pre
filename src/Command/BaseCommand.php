<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorcastudio. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BaseCommand extends Command
{
    /** @var \Ox\Ox */
    protected $ox;

    protected function initialize(InputInterface $input = null, OutputInterface $output = null)
    {
        $this->ox = $this->getApplication()->getApp();
    }
}
