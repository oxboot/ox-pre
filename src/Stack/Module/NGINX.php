<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Stack\Module;

use Ox\Helper\ExecHelper;

class NGINX extends StackModule
{
    public function install():bool
    {
        $this->echo->info("Install NGINX, please wait...");
        $commands = [
            "apt-add-repository \"ppa:nginx/stable\" -y",
            "apt-get update &>> /dev/null",
            "apt-get -y install nginx",
            "service nginx restart &>> /dev/null"
        ];
        foreach ($commands as $command) {
            if (!$this->exec->process($command)) {
                return false;
            }
        }
        return true;
    }

    public function uninstall():bool
    {
        $this->echo->info("Uninstall NGINX, please wait...");
        $commands = [
            "apt-get -y purge nginx",
            "apt-get -y --purge autoremove"
        ];
        foreach ($commands as $command) {
            if (!$this->exec->process($command)) {
                return false;
            }
        }
        return true;
    }
}
