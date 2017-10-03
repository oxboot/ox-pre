<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorcastudio. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StackListCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('stack:list')
            ->setDescription('Stack modules list')
            ->setHelp('This command allows you to list installed stack modules')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $stack = $this->ox['stack'];
        $stack_list = $stack->getAll();
        if (empty($stack_list)) {
            $this->echo->info('No stack modules');
            return true;
        }
        $this->echo->success('Stack modules list:');
        foreach ($stack_list as $stack_list_module) {
            $this->echo->success($stack_list_module);
        }
        return true;
    }
}
