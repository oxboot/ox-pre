<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Helper;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ExecHelper
{
    public function process($command)
    {
        $echo = new EchoHelper();
        $process = new Process($command);
        try {
            $process->setTimeout(3600);
            $process->mustRun(function ($type, $buffer) use ($echo) {
                $echo->info($buffer);
            });
        } catch (ProcessFailedException $e) {
            $echo->error($e->getMessage());
            return false;
        }
        return true;
    }
}
