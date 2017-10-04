<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorcastudio. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Package;

class Package
{
    private const OX_PACKAGES_FOLDER = OX_ROOT . DS . 'packages';

    /** @var \Ox\Ox */
    private $ox;

    /** @var \Symfony\Component\Filesystem\Filesystem */
    private $fs;

    /** @var \Symfony\Component\Yaml\Yaml */
    private $yaml;

    /**
     * @var mixed
     */
    private $package;

    public function __construct($ox)
    {
        $this->ox = $ox;
        $this->fs = $ox['fs'];
        $this->yaml = $ox['yaml'];
    }

    public function load($package)
    {
        $package_file = self::OX_PACKAGES_FOLDER . DS . $package . '.yml';
        if (!$this->fs->exists($package_file)) {
            return false;
        }
        try {
            $package = $this->yaml::parse(file_get_contents($package_file));
        } catch (\Exception $exception) {
            throw $exception;
        }
        $this->package = $package;
        return $package;
    }
}
