<?php
namespace  App\controllers;

class WhereController extends Controller
{
    public function index()
    {
        $this->viewManager->renderTemplate('where.twig.html');
    }

}