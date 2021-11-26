<?php

namespace Ryodevz\Phpexport\Support;

class Excel
{
    protected $file;

    protected $body;

    protected $isHttp;

    protected $filename;

    public function __construct($file, $isHttp)
    {
        $this->file = $file;
        $this->isHttp = $isHttp;
    }

    public function download($newfilename = 'data.xls')
    {
        $this->filename = $newfilename;

        $this->setBody();
        $this->setHeaders();

        return $this->body;
    }

    protected function setBody()
    {
        if ($this->isHttp) {
            return $this->body = file_get_contents($this->file);
        }

        return $this->body = require $this->file;
    }

    protected function setHeaders()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename={$this->filename}");

        return $this;
    }
}
