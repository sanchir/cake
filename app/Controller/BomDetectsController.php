<?php
App::uses('AppController', 'Controller');
/**
 * BomDetects Controller
 *
 */
class BomDetectsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;
    
    // Removes BOM (Byte order mark) from file (if necessary)
    function bomStrip( path, output )
    {
        $bufsize = 65536;
        $utf8bom = "\xef\xbb\xbf";

        $inf = fopen(path, r);
        $outf = fopen(output, w);

        $buf = fread($inf, strlen($utf8bom));
        if ($buf != $utf8bom)
        {
            fwrite($outf, $buf);
        }
        if ($buf == "")
        {
            exit();
        }
        while (true)
        {
            $buf = fread($inf, $bufsize);
            if ($buf == "")
            {
                exit();
            }
            fwrite($outf, $buf);
        }
    } 
}
