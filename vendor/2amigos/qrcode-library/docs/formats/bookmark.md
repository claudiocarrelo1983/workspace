BookMarkFormat
--------------

This format is actually how NTT DoCoMo readers understand a URL. If you wish to add a regular URL is enough to write it 
as `https://2am.tech` even though some have been found with prefixed `URLTO:`. 

The MEBKM bookmark format exists to express not only a URL but a title. 

Usage
-----

```php 

use Da\QrCode\QrCode;
use Da\QrCode\Format\BookmarkFormat; 

$format = new BookMarkFormat(['title' => '2amigos', 'url' => 'http://2am.tech']);

$qrCode = new QrCode($format);

header('Content-Type: ' . $qrCode->getContentType());

echo $qrCode->writeString();

```

© [2amigos](https://2am.tech/) 2013-2023