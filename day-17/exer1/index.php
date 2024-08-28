<?php 
class dish{
    private array $ingredients;
    private string $cuisine;
    private float $price;
    public function __construct(array $ingredients, string $cuisine, float $price){
        $this->ingredients = $ingredients;
        $this->cuisine = $cuisine;
        $this->price = $price;
    }
    public function getIngredients() :array {
        return $this->ingredients;
    }
    public function getCuisine() :string {
        return $this->cuisine;
    }
    public function getPrice() :float {
        return $this->price;
    }
    public function setIngredients(array $i)  {
        $this->ingredients = $i;
    }
    public function setCuisine(string $c) {
        $this->cuisine = $c;
    }
    public function setPrice(float $p) {
        $this->price = $p;
    }
    public function cooking(){
        echo "on the Fire";
    }
    public function calCulateQuantity(int $amount){
        return $amount * $this->price;
    }
}
