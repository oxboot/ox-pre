<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Stack;

use Ox\Database\Database;
use Ox\Stack\Module\NGINX;
use Ox\Stack\Module\PHP;

class Stack
{
    /**
     * @var Database
     */
    private $db;

    public function __construct()
    {
        $this->db = new Database('config');
        $this->db->add(['installed' => ['php', 'mysql']], 'stack');
    }

    public function getInstalled()
    {
        return $this->db->get('stack')->installed;
    }

    public function check($module)
    {
        return in_array($module, $this->getInstalled());
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
            default:
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
