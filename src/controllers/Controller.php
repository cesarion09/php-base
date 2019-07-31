<?php

namespace App\controllers;

use App\ViewManager;
use App\DoctrineManager;

abstract class Controller
{

    protected $viewManager;
    protected $doctrineManager;

    public function __construct(ViewManager $viewManager, DoctrineManager $doctrineManager)
    {
        $this->viewManager = $viewManager;
        $this->doctrineManager= $doctrineManager;
    }

    public abstract function index();

    public function redirectTo(string $page)
    {
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF'],'/\\'));
        HEADER("location : http://$$host$uri/$page")
    }


}