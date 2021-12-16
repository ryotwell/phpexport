<?php

namespace Ryodevz\Phpexport\Support;

use Dompdf\Dompdf;

class PDF extends PDFConfig
{
    protected $body;

    protected $attachment;

    protected $filename;

    public function __construct($body)
    {
        $this->body = $body;
        $this->config = new PDFConfig;
    }

    public function download($newfilename = 'document.pdf')
    {
        $this->filename = $newfilename;

        return $this->response(1);
    }

    public function preview($newfilename = 'document.pdf')
    {
        $this->filename = $newfilename;

        return $this->response(0);
    }

    protected function response($attachment)
    {
        $this->attachment = $attachment;

        return $this->setup()->stream($this->filename, ['Attachment' => $this->attachment]);
    }

    protected function setup()
    {
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
}
