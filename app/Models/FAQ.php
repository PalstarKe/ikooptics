<?php
namespace App\Models;

use App\Core\Model;

class FAQ extends Model
{
    protected string $table = 'faqs';

    public function active(): array
    {
        return $this->db->query("SELECT * FROM {$this->table} WHERE status = 'active' ORDER BY sort_order ASC")->fetchAll();
    }
}
