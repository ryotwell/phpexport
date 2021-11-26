<?php

namespace Ryodevz\Phpexport\Support\Facade;

use Ryodevz\Phpexport\Support\Excel;
use Ryodevz\Phpexport\Support\MSWord;
use Ryodevz\Phpexport\Support\PDF;

class Export
{
    public function makeExcel(string $file, bool $isHttp = false)
    {
        return new Excel($file, $isHttp);
    }

    public function makePDF(string $file, bool $isHttp = false)
    {
        return new PDF($file, $isHttp);
    }

    public function makeWord(string $file, bool $isHttp = false)
    {
        return new MSWord($file, $isHttp);
    }
}
