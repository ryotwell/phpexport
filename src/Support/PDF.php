<?php

namespace Ryodevz\Phpexport\Support;

use Dompdf\Dompdf;

class PDF extends PDFConfig
{
    protected $file;

    protected $body;

    protected $isHttp;

    protected $attachment;

    protected $filename = 'document.pdf';

    public function __construct($file, $isHttp)
    {
        $this->file = $file;
        $this->isHttp = $isHttp;
        $this->config = new PDFConfig;
    }

    public function download($newfilename = 'document.pdf')
    {
        $this->filename = $newfilename;

        return $this->response(1);
    }

    public function view()
    {
        return $this->response(0);
    }

    protected function response($attachment)
    {
        $this->attachment = $attachment;

        return $this->setup()->stream($this->filename, ['Attachment' => $this->attachment]);
    }

    protected function setup()
    {
        $this->setBody();

        $dompdf = $this->domPDF();
        $dompdf->loadHtml($this->body);
        $dompdf->setPaper('A4', $this->configViewType);
        $dompdf->render();

        return $dompdf;
    }

    protected function domPDF()
    {
        return new Dompdf;
    }

    protected function setBody()
    {
        if ($this->isHttp) {
            return $this->body = file_get_contents($this->file);
        }

        return $this->body = require $this->file;
    }
}
