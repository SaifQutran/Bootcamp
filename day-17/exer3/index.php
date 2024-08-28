<?php
const Pi = 3.141592653589793238462643383279502884197;
class rectangle
{
    private float $height;
    private float $width;
    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    public function setWidth(float $width)
    {
        $this->width = $width;
    }
    public function setHeight(float $height)
    {
        $this->height = $height;
    }
    public function drawRectangle()
    {
        echo "<p class='detail'>The area :<span>" . $this->getArea() . "mm<sup>2</sup></span></p>";
        echo "<p class='detail'>The circumference :<span>" . $this->getCircumference() . "mm</span></p>";
        echo "<div class='shape bg-primary' style='width:" . $this->width . "mm;height:" . $this->height . "mm'></div>";
    }
    public function getArea()
    {
        return $this->width * $this->height;
    }
    public function getCircumference()
    {
        return $this->width * 2 + $this->height * 2;
    }
}
class circle
{
    private float $radius;
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }
    public function setRadius(float $radius)
    {
        $this->radius = $radius;
    }
    public function drawCircle()
    {
        echo "<p class='detail'>The area :<span>" . round($this->getArea(),3) . "mm<sup>2</sup></span></p>";
        echo "<p class='detail'>The circumference :<span>" . round($this->getCircumference(),3) . "mm</span></p>";
        echo "<div class='shape bg-success rounded-circle' style='width:" . $this->radius . "mm;height:" . $this->radius . "mm;'></div>";
    }
    public function getArea()
    {
        return $this->radius **2 * Pi;
    }
    public function getCircumference()
    {
        return $this->radius * 2 * Pi;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="formBox">
        <form action="" method="post" class="circleForm">
            <label class="form-label" for="width">Width</label><input class="form-control mb-3" type="text" name="width" id="width">
            <label class="form-label" for="height">Height</label><input class="form-control mb-3" type="text" name="height" id="height">
            <div class="text-center">
                <input class="btn btn-primary text-center" type="submit" value="create" name="rectangle">
            </div>
        </form>
        <div class="shapContainer border border-2 border-primary mt-3 bg-primary-subtle">
            <?php
            if (isset($_POST['rectangle'])) {
                $tempWidth = is_numeric($_POST['width']) && $_POST['width'] > 0 ? $_POST['width'] : 50;
                $tempHeight = is_numeric($_POST['height']) && $_POST['height'] > 0 ? $_POST['height'] : 50;
                $rect = new rectangle($tempWidth, $tempHeight);
                $rect->drawRectangle();
            }
            ?>
        </div>
    </div>
    <div class="formBox">
        <form action="" method="post" class="rectringleForm">
            <label class="form-label" for="radius">radius</label><input class="form-control mb-3" type="text" name="radius" id="radius">
            <div class="text-center">
                <input type="submit" value="create" class="btn btn-success" name="circle">
            </div>
        </form>
        <div class="shapContainer mt-7 bg-success-subtle border border-2 border-success">
            <?php
            if (isset($_POST['circle'])) {
                $tempRadius = is_numeric($_POST['radius']) && $_POST['radius'] > 0 ? $_POST['radius'] : 50;
                $cir  = new circle($tempRadius);
                $cir->drawCircle();
            } ?>
        </div>
    </div>
</body>
</html>