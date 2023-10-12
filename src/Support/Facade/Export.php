<?php

namespace Ryotwell\Phpexport\Support\Facade;

use Ryotwell\Phpexport\Support\Excel;
use Ryotwell\Phpexport\Support\MSWord;
use Ryotwell\Phpexport\Support\PDF;

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
