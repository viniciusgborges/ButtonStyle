<?php

namespace Wayne\ButtonStyle\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Wayne\ButtonStyle\Model\Style;

class ButtonStyle extends Command
{
    protected Style $styleModel;

    public function __construct(
        Style $styleModel
    ) {
        $this->styleModel = $styleModel;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('button:style')->addArgument('color');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $color = $input->getArgument('color');

        if ($color != null && strlen($color) == 6) {
            $this->saveColor($color);
            $output->writeln("Style changed");
        } else {
            $output->writeln('Command is with wrong syntax');
        }

        return $this;
    }

    public function saveColor($color)
    {
        $this->styleModel->setColor($color)->save();
    }
}
