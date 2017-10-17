<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Database;

use JamesMoss\Flywheel\Config;
use JamesMoss\Flywheel\Formatter\YAML;
use JamesMoss\Flywheel\Repository;
use JamesMoss\Flywheel\Document;

class Database
{
    protected $config;
    protected $repo;

    /**
     * Database constructor.
     * @param $db_name
     */
    public function __construct($db_name)
    {
        $this->config = new Config(OX_DB_FOLDER, ['formatter' => new YamlFormatter()]);
        $this->repo = new Repository($db_name, $this->config);
    }

    public function add($data, $id = false)
    {
        $document = new Document($data);
        if ($id) {
            $document->setId($id);
        }
        $this->repo->store($document);
    }

    public function get($id)
    {
        return $this->repo->findById($id);
    }

    public function getWhere($column, $cond, $value)
    {
        return $this->repo->query()->where($column, $cond, $value)->execute();
    }

    public function getAll()
    {
        return $this->repo->query()->execute();
    }
}
