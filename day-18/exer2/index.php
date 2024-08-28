    <?php
    class Animal
    {
        const legs = 4;
        public $age;
        public function __construct($age)
        {
            $this->age = $age;
            echo "Constructor in Animal (age : $age)<br>";
        }
        public function speak() {}
        public function move() {}
    }
    class Cat extends Animal
    {
        private $gender;
        public function __construct($gender, $age)
        {
            //parent::__construct($age);
            echo "Constructor in Cat(Gender : $gender) (age : $this->age)<br>";
        }
        public function speak()
        {
            echo "Says Mewo Mewo (3";
        }
        public function move()
        {
            echo "Jumps with " . parent::legs . " Legs";
        }
    }
    class Snake extends Animal
    {
        public function speak()
        {
            echo "Says ssssssssss";
        }
        public function move()
        {
            echo "Crawls";
        }
    }
    class Dog extends Animal
    {
        public function speak()
        {
            echo "Woof Woof!!";
        }
        public function move()
        {
            echo
            "Runs with " . parent::legs . " Legs";
        }
    }
    class Horse extends Animal
    {
        public function speak()
        {
            echo "Says neigh, whinny!!";
        }
        public function move()
        {
            echo
            "Gllops with " . parent::legs . " Legs";
        }
    }
    $f1 = new Animal(5);
    echo get_class($f1) . " ";
    $f1->move();
    echo "<br>";
    echo " and ";
    $f1->speak();
    echo "<br>";
    $f1 = new Horse(10);
    echo get_class($f1) . " ";
    $f1->move();
    echo "<br>";
    echo " and ";
    $f1->speak();
    echo "<br>";
    $f1 = new dog(12);
    echo get_class($f1) . " ";
    $f1->move();
    echo "<br>";
    echo " and ";
    $f1->speak();
    echo "<br>";
    $f1 = new cat('male', 3);
    echo get_class($f1) . " ";
    $f1->move();
    echo "<br>";
    echo " and ";
    $f1->speak();
    echo "<br>";
    $f1 = new snake(5);
    echo get_class($f1) . " ";
    $f1->move();
    echo "<br>";
    echo " and ";
    $f1->speak();
    echo "<br>";
    final class test
    {
        function test()
        {
            echo "in final";
        }
    }
