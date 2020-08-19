<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>Something important</li>
        <li>Something else</li>
    </ul>
    <?php

    $cat = false;
    $name = "Andrew";
    
    if ($cat){
        echo 'Hello $name'; 
    }else{
        echo "That works too $name!";
    }
    
    phpinfo();
    
    ?>
</body>
</html>