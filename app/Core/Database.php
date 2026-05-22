<?php
namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $driver = $_ENV['DB_DRIVER'] ?? 'sqlite';

            try {
                if ($driver === 'sqlite') {
                    $dbPath = BASE_PATH . '/database/ikooptic.db';
                    self::$instance = new PDO("sqlite:{$dbPath}", null, null, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]);
                    self::$instance->exec('PRAGMA journal_mode=WAL');
                    self::$instance->exec('PRAGMA foreign_keys=ON');
                } else {
                    $config = require BASE_PATH . '/config/database.php';
                    self::$instance = new PDO(
                        "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}",
                        $config['username'],
                        $config['password'],
                        [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                            PDO::ATTR_EMULATE_PREPARES => false,
                        ]
                    );
                }
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
