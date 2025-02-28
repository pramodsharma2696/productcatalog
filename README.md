# **Product Catalog API**

This is a RESTful API built with Laravel to manage a product catalog. It supports CRUD operations, filtering, search and rate limiting.

---

## **Features**

✅ **Product & Category Management:** Full CRUD operations  
✅ **Request Validation:** Ensures data integrity  
✅ **Business Objects (BO):** Used for data transfer  
✅ **Data Access Objects (DAO):** Handles data access  
✅ **Service & Repository Pattern:** Decouples business logic and database access  
✅ **API Versioning:** `/api/v1/` for future scalability  
✅ **Search & Filtering:** Search products by name/description, filter by category   
✅ **Rate Limiting:** 60 requests per minute per user  
✅ **Unit & Feature Testing:** Ensures API reliability  
✅ **Postman API Documentation:** Simplifies API usage  

---

## **System Requirements**
- PHP >= 8.1
- Laravel >= 10
- Composer
- MySQL
- Redis (for caching, optional)
- Postman (for API testing, optional)
- Laragon/XAMPP (for local development, optional)

---

## **Setup & Installation**

### **1. Clone the Repository**
```bash
git clone https://github.com/pramodsharma2696/productcatalog.git
cd productcatalog
```

### **2. Install Dependencies**
```bash
composer install
```

### **3. Configure Environment**
1. Copy `.env.example` to `.env`
   ```bash
   cp .env.example .env
   ```
2. Generate the application key
   ```bash
   php artisan key:generate
   ```

### **4. Set Up the Database**
1. Update `.env` with your database credentials:
   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=product_catalog
   DB_USERNAME=root
   DB_PASSWORD=
   ```
2. Run migrations to create database tables:
   ```bash
   php artisan migrate
   ```

### **5. Start the Development Server**
```bash
php artisan serve
```
The API will be accessible at: `http://127.0.0.1:8000`

If using Laragon, a virtual link will be generated (e.g., `http://abc.test`).

---

## **API Endpoints**

### **Categories**
| Method | Endpoint                     | Description                 |
|--------|------------------------------|-----------------------------|
| GET    | `/api/v1/categories`         | List all categories        |
| POST   | `/api/v1/categories`         | Create a new category      |
| GET    | `/api/v1/categories/{id}`    | Get a single category      |
| PUT    | `/api/v1/categories/{id}`    | Update an existing category |
| DELETE | `/api/v1/categories/{id}`    | Delete a category          |

### **Products**
| Method | Endpoint                      | Description                 |
|--------|-------------------------------|------------------------------|
| GET    | `/api/v1/products`            | List all products            |
| POST   | `/api/v1/products`            | Create a new product         |
| GET    | `/api/v1/products/{id}`       | Get a single product         |
| PUT    | `/api/v1/products/{id}`       | Update an existing product   |
| DELETE | `/api/v1/products/{id}`       | Delete a product             |
| GET    | `/api/v1/products?search=Orange` | Search products by name, description, or SKU |
| GET    | `/api/v1/products?category_id=1` | Filter products by category  |

---

## **Testing**

Run feature and unit tests using PHPUnit:
```bash
php artisan test
```
Run specific tests:
```bash
php artisan test --filter CategoryServiceTest
php artisan test --filter CategoryTest
php artisan test --filter ProductServiceTest
php artisan test --filter ProductTest
```

### **Testing Environment Setup**
Ensure you have a `.env.testing` file in your project root with the correct database configuration:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=testing_db
DB_USERNAME=root
DB_PASSWORD=
```
Run database migrations specifically for testing:
```bash
php artisan migrate --env=testing
```
To refresh the test database before running tests:
```bash
php artisan migrate:fresh --env=testing
```

---

### **Clear Application Cache**
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

---

## **Deployment**
1. Set up your production server with PHP, MySQL, and Composer.
2. Clone the repository and configure `.env`.
3. Run migrations and optimizations:
   ```bash
   php artisan migrate --force
   php artisan config:cache
   php artisan route:cache
   ```
4. Use Supervisor to manage queue workers for background tasks.
5. Set up a cron job for Laravel Scheduler:
   ```bash
   * * * * * php /path-to-project/artisan schedule:run >> /dev/null 2>&1
   ```

---

## **API Documentation**
You can use **Postman** to import the API collection:
- **Postman Collection URL:** [Postman Collection](https://documenter.getpostman.com/view/33000660/2sAYdhKVvt)
- Run tests and explore API responses easily.

---

## **License**
This project is open-source under the [MIT License](LICENSE).

---

## **Author**
👨‍💻 **Pramod Sharma**  
[GitHub](https://github.com/pramodsharma2696)  
[Published API Link](https://documenter.getpostman.com/view/33000660/2sAYdhKVvt)  

---

Feel free to contribute, raise issues, or improve this project! 🚀

