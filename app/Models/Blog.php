<?php
namespace App\Models;

use App\Core\Model;

class Blog extends Model
{
    protected string $table = 'blog_posts';

    public function published(): array
    {
        return $this->db->query("SELECT * FROM {$this->table} WHERE status = 'published' ORDER BY created_at DESC")->fetchAll();
    }

    public function findBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }
}
