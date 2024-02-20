<?php

namespace App\Tests\Config;

use App\Config\YamlBackupConfigParser;

class YamlBackupConfigParserTest extends AbstractBackupConfigParserTest
{
    protected function getClassName(): string
    {
        return YamlBackupConfigParser::class;
    }
}
