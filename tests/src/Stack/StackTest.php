<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Stack;

use Ox\Ox;
use PHPUnit\Framework\TestCase;

final class StackTest extends TestCase
{
    protected $ox;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->ox = new Ox();
    }

    public function testConstruct()
    {
        $stack = $this->ox['stack'];
    }
}
