# 📌 API Documentation

## 🛍️ Category API

### **1️⃣ Create Category API**
- **Method:** `POST`
- **URL:** `/api/v1/categories`
- **Request Body:**
  ```json
  {
    "name": "Fruits",
    "parent_category_id": null
  }
  ```
- **Response:**
  ```json
  {
    "name": "Fruits",
    "parent_category_id": null,
    "updated_at": "2025-02-28T18:41:16.000000Z",
    "created_at": "2025-02-28T18:41:16.000000Z",
    "id": 2
  }
  ```

---

### **2️⃣ Update Category API**
- **Method:** `PUT`
- **URL:** `/api/v1/categories/2`
- **Request Body:**
  ```json
  {
    "name": "Fruits updated"
  }
  ```
- **Response:**
  ```json
  {
    "id": 2,
    "name": "Fruits updated",
    "parent_category_id": null,
    "created_at": "2025-02-28T18:41:16.000000Z",
    "updated_at": "2025-02-28T20:35:09.000000Z",
    "deleted_at": null
  }
  ```

---

### **3️⃣ Get All Categories API**
- **Method:** `GET`
- **URL:** `/api/v1/categories`
- **Response:**
  ```json
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
    ]
  }
  ```

---

### **4️⃣ Get Single Category API**
- **Method:** `GET`
- **URL:** `/api/v1/categories/1`
- **Response:**
  ```json
  {
    "name": "Fruits",
    "parent_category_id": null
  }
  ```

---

### **5️⃣ Delete Category API**
- **Method:** `DELETE`
- **URL:** `/api/v1/categories/2`
- **Response:**
  ```json
  {
    "deleted": true
  }
  ```

---

## 🛒 Product API

### **1️⃣ Create Product API**
- **Method:** `POST`
- **URL:** `/api/v1/products`
- **Request Body:**
  ```json
  {
    "name": "Shirt",
    "description": "It is a Shirt",
    "sku": "sku1004",
    "price": 110,
    "category_id": 1
  }
  ```
- **Response:**
  ```json
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
  ```

---

### **2️⃣ Update Product API**
- **Method:** `PUT`
- **URL:** `/api/v1/products/2`
- **Request Body:**
  ```json
  {
    "name": "Jeans",
    "description": "It is a Jeans",
    "sku": "sku1002",
    "price": 110,
    "category_id": 1
  }
  ```
- **Response:**
  ```json
  {
    "updated": true
  }
  ```

---

### **3️⃣ Get All Products API**
- **Method:** `GET`
- **URL:** `/api/v1/products`
- **Response:**
  ```json
  {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "name": "Mango",
        "description": "It is a Mango",
        "sku": "sku1001",
        "price": "150.00",
        "category_id": 2
      },
      {
        "id": 2,
        "name": "Jeans",
        "description": "It is a Jeans",
        "sku": "sku1002",
        "price": "110.00",
        "category_id": 1
      }
    ]
  }
  ```

---

### **4️⃣ Get Single Product API**
- **Method:** `GET`
- **URL:** `/api/v1/products/1`
- **Response:**
  ```json
  {
    "name": "Mango",
    "description": "It is a Mango",
    "sku": "sku1001",
    "price": 150,
    "category_id": 2
  }
  ```

---

### **5️⃣ Delete Product API**
- **Method:** `DELETE`
- **URL:** `/api/v1/products/2`
- **Response:**
  ```json
  {
    "deleted": true
  }
  ```

---

### 📌 **API Documentation Published URL**
📍 [Postman Documentation](https://documenter.getpostman.com/view/33000660/2sAYdhKVvt)

