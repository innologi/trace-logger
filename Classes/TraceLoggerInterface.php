<?php
namespace Innologi\TraceLogger;

/**
 * Importer Logger interface
 *
 * @package TraceLogger
 * @author Frenck Lutke
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 2 or later
 */
interface TraceLoggerInterface
{

    /**
     * Returns Log Level
     *
     * @return integer
     */
    public function getLevel(): int;

    /**
     * Sets Log Level
     *
     * @param integer $level
     * @return void
     */
    public function setLevel(int $level): void;

    /**
     * Returns trace of given depth
     *
     * @param integer $depth
     * @return array
     */
    public function getTrace(int $depth = 1): array;

    /**
     * Logs trace
     *
     * @return void
     */
    public function logTrace(): void;
}
