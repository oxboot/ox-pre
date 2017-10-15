<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Stack\Module;

use Ox\Helper\EchoHelper;
use Ox\Helper\ExecHelper;

abstract class StackModule
{
    protected $echo;
    protected $exec;

    public function __construct()
    {
        $this->echo = new EchoHelper();
        $this->exec = new ExecHelper();
    }

    abstract public function install():bool;
    abstract public function uninstall():bool;
}
