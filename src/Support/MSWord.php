<?php

namespace Ryodevz\Phpexport\Support;

class MSWord
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

    public function download($newfilename = 'document.docx')
    {
        $this->setBody();
        $this->filename = $newfilename;

        return $this->createDOC();
    }

    protected function createDOC()
    {
        $htd = new HTMLTODOC;

        return $htd->createDoc($this->body, $this->filename, 1);
    }

    protected function setBody()
    {
        if ($this->isHttp) {
            return $this->body = file_get_contents($this->file);
        }

        return $this->body = require $this->file;
    }
}
