<?php

namespace App\Controller\Mail\Details;

use App\Controller\Controller;

class DetailsMail extends Controller
{

    public function show(){
       $this->appendCss('inbox/style');
       $this->nameTemplate = 'mail/details/index';
       $this->render();
    }
}
