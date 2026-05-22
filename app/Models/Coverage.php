<?php
namespace App\Models;

use App\Core\Model;

class Coverage extends Model
{
    protected string $table = 'coverage_areas';

    public function active(): array
    {
        return $this->db->query("SELECT * FROM {$this->table} WHERE status = 'active' ORDER BY name ASC")->fetchAll();
    }

    public function checkCoverage(string $area, string $estate): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE (name LIKE ? OR estates LIKE ?) AND status = 'active'");
        $search = "%{$area}%";
        $estateSearch = "%{$estate}%";
        $stmt->execute([$search, $estateSearch]);
        return $stmt->fetchAll();
    }
}
