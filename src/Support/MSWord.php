<?php

namespace Ryodevz\Phpexport\Support;

class MSWord
{
    protected $body;

    protected $filename;

    public function __construct($body)
    {
        $this->body = $body;
    }

    public function download($newfilename = 'document.docx')
    {
        $this->filename = $newfilename;

        return $this->createDOC();
    }

    protected function createDOC()
    {
        $htd = new HTMLTODOC;

        return $htd->createDoc($this->body, $this->filename, 1);
    }
}
