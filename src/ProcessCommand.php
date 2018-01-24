<?php

namespace Mapashe;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class ProcessCommand extends Command
{
    protected function configure()
    {
        $this->setName('mapashe:shester');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $total = new Total();
        do {
            $helper = $this->getHelper('question');
            $question = new Question('Fruit Name or names in CSV: ');

            $inputValue = $helper->ask($input, $output, $question);

            $output->writeln("\t".$total->addFruit($inputValue));

        } while(true);
    }
}
