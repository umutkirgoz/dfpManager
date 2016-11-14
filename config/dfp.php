<?php
/**
 * Created by PhpStorm.
 * User: umut
 * Date: 11/11/16
 * Time: 14:47
 */

return [
    'networkId' =>  '28687765',
    'slotClass' =>  'my-dfp',
    'mappings' => [

    ],
    'slots' =>  [
        'anasayfa'  => [
            'sidebar-1' => [
                'code'  => '01_Mynet_AnaSayfa_Genel_SideBar_300x250_1',
                'sizes' => [
                    '300,250',
                    '300,600'
                ],
                'type'  =>  'normal',
                'lazyload'  =>  true,
                'endless' => false,
                'mapping' => '',
                'class' => 'aaa'
            ],
            'toproll' => [
                'code'  => '01_Mynet_AnaSayfa_Genel_RichMedia_Toproll_1',
                'sizes' => [
                    '970,250'
                ],
                'type'  =>  'normal',
                'lazy'  =>  false,
                'endless' => false,
                'mapping' => ''
            ],
            'mansetkutu1' => [
                'code'  => '01_Mynet_AnaSayfa_Genel_Advertorial_MansetKutu_1',
                'type'  =>  'oop',
                'lazy'  =>  false,
                'endless' => false,
                'mapping' => ''
            ]
        ],







    ]

];