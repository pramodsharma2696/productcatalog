<?php 
//Category DAO (Data Access Objects)

namespace App\DAO;

class CategoryDAO
{
    public int $id;
    public string $name;
    public int $parent_category_id;
    public string $created_at;
    public string $updated_at;
}

?>