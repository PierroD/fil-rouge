<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Renderer
 *
 * @author aurelio
 */
class Renderer
{


    public static function render(string $file, array $data = null)
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . $file . ".Template.php";
        ob_start();
        if ($data != null) {
            extract($data);
        }
        include_once $path;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
