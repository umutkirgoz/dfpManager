<?php

namespace MynetReklam\DfpManager;

use Illuminate\Config\Repository as Config;

class Repository
{

    private $config;




    public function __construct($configPath)
    {
        $config = require($configPath);

        $this->config = new Config( $config );

    }

    public function getNetworkId(){
        return $this->config->get('networkId');
    }

    public function getSlot($category, $placement){

        try {
            $slotData = $this->config->get('slots.'.$category.'.'.$placement);
        }
        catch (\Exception $e){
            throw new \Exception(self::$errors['SLOT_NOT_FOUND']);
        }

        $ad = new Ad($slotData, ['slotClass' => $this->config->get('slotClass')]);

        $code = $this->getCode($ad);

        return $code;

    }

    private function getCode($ad) {

        $code = '<!-- '.$ad->get('code').' -->'."\n";

        $attribs = [];
        foreach ($ad->getAttribs() as $attribName => $attribValue) {
            $attribs[] = $attribName.'="'.$attribValue.'"';
        }
        $code .= '<div '.implode(' ',$attribs).'></div>';

        return $code;

    }










}