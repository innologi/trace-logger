<?php
namespace Innologi\TraceLogger;

/**
 * Trace Logger Aware interface
 *
 * @package TraceLogger
 * @author Frenck Lutke
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 2 or later
 */
interface TraceLoggerAwareInterface
{

    /**
     * Sets logger
     *
     * @param TraceLoggerInterface $logger
     * @return void
     */
    public function setLogger(TraceLoggerInterface $logger): void;
}
