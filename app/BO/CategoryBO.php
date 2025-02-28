<?php 
//Category Business Objects (BO)

namespace App\BO;

class CategoryBO
{
    public string $name;
    public ?int $parent_category_id; // Allow null

    public function __construct(string $name, ?int $parent_category_id = null)
    {
        $this->name = $name;
        $this->parent_category_id = $parent_category_id;
    }
}


?>