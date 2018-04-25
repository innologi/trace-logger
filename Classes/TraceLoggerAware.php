<?php
namespace Innologi\TraceLogger;

/**
 * Trace Logger Aware trait
 *
 * @package TraceLogger
 * @author Frenck Lutke
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 2 or later
 */
trait TraceLoggerAware {

    /**
     *
     * @var TraceLoggerInterface
     */
    protected $logger;

    /**
     * Sets logger
     *
     * @param TraceLoggerInterface $logger
     * @return void
     */
    public function setLogger(TraceLoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}
