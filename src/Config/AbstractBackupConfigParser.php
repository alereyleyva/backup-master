<?php

namespace App\Config;

use App\Backup\BackupEnv;

abstract class AbstractBackupConfigParser
{
    protected string $configFile;

    public function __construct(string $configFile)
    {
        $this->configFile = $configFile;
    }

    abstract public function parseFile(): ?array;

    public function processBackupConfigFromEnv(BackupEnv $env): ?BackupConfig
    {
        $parsedFile = $this->parseFile();

        return null;
    }
}
