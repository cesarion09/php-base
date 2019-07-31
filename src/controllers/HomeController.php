<?php

namespace App\controllers;
use App\ViewManager;


class HomeController extends Controller
{
      
    public function index()
    {
           $this->viewManager->renderTemplate("index.twig.html");
    }
}
