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

    public function getJsonConfig(){
        $dfpManager = [
            'networkId'     =>  $this->config->get('networkId'),
            'globalClass'   =>  $this->config->get('globalClass')
        ];

        return 'var dfpManager = '.json_encode($dfpManager);
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

        $ad = new Ad($slotData, ['globalClass' => $this->config->get('globalClass')]);

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