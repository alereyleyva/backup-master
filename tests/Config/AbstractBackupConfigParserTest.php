<?php

namespace App\Tests\Config;

use App\Config\AbstractBackupConfigParser;
use PHPUnit\Framework\TestCase;

abstract class AbstractBackupConfigParserTest extends TestCase
{
    abstract protected function getClassName(): string;

    protected function createFile(string $fileContent, string $fileName): string
    {
        $tmpDir = sys_get_temp_dir();

        $fullFileName = $tmpDir.DIRECTORY_SEPARATOR.$fileName;

        file_put_contents($fullFileName, $fileContent);

        return $fullFileName;
    }

    protected function deleteFile(string $fileName): void
    {
        $fullFileName = $fileName;

        $tmpDir = sys_get_temp_dir();

        if (!str_starts_with($fileName, $tmpDir)) {
            $fullFileName = $tmpDir . DIRECTORY_SEPARATOR . $fileName;
        }

        unset($fullFileName);
    }

    public function testParseFileWithEmptyConfigFile(): void
    {
        $fileName = $this->createFile('', 'backup.yaml');

        $parserClassName = $this->getClassName();

        /** @var AbstractBackupConfigParser $parser */
        $parser = new $parserClassName($fileName);

        $parsedFile = $parser->parseFile();

        self::assertNull($parsedFile);

        $this->deleteFile($fileName);
    }
}
