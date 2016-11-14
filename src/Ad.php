<?php

namespace MynetReklam\DfpManager;

class Ad {

    private $_data;
    private $_params;
    private $_attribs = [];


    private $code = null;
    private $sizes = null;
    private $id = null;
    private $type = null;
    private $lazyload = false;
    private $endless = false;
    private $class = null;


    public function __construct($data, $params)
    {

        $this->_data = $data;
        $this->_params = $params;


        $this->setCode();
        $this->setSizes();
        $this->setType();
        $this->setClass();
        $this->setEndless();
        $this->setLazyLoad();
        $this->setId();

    }

    public function get($key, $default = null){
        return property_exists($this, $key) ? $this->$key : $default;
    }

    public function getAttribs(){
        return $this->_attribs;
    }

    private function setCode(){
        if (empty($this->_data['code'])){
            throw new Exception(self::$errors['SLOT_CODE_NOT_FOUND']);
        }
        $this->code = $this->_data['code'];

        $this->_attribs['data-code'] = $this->code;

    }

    private function setSizes(){
        if (empty($this->_data['sizes'])){
            throw new Exception(self::$errors['SLOT_SIZES_NOT_FOUND']);
        }
        $this->sizes = implode('|',$this->_data['sizes']);

        $this->_attribs['data-sizes'] = $this->sizes;
    }

    private function setType(){
        if (empty($this->_data['type'])){
            throw new Exception(self::$errors['SLOT_TYPE_NOT_DEFINED']);
        }
        $this->type = $this->_data['type'];

        $this->_attribs['data-type'] = $this->type;
    }

    private function setClass(){
        $class = [];
        if (isset($this->_params['globalClass'])){
            $class[] = $this->_params['globalClass'];
        }
        if (!empty($this->_data['class'])){
            $class[] = $this->_data['class'];
        }

        $this->class = implode(' ',$class);

        $this->_attribs['class'] = $this->class;
    }

    private function setEndless(){
        if (!empty($this->_data['endless']) && $this->_data['endless'] === true){
            $this->endless = true;

            $this->_attribs['data-endless'] = $this->endless;
        }
    }

    private function setLazyLoad(){
        if (!empty($this->_data['lazyload']) && $this->_data['lazyload'] === true){
            $this->lazyload = true;

            $this->_attribs['data-lazyload'] = $this->lazyload;
        }
    }

    private function setId(){
        $this->id= (isset($this->_data['endless']) && $this->_data['endless'] === true) ? md5($this->code.rand()) : md5($this->code);

        $this->_attribs['id'] = $this->id;
    }


}