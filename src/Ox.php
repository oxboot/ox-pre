<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox;

use Pimple\Container;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;
use Ox\Stack\Stack;
use Ox\Package\Package;

class Ox extends Container
{
    public function __construct()
    {
        parent::__construct();
        $ox = $this;

        $ox['console'] = function ($c) {
            return new Console($c, OX_NAME, OX_VERSION);
        };

        $ox['fs'] = function ($c) {
            return new Filesystem();
        };

        $ox['yaml'] = function ($c) {
            return new Yaml();
        };

        $ox['stack'] = function ($c) {
            return new Stack($c);
        };

        $ox['package'] = function ($c) {
            return new Package($c);
        };
    }
}
