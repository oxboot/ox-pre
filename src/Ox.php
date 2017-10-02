<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorcastudio. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox;

use Pimple\Container;
use Symfony\Component\Filesystem\Filesystem;

class Ox extends Container
{
    public function __construct()
    {
        parent::__construct();
        $ox = $this;

        $ox['console'] = function ($c) use ($ox) {
            return new Console($ox, OX_NAME, OX_VERSION);
        };

        $ox['fs'] = function ($c) {
            return new Filesystem();
        };
    }
}
