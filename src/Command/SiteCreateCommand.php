<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorcastudio. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Command;

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
        $package = $input->getOption('package');

        $stack = $this->ox['stack'];
        $stack_check = $stack->check($package);
        var_dump($stack_check);
    }
}
