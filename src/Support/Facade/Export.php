<?php

namespace Ryodevz\Phpexport\Support\Facade;

use Ryodevz\Phpexport\Support\Excel;
use Ryodevz\Phpexport\Support\MSWord;
use Ryodevz\Phpexport\Support\PDF;

class Export
{
    public function makeExcel($body)
    {
        return new Excel($body);
    }

    public function makePDF($body)
    {
        return new PDF($body);
    }

    public function makeWord($body)
    {
        return new MSWord($body);
    }
}
