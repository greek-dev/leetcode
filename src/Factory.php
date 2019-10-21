<?php

namespace src;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

/**
 * Class Factory
 * @package src
 */
class Factory
{
    public static function getDb()
    {
        static $connection;
        if (!isset($connection)) {
            $config = new Configuration();
            $connectionParams = [
                'driver' => 'pdo_mysql',
                'host' => getenv('DB_HOST'),
                'dbname' => getenv('DB_NAME'),
                'user' => getenv('DB_USER'),
                'password' => getenv('DB_PASSWORD'),
            ];
            $connection = DriverManager::getConnection($connectionParams, $config);
        }
        return $connection;
    }
}