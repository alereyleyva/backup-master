<?php

namespace App\Config;

use App\Backup\BackupClass;
use App\Backup\BackupEnv;

class BackupConfig
{
    private ?string $source;
    private ?string $target;
    private ?BackupEnv $env;
    private ?BackupClass $class;

    public function __construct(?string $source, ?string $target, ?string $env, ?string $class)
    {
    }
}
