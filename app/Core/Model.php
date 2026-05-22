<?php
namespace App\Core;

use PDO;

class Model
{
    protected string $table;
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(string $orderBy = 'id DESC'): array
    {
        return $this->db->query("SELECT * FROM {$this->table} ORDER BY {$orderBy}")->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function where(string $column, $value): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$column} = ?");
        $stmt->execute([$value]);
        return $stmt->fetchAll();
    }

    public function create(array $data): int
    {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));
        $stmt = $this->db->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})");
        $stmt->execute(array_values($data));
        return (int) $this->db->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $set = implode('=?,', array_keys($data)) . '=?';
        $stmt = $this->db->prepare("UPDATE {$this->table} SET {$set} WHERE id = ?");
        return $stmt->execute([...array_values($data), $id]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function count(string $where = '1=1'): int
    {
        return (int) $this->db->query("SELECT COUNT(*) FROM {$this->table} WHERE {$where}")->fetchColumn();
    }

    public function paginate(int $page = 1, int $perPage = 15, string $where = '1=1'): array
    {
        $offset = ($page - 1) * $perPage;
        $total = $this->count($where);
        $stmt = $this->db->query("SELECT * FROM {$this->table} WHERE {$where} ORDER BY id DESC LIMIT {$perPage} OFFSET {$offset}");
        return [
            'data' => $stmt->fetchAll(),
            'total' => $total,
            'pages' => ceil($total / $perPage),
            'current' => $page,
        ];
    }
}
