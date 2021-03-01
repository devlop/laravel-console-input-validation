<?php

declare(strict_types=1);

namespace Devlop\Laravel\Console;

use InvalidArgumentException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

trait ValidateInput
{
    /**
     * Validate the console command input.
     *
     * @throws InvalidArgumentException
     */
    protected function validate(InputInterface $input) : void
    {
        //
    }

    /**
     * Execute the console command.
     */
    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        try {
            $this->validate($input);
        } catch (InvalidArgumentException $e) {
            $this->error($e->getMessage());

            return 1;
        }

        return parent::execute($input, $output);
    }
}
