<?php
namespace App\Models;

use App\Core\Model;

class ClientRequest extends Model
{
    protected string $table = 'client_requests';

    public function recent(int $limit = 10): array
    {
        return $this->db->query("SELECT * FROM {$this->table} ORDER BY created_at DESC LIMIT {$limit}")->fetchAll();
    }

    public function countByStatus(string $status): int
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE status = ?");
        $stmt->execute([$status]);
        return (int) $stmt->fetchColumn();
    }
}
