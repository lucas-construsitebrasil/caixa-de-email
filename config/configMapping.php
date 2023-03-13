<?php

/* Mapa de rotas para páginas logadas */

$mapLoggedIn = array(
    'home' => array('Mail\Inbox\Inbox', 'index'),
    'details' => array('Mail\Details\DetailsMail', 'show'),

);

/* Mapa de rotas para páginas logadas via AJAX */

$mapAjaxLoggedIn = array(
);

/* Mapa de rotas para páginas NAO logadas */
$map = array(
    'login' => array('Login\Login', 'index'),
    'listagem-tarefas' => array('Task\Task', 'index'),

);
 