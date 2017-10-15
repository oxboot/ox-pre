<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox;

use Symfony\Component\Console\Application as ConsoleApplication;
use Ox\Command\SiteCreateCommand;
use Ox\Command\StackListCommand;

class Console extends ConsoleApplication
{
    /** @var Ox */
    private $ox;

    public function getApp()
    {
        return $this->ox;
    }

    public function __construct(Ox $ox, $name = 'UNKNOWN', $version = 'UNKNOWN')
    {
        $this->ox = $ox;
        parent::__construct($name, $version);

        $this->addCommands([
            new SiteCreateCommand(),
            new StackListCommand()
        ]);
    }
}
