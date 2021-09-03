<?php
/**
 *
 * @package Vendor_Module
 */

namespace Vendor\Module\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Vendor\Module\Model\Calculator;

class TestCommand extends Command
{
    /**
     * @var Calculator
     */
    protected $calculator;

    /**
     * {@inheritdoc}
     */
    public function __construct(Calculator $calculator, string $name = null)
    {
        $this->calculator = $calculator;
        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('test:plugin:calculate')
            ->setDescription('Test Plugin');
        parent::configure();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $output->writeln($this->calculator->calculate(1, 1));

            return \Magento\Framework\Console\Cli::RETURN_SUCCESS;
        } catch (\Exception $e) {
            $output->writeln('<error>' . $e->getMessage() . '</error>');
            if ($output->getVerbosity() >= OutputInterface::VERBOSITY_VERBOSE) {
                $output->writeln($e->getTraceAsString());
            }

            return \Magento\Framework\Console\Cli::RETURN_FAILURE;
        }
    }
}
