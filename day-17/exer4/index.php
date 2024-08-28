<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<?php 
class room{
    private float $width;
    private float $length;
    private string $painting;
    public function __construct(float $width,float $length,string $painting = 'white'){
        $this->width= $width;    
        $this->length= $length;    
        $this->painting= $painting;    
    }
    public 
    function getDimentions(){
        return $this->length * $this->width;
    }
}
?>
</html>