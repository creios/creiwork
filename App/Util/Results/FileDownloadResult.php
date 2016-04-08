<?php
namespace Creios\Creiwork\Util\Results;

class FileDownloadResult extends Result
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }
}
