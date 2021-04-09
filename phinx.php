<?php
//读取当前系统设置
$env = parse_ini_file('.env', true);

return [
    "paths" => [
        "migrations" => "database/db/migrations",
        "seeds" => "database/db/seeds"
    ],
    "environments" => [
        "default_migration_table" => "phinxlog",
        "default_database" => "product",
        "default_environment" => "product",
        "product" => [
            "adapter" => "mysql",
            "host" => $env["DB_HOST"],
            "name" => $env["DB_DATABASE"],
            "user" => $env["DB_USERNAME"],
            "pass" => $env["DB_PASSWORD"],
            "port" => $env["DB_PORT"],
            "charset" => "utf8"
        ]
    ]
];
