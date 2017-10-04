<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorcastudio. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Stack\Module;

abstract class StackModule
{
    abstract public function install();
    abstract public function uninstall();
}
