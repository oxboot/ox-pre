<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorca. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox\Database;

class Site
{
    /**
     * @var Database
     */
    protected $db;

    public function __construct()
    {
        $this->db = new Database('sites');
    }

    public function add($site_slug, $params = [])
    {
        $this->db->add($params, $site_slug);
    }

    public function get($site_slug)
    {
        return $this->db->get('slug', '==', $site_slug);
    }

    public function getAll()
    {
        return $this->db->getAll();
    }
}
