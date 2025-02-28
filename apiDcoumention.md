# 📌 API Documentation

## 🛍️ Category API

- **Name:** Create Category API
- **URL:** `POST /api/v1/categories`
- **RequestBody:**
    name:Fruits
    parent_category_id:
- **Response:**
{
    "name": "Fruits",
    "parent_category_id": null,
    "updated_at": "2025-02-28T18:41:16.000000Z",
    "created_at": "2025-02-28T18:41:16.000000Z",
    "id": 2
}

- **Name:** Update Category API
- **URL:** `PUT api/v1/categories/2`
- **RequestBody:**
    name:Fruits updated
- **Response:**
{
    "id": 2,
    "name": "Fruits updated",
    "parent_category_id": null,
    "created_at": "2025-02-28T18:41:16.000000Z",
    "updated_at": "2025-02-28T20:35:09.000000Z",
    "deleted_at": null
}

- **Name:** All Category API
- **URL:** `GET api/v1/categories`
- **RequestBody:**
 None
- **Response:**
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Clothes",
            "parent_category_id": null,
            "created_at": "2025-02-28T18:41:04.000000Z",
            "updated_at": "2025-02-28T18:41:04.000000Z",
            "deleted_at": null
        },
        {
            "id": 2,
            "name": "Fruits",
            "parent_category_id": null,
            "created_at": "2025-02-28T18:41:16.000000Z",
            "updated_at": "2025-02-28T18:41:16.000000Z",
            "deleted_at": null
        }
    ],
    "first_page_url": "http://productcatalog.test/api/v1/categories?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://productcatalog.test/api/v1/categories?page=1",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://productcatalog.test/api/v1/categories?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": null,
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "http://productcatalog.test/api/v1/categories",
    "per_page": 10,
    "prev_page_url": null,
    "to": 2,
    "total": 2
}

- **Name:** Single Category API
- **URL:** `GET api/v1/categories/1`
- **RequestBody:**
 None
- **Response:**
{
    "name": "Fruits",
    "parent_category_id": null
}


- **Name:** Delete Category API
- **URL:** `GET api/v1/categories/2`
- **RequestBody:**
 None
- **Response:**
{
    "deleted": true
}




## 🛍️ Product API

- **Name:** Create Product API
- **URL:** `POST api/v1/products`
- **RequestBody:**
    name:Shirt
    description:It is a Shirt
    sku:sku1004
    price:110
    category_id:1
- **Response:**
{
    "name": "Shirt",
    "description": "It is a Shirt",
    "sku": "sku1004",
    "price": 110,
    "category_id": 1,
    "updated_at": "2025-02-28T19:53:43.000000Z",
    "created_at": "2025-02-28T19:53:43.000000Z",
    "id": 4
}


- **Name:** Update Product API
- **URL:** `PUT api/v1/products/2`
- **RequestBody:**
    name:Jeans
    description:It is a Jeans
    sku:sku1002
    price:110
    category_id:1
- **Response:**
{
    "updated": true
}



- **Name:** All Product API
- **URL:** `GET api/v1/products`
- **RequestBody:**
none
- **Response:**
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Mango",
            "description": "It is a Mango",
            "sku": "sku1001",
            "price": "150.00",
            "category_id": 2,
            "created_at": "2025-02-28T19:52:04.000000Z",
            "updated_at": "2025-02-28T19:52:04.000000Z",
            "deleted_at": null
        },
        {
            "id": 2,
            "name": "Jeans",
            "description": "It is a Jeans",
            "sku": "sku1002",
            "price": "110.00",
            "category_id": 1,
            "created_at": "2025-02-28T19:52:47.000000Z",
            "updated_at": "2025-02-28T20:25:19.000000Z",
            "deleted_at": null
        },
        {
            "id": 3,
            "name": "Orange",
            "description": "It is an Orange",
            "sku": "sku1003",
            "price": "120.00",
            "category_id": 2,
            "created_at": "2025-02-28T19:53:17.000000Z",
            "updated_at": "2025-02-28T19:53:17.000000Z",
            "deleted_at": null
        }
    ],
    "first_page_url": "http://productcatalog.test/api/v1/products?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://productcatalog.test/api/v1/products?page=1",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://productcatalog.test/api/v1/products?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": null,
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "http://productcatalog.test/api/v1/products",
    "per_page": 10,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}

- **Name:** Single Product API
- **URL:** `GET api/v1/products/1`
- **RequestBody:**
none
- **Response:**
{
    "name": "Mango",
    "description": "It is a Mango",
    "sku": "sku1001",
    "price": 150,
    "category_id": 2
}


- **Name:** Delete Product API
- **URL:** `GET api/v1/products/2`
- **RequestBody:**
 None
- **Response:**
{
    "deleted": true
}


- **Name:** API Published URL
- **URL:** `https://documenter.getpostman.com/view/33000660/2sAYdhKVvt`
