<?php 
//Product Business Objects (BO)

namespace App\BO;

class ProductBO
{
    public string $name;
    public string $description;
    public string $sku;
    public float $price;
    public int $category_id;

    public function __construct(string $name, string $description, string $sku, float $price, int $category_id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->sku = $sku;
        $this->price = $price;
        $this->category_id = $category_id;
    }
}




?>