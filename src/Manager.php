<?php
/**
 * Created by PhpStorm.
 * User: umut
 * Date: 11/11/16
 * Time: 14:48
 */

namespace MynetReklam\DfpManager;

class Manager
{
    const GOOGLE_GPT_URL = 'https://www.googletagservices.com/tag/js/gpt.js';
    const JQUERY_URL =  "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js";


    protected $repository = null;

    protected $networkId = null;


    public function __construct($configPath)
    {
        $this->repository = new Repository($configPath);

        $this->setNetworkId();
    }

    public function getHead(){
        $scripts = [];
        $scripts[] = '<script async="async" src="https://www.googletagservices.com/tag/js/gpt.js"></script>';
        $scripts[] = '<script>var dfpManager = {networkId : "'.$this->networkId.'"};</script>';
        $scripts[] = '<script src="src/assets/js/dfp.js"></script>';

        echo implode("\n\t",$scripts);
    }

    public function locateAd($category, $placement){

        $data = $this->repository->getSlot($category, $placement);

        echo $data;


    }

    private function setNetworkId(){
        $this->networkId = $this->repository->getNetworkId();
    }


}