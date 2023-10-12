# PHP Exporter

phpexport is a library for exporting HTML to PDF, Excel, or DOCX.

## Installation

Use the package manager [composer](https://getcomposer.org/) to install phpexport.

```bash
composer require ryodevz/phpexport
```

## Usage

```php
<?php

use Ryotwell\Phpexport\Support\Facade\Export;

// Init the class
$exporter = new Export;

// The html
$html = '<h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, ratione.</h1>';

// Export to PDF and download
$exporter->makePDF($html)
    ->download('document.pdf'); // This parameter is optional, with the default value of 'filename.pdf'.

// Export to PDF and preview
$exporter->makePDF($html)
    ->preview(); // The method preview() is only available for PDF

// Export to Excel and download
$exporter->makeExcel($html)
    ->download();

// Export to MSWord and download
$exporter->makeWord($html)
    ->download();
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.