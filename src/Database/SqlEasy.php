<?php


namespace src\Database;


class SqlEasy
{
    public static function combineTwoTables()
    {
        return <<<SQL
        SELECT 123 AS test
        SQL;
    }
}