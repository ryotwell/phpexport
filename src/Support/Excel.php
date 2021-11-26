<?php

namespace Ryodevz\Phpexport\Support;

class Excel
{
    protected $file;

    protected $body;

    protected $filename;

    public function __construct($file)
    {
        $this->file = $file;
        $this->body = require $file;
    }

    public function download($newfilename = 'data.xls')
    {
        $this->filename = $newfilename;
        $this->setHeaders();

        return $this->body;
    }

    public function setHeaders()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename={$this->filename}");

        return $this;
    }
}
