<?php

namespace App\Controller\Mail\Inbox;

use App\Controller\Controller;

class Inbox extends Controller
{

    public function index(){
       $this->appendCss('inbox/style');
       if(!empty($_POST)){
        die("Implemente o Login");
       }
       $this->nameTemplate = 'inbox/index';
       $this->render();
    }
}
