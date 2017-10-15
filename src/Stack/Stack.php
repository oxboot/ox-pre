<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Stack;

use Ox\Stack\Module\NGINX;
use Ox\Stack\Module\PHP;

class Stack
{
    private const OX_STACK_FILE_PATH = OX_DB_FOLDER . DS . 'stack.yml';

    /** @var \Ox\Ox */
    private $ox;

    /** @var \Symfony\Component\Filesystem\Filesystem */
    private $fs;

    /** @var \Symfony\Component\Yaml\Yaml */
    private $yaml;

    /**
     * @var mixed
     */
    private $all;

    public function __construct($ox)
    {
        $this->ox = $ox;
        $this->fs = $ox['fs'];
        $this->yaml = $ox['yaml'];

        if (!$this->fs->exists(self::OX_STACK_FILE_PATH)) {
            $this->fs->dumpFile(self::OX_STACK_FILE_PATH, '');
        }
        try {
            $all = $this->yaml::parse(file_get_contents($this::OX_STACK_FILE_PATH));
        } catch (\Exception $exception) {
            throw $exception;
        }
        $this->all = $all;
    }

    public function getAll()
    {
        return $this->all;
    }

    public function check($module)
    {
        return in_array($module, $this->all);
    }

    private function moduleInstance($module)
    {
        switch ($module) {
            case 'php':
                $module_instance = new PHP();
                break;
            case 'nginx':
                $module_instance = new NGINX();
                break;
            default :
                return false;
        }
        return $module_instance;
    }

    public function install($module)
    {
        if ($this->check($module)) {
            return false;
        }
        $module_instance = $this->moduleInstance($module);
        if (!$module_instance) {
            return false;
        }
        return $this->moduleInstance($module)->install();
    }

    public function uninstall($module)
    {
        if ($this->check($module)) {
            return false;
        }
        return $this->moduleInstance($module)->uninstall();
    }
}
