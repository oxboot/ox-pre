<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorcastudio. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Stack;

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

        $all = [];

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

    public function check($element)
    {
        return in_array($element, $this->all);
    }
}
