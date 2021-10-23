<?php

namespace App\Fram\Factories;

use App\Fram\Interfaces\ConnectionInterface;

class PDOFactory implements ConnectionInterface
{
    private static string $dsn = 'mysql:host=db';
    private static string $username = 'root';
    private static string $password = 'password';
    const DATABASE = 'demo';

    private static function getMysqlConnection(): \PDO
    {
        try {
            $db = new \PDO(self::$dsn, self::$username, self::$password);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            ob_start();
            ?>
            <h1>Rien de méchant, juste une erreur...</h1>
            <p><?= $e->getMessage(); ?></p>
            <?php
            echo ob_get_clean();
        }

        return $db;
    }
    public function getConnection(): \PDO
    {
        return self::getMysqlConnection();
    }
}