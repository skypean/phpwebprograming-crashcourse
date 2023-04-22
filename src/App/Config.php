<?php

namespace App;

/**
 * @property-read ?array $db
 */
class Config
{
    public array $config = [];

    public function __construct()
    {
        $this->config = [
            'db' => [
                'host'     => 'db',
                'user'     => 'root',
                'pass'     => 'root',
                'database' => 'my_db',
                'driver'   => 'mysql',
            ],
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}