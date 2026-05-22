<?php
namespace App\Models;

use App\Core\Model;

class ActivityLog extends Model
{
    protected string $table = 'activity_logs';

    public function log(int $userId, string $action, string $details = ''): void
    {
        $this->create([
            'user_id' => $userId,
            'action' => $action,
            'details' => $details,
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function recent(int $limit = 20): array
    {
        return $this->db->query("SELECT al.*, u.name as user_name FROM {$this->table} al LEFT JOIN users u ON al.user_id = u.id ORDER BY al.created_at DESC LIMIT {$limit}")->fetchAll();
    }
}
