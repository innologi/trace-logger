<?php
namespace Innologi\TraceLogger;

/**
 * Trace Logger Abstract
 *
 * @package TraceLogger
 * @author Frenck Lutke
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 2 or later
 */
abstract class TraceLoggerAbstract implements TraceLoggerInterface
{

    /**
     *
     * @var integer
     */
    protected $level = 0;

    /**
     *
     * {@inheritdoc}
     * @see TraceLoggerInterface::getLevel()
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     *
     * {@inheritdoc}
     * @see TraceLoggerInterface::setLevel()
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     *
     * {@inheritdoc}
     * @see TraceLoggerInterface::getTrace()
     */
    public function getTrace(int $depth = 1): array
    {
        $traceEntry = [
            'call' => '',
            'args' => []
        ];
        
        $e = new \Exception();
        $trace = $e->getTrace();
        $caller = $trace[$depth];
        $traceEntry['call'] = substr($caller['class'], strrpos($caller['class'], '\\') + 1) . $caller['type'] . $caller['function'] . ':' . $caller['line'];
        foreach ($caller['args'] as $index => $arg) {
            $argString = '  [' . $index . '] ';
            if (is_array($arg)) {
                $argString .= json_encode($arg, JSON_UNESCAPED_SLASHES);
            } elseif (is_object($arg)) {
                $argString .= (new \ReflectionClass($arg))->getShortName();
                if (method_exists($arg, 'getUid')) {
                    $argString .= ':' . $arg->getUid();
                }
            } else {
                $argString .= $arg;
            }
            $traceEntry['args'][] = $argString;
        }
        
        return $traceEntry;
    }
}
