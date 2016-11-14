<?php

use MynetReklam\DfpManager\Manager;

require __DIR__ . '/vendor/autoload.php';

$dfpManager = new Manager('config/dfp.php');



?>
<!
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>DFP Manager Test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <?php $dfpManager->getHead();?>
</head>
<body>


<?php $dfpManager->locateAd('anasayfa', 'sidebar-1');?>
</body>
</html>
