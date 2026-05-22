<?php
namespace App\Models;

use App\Core\Model;

class Setting extends Model
{
    protected string $table = 'settings';

    public function get(string $key, string $default = ''): string
    {
        $stmt = $this->db->prepare("SELECT value FROM {$this->table} WHERE \"key\" = ?");
        $stmt->execute([$key]);
        return $stmt->fetchColumn() ?: $default;
    }

    public function set(string $key, string $value): void
    {
        $driver = $_ENV['DB_DRIVER'] ?? 'sqlite';
        if ($driver === 'sqlite') {
            $stmt = $this->db->prepare("INSERT OR REPLACE INTO {$this->table} (\"key\", value, type, \"group\") VALUES (?, ?, COALESCE((SELECT type FROM {$this->table} WHERE \"key\" = ?), 'text'), COALESCE((SELECT \"group\" FROM {$this->table} WHERE \"key\" = ?), 'general'))");
            $stmt->execute([$key, $value, $key, $key]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO {$this->table} (`key`, value) VALUES (?, ?) ON DUPLICATE KEY UPDATE value = ?");
            $stmt->execute([$key, $value, $value]);
        }
    }

    public function getGroup(string $prefix): array
    {
        $stmt = $this->db->prepare("SELECT \"key\", value FROM {$this->table} WHERE \"key\" LIKE ?");
        $stmt->execute(["{$prefix}%"]);
        return $stmt->fetchAll(\PDO::FETCH_KEY_PAIR);
    }
}
