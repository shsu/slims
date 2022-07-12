<?php
/**
 * @Created by          : Waris Agung Widodo (ido.alit@gmail.com)
 * @Date                : 24/03/20 11.21
 * @File name           : autoload.php
 *
 * Original source code : https://stackoverflow.com/a/39774973
 */

$namespaces = [
    "SLiMS\\" => "/",
    "Volnix\\CSRF\\" => "/csrf/src/",
    "Psr\\SimpleCache\\" => "/psr/simple-cache/src/",
    "PhpOffice\\PhpSpreadsheet\\" => "/phpoffice/phpspreadsheet/src/PhpSpreadsheet/",
    "Ramsey\\Uuid\\" => "/uuid/src/",
    "Ramsey\\Collection\\" => "/collection/src/",
    "Brick\\Math\\" => "/math/src/",
    "Ifsnop\\Mysqldump\\" => "/mysqldump-php/src/Ifsnop/Mysqldump/",
    "PHPMailer\\PHPMailer\\" => "/PHPMailer/src/",
    "GuzzleHttp" => "/guzzlehttp/guzzle/src",
    "GuzzleHttp\\Psr7\\" => "/guzzlehttp/psr7/src",
    "GuzzleHttp\\Exception\\" => "/guzzle/src/",
    "GuzzleHttp\Promise" => "/guzzlehttp/promises/src",
    "Psr\\Http\\Message\\" => "/psr/http-message/src",
    "Psr\\Http\\Client\\" => "/psr/http-client/src",
    "Complex\\" => "/markbaker/comples/classes/src/",
    "Matrix\\" => "/markbaker/matrix/classes/src/",
    "MyCLabs\\Enum\\" => "/myclabs/php-enum/src/",
    "Symfony\\Polyfill\\Mbstring\\" => "/symfony/polyfill-mbstring/",
    "Symfony\\Component\\Translation\\" => "/symfony/translation/",
    "Symfony\\Component\VarDumper\\" => "/symfony/var-dumper/",
    "Symfony\\Contracts\\Translation\\" => "/symfony/translation-contracts/",
    "ZipStream\\" => "/maennchen/zipstream-php/src/",
    "Carbon\\" => "/nesbot/carbon/src/Carbon/"

];

foreach ($namespaces as $namespace => $classpaths) {
    if (!is_array($classpaths)) {
        $classpaths = array($classpaths);
    }
    spl_autoload_register(function ($classname) use ($namespace, $classpaths) {
        if (preg_match("#^" . preg_quote($namespace) . "#", $classname)) {
            $classname = str_replace($namespace, "", $classname);
            $filename = preg_replace("#\\\\#", "/", $classname) . ".php";
            foreach ($classpaths as $classpath) {
                $fullpath = __DIR__ . "/" . $classpath . "/$filename";
                if (file_exists($fullpath)) include_once $fullpath;
            }
        }
    });
}

/*
 |--------------------------------------------------------------------------
 | Load library with self autoload
 |--------------------------------------------------------------------------
 */
// Ezyang
include "ezyang/htmlpurifier/library/HTMLPurifier.auto.php";
// Symfony
include "symfony/polyfill-mbstring/bootstrap.php";
// Nesbot legacy function
include "nesbot/carbon/legacy.func.php";
// Var-dumper
// Load the global dump() function
include 'symfony/var-dumper/Resources/functions/dump.php';