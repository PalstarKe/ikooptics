<?php
namespace App\Models;

use App\Core\Model;

class Testimonial extends Model
{
    protected string $table = 'testimonials';

    public function active(): array
    {
        return $this->db->query("SELECT * FROM {$this->table} WHERE status = 'active' ORDER BY id DESC")->fetchAll();
    }
}
