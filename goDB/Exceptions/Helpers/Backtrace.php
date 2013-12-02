<?php

namespace go\DB\Exceptions\Helpers;

class Backtrace
{
    /**
     * @param array $realtrace
     * @param string $prefix
     */
    public function __construct(array $realtrace, $prefix)
    {
        $trace = array();
        foreach (\array_reverse($realtrace) as $item) {
            $trace[] = $item;
            if ((!empty($item['class'])) && (\strpos($item['class'], $prefix) === 0)) {
                $this->trace = \array_reverse($trace);
                $this->file = isset($item['file']) ? $item['file'] : null;
                $this->line = isset($item['line']) ? $item['line'] : null;
                return;
            }
        }
        $this->file = isset($item['file']) ? $item['file'] : null;
        $this->line = isset($item['line']) ? $item['line'] : null;
    }

    /**
     * @return array
     */
    public function getTrace()
    {
        return $this->trace;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return line
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @var array
     */
    private $trace;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $line;
}