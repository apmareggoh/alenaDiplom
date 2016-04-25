<?php
/**
 * Created by PhpStorm.
 * User: apmareggoh
 * Date: 07.04.2016
 * Time: 0:55
 */
//$_SERVER['DOCUMENT_ROOT'] = 'Z:/home/laki/';

class Page {
    private $dir;
    public function __construct() {
        $this->dir = $_SERVER['DOCUMENT_ROOT'];

    }

}