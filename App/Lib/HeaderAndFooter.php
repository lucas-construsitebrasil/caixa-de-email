<?php

namespace App\Lib;

class HeaderAndFooter
{

    private static $instance;
    private $title, $pureTitle;
    private $scripts = array('header' => array(), 'footer' => array());
    private $h1, $additionalInfo;

    static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new HeaderAndFooter();
        }
        return self::$instance;
    }

    public function setTitle($title)
    {
        $this->pureTitle = $title;
        $this->title = $title . ' | ' . NAME_APP;
    }

    public function appendTitle($append)
    {
        $this->setTitle($this->getPureTitle() . $append);
    }

    function getPureTitle()
    {
        return $this->pureTitle;
    }

    public function getTitle()
    {
        return $this->title != '' ? $this->title : NAME_APP;
    }


    private function validateLocalScript($local)
    {
        if (!in_array($local, array('header', 'footer'))) {
            throw new \Exception('param @local deve ser header OU footer apenas');
        }
    }

    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }

    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    public function addScript($src, $local = 'footer', $type = 'text/javascript')
    {
        $this->validateLocalScript($local);
        $this->scripts[$local][] = array(
            'src' =>  BASE . 'view/assets/js/' . $src,
            'type' => $type
        );
    }

    public function addScriptExternal($src, $local = 'footer', $type = 'text/javascript')
    {
        $this->validateLocalScript($local);
        $this->scripts[$local][] = array(
            'src' => $src,
            'type' => $type
        );
    }


    public function getScripts($local = 'header')
    {
        $out = '';
        $this->validateLocalScript($local);
        if ($local == 'header') {
            $out .= '  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>';
            $out .= '<script type="text/javascript">WebFont.load({  google: {    families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Roboto:300,regular,500,700,900"]  }});</script>';
            $out .= '<script type="text/javascript" src="' . BASE . 'view/assets/js/plugins/jquery-1.9.1.min.js"></script>';
            $out .= '<script type="text/javascript" src="' . BASE . 'view/assets/js/plugins/jquery.validate.js"></script>';
            $out .= '<script type="text/javascript" src="' . BASE . 'view/assets/js/plugins/jquery.validate.additional-methods.js"></script>';
            $out .= '<script type="text/javascript" src="' . BASE . 'view/assets/js/plugins/sweetAlert2.js"></script>';
            $out .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">';
        }
        if ($local == 'footer') {
            $out .=  '<script type="text/javascript" src="' . BASE . 'view/assets/js/plugins/fontAwensome-5.1.js"></script>';
            $out .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />';
            $out .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>';
            $out .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
            integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
            foreach ($this->scripts[$local] as $value) {
                $out .= '<script src="' . $value['src'] . '.js"' . '" type="' . $value['type'] . '"></script>';
            }


            return $out;
        }
    }
}
