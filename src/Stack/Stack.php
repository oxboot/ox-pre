<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorcastudio. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Stack;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

class Stack
{
    const OX_PACKAGES_FOLDER = OX_ROOT . '/packages';

    /** @var \Ox\Ox */
    private $ox;

    /** @var \Symfony\Component\Filesystem\Filesystem */
    protected $fs;

    /** @var \Symfony\Component\Yaml\Yaml */
    protected $yaml;

    public function __construct($ox)
    {
        $this->ox = $ox;
        $this->fs = $ox['fs'];
        $this->yaml = $ox['yaml'];
    }

    public function check($package)
    {
        $package_file_path = $this::OX_PACKAGES_FOLDER . DS . $package . '.yml';
        if (!$this->fs->exists($package_file_path)) {
            return ['result' => false, 'message' => 'Package ' . $package . ' not exists'];
        }
        $package_modules = $this->yaml::parse(file_get_contents($package_file_path))['modules'];
        if (!isset($package_modules)) {
            return ['result' => true, 'message' => 'Package ' . $package . ' does not depend on the stack modules'];
        }
        return ['result' => true, 'message' => 'Package stack modules ' . $package . ' already installed'];
    }
}
