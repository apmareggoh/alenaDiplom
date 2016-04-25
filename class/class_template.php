<?php
/**
 * Created by PhpStorm.
 * User: apmareggoh
 * Date: 07.04.2016
 * Time: 0:55
 */
$_SERVER['DOCUMENT_ROOT'] = 'Z:/home/laki/www';

class Page {
    private $dir;
    public function __construct() {
        $this->dir = $_SERVER['DOCUMENT_ROOT'];
        require_once($this->dir . '/content/header.php');
        require_once($this->dir . '/static/main.php');
        require_once($this->dir . '/content/footer.php');
    }

}