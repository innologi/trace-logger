<?php
namespace Innologi\TraceLogger;

/**
 * SymfonyStyle Trace Logger
 * 
 * Use this implementation only if you also have access to the symfony/console package.
 *
 * @package TraceLogger
 * @author Frenck Lutke
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 2 or later
 */
class SymfonyStyleLogger extends TraceLoggerAbstract
{

    /**
     *
     * @var \Symfony\Component\Console\Style\SymfonyStyle
     */
    protected $io;

    /**
     * Constructor
     *
     * @param mixed $concreteLogger
     * @return void
     */
    public function __construct($concreteLogger)
    {
        $this->io = $concreteLogger;
        $this->level = $this->io->getVerbosity() / 32;
    }

    /**
     *
     * {@inheritdoc}
     * @see TraceLoggerInterface::logTrace()
     */
    public function logTrace(): void
    {
        $trace = $this->getTrace(2);
        $this->io->writeln($trace['call']);
        foreach ($trace['args'] as $arg) {
            $this->io->writeln($arg);
        }
    }
}
