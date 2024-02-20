<?php

namespace App\Config;

use Symfony\Component\Yaml\Yaml;

class YamlBackupConfigParser extends AbstractBackupConfigParser
{
    public function parseFile(): ?array
    {
        return Yaml::parseFile($this->configFile);
    }
}
