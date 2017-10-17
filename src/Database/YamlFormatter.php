<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Database;

use JamesMoss\Flywheel\Formatter\FormatInterface;
use Symfony\Component\Yaml\Yaml;

class YamlFormatter implements FormatInterface
{
    public function getFileExtension()
    {
        return 'yml';
    }
    public function encode(array $data)
    {
        return Yaml::dump($data);
    }
    public function decode($data)
    {
        return Yaml::parse($data);
    }
}
