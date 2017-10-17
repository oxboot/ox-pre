<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Command;

use Ox\Database\Site;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SiteCreateCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('site:create')
            ->setDescription('Create a new site')
            ->setHelp('This command allows you to create a new site')
            ->addArgument('site_name', InputArgument::REQUIRED, 'Site name')
            ->addOption('package', null, InputOption::VALUE_OPTIONAL, 'Package name')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $site_name = $input->getArgument('site_name');
        $package_name = $input->getOption('package');

        /**
         * @var \Ox\Stack\Stack $stack
         */
        $stack = $this->ox['stack'];
        $package = $this->ox['package']->load($package_name);
        if (isset($package['modules'])) {
            foreach ($package['modules'] as $package_module) {
                if ($stack->check($package_module)) {
                    $this->echo->success($package_module . ' installed');
                } else {
                    $this->echo->error($package_module . ' not installed');
                }
            }
        }
        $modules_to_install = array_diff($package['modules'], $stack->getInstalled());
        if (!empty($modules_to_install)) {
            foreach ($modules_to_install as $module) {
                $stack->install($module);
            }
        }
        $site_db = new Site();
        $site_db->add($site_name, ['test' => 'new_test']);
    }
}
