<?php
function render($fileName, $folder = [])
{
    $direction = '/opt/lampp/htdocs/project-php/';
    if ($folder > 1) {
        foreach ($folder as $nameFolder) {
            $direction .= $nameFolder . '/';
        }
    } else {
        $direction .= $folder . '/';
    }
    $direction .= $fileName . '.php';
    require_once $direction;
}
