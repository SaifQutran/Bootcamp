link
<?php 
    $arrayInPhp = array('first' => 1 , 'second' => 2 , 'third' => 3 , 'fourth' =>4);
    $json = json_encode($arrayInPhp);
    echo $json;
    echo '<br>';
    $objectInPhp = json_decode($json);
    echo $objectInPhp->second;
    $products = [
        'IPhone 14' => 'Mobile',
        'Lenovo yoga 370' => 'Laptop',
        'Samsung galaxy note 20' => 'Mobile',
        'EarPuds pro' => 'Headphone',
        'HyperX 200l' => 'Headset'
    ];
    //print_r("print this string");
    
    file_put_contents('test.json',json_encode($products));
    print_r(json_decode(file_get_contents('test.json')));

?>
