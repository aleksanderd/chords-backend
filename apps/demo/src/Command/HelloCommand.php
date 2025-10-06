<?php

declare(strict_types=1);

namespace App\Command;

use Chords\User\Domain\Service\UserService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:hello',
    description: 'Простая команда, выводящая приветствие.',
)]
class HelloCommand extends Command
{
    public function __construct(
        private readonly UserService $userService)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $res = $this->userService->test();
        $output->writeln('test: ' . $res);

        return Command::SUCCESS;
    }
}
