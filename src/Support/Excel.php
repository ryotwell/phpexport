<?php

namespace Ryotwell\Phpexport\Support;

class Excel
{
    protected $body;

    protected $filename;

    public function __construct($body)
    {
        $this->body = $body;
    }

    public function download($newfilename = 'data.xls')
    {
        $this->filename = $newfilename;

        return $this->response();
    }

    protected function response()
    {
        $this->setHeaders();

        echo $this->body;
    }

    protected function setHeaders()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename={$this->filename}");
    }
}
