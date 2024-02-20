<?php

namespace App\Command;

use App\Config\YamlBackupConfigParser;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'Backup',
    description: 'Core command for backup',
)]
class BackupCommand extends Command
{
    private const CONFIG_FILE_ARGUMENT = 'config_file';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument(self::CONFIG_FILE_ARGUMENT, InputArgument::REQUIRED, 'Backup config file')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $configFile = $input->getArgument(self::CONFIG_FILE_ARGUMENT);

        $configParser = new YamlBackupConfigParser($configFile);

        $io->success('Backup finished successfully');

        return Command::SUCCESS;
    }
}
