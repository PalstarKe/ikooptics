<?php
namespace App\Models;

use App\Core\Model;

class Package extends Model
{
    protected string $table = 'service_packages';

    public function active(): array
    {
        return $this->db->query("SELECT * FROM {$this->table} WHERE status = 'active' ORDER BY price ASC")->fetchAll();
    }
}
