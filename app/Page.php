<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model{

    private $id;
    private $code;
    private $captionEn;
    private $captionRu;
    private $captionUa;
    private $imageurl;
    private $introEn;
    private $introRu;
    private $introUa;
    private $textEn;
    private $textRu;
    private $textUa;
    private $parentCode;
    private $orderNum;
    private $orderType;
    private $containerType;

    private $lang;

    public $timestamps = false;

    
}