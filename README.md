# Laravel E-commerce Project

This project is a feature-rich **E-commerce platform** built using Laravel. It includes role-based access control and a clean separation between **Admin** and **User** functionalities. Below are the key features and details:

---

## Features

### 1. **Admin Role**
The Admin has access to the following functionalities:
- **Category Management**
  - Add, Edit, Delete, and View Categories.
  - Organize products under relevant categories.
- **Product Management**
  - Add, Edit, Delete, and View Products.
  - Assign products to specific categories.
- **Role-Based Access**
  - Exclusive admin access to category and product management functionalities.

### 2. **User Role**
The User has access to the following functionalities:
- **Product Browsing**
  - View products by category.
  - Search for products.
- **User Dashboard**
  - Access personalized features (e.g., profile, orders, etc., as applicable).

### 3. **Authentication System**
- User registration and login functionality.
- Secure password hashing and validation.
- Middleware to restrict access based on roles (Admin/User).

---

## Installation

Follow these steps to set up the project:
```

### 2. Install Dependencies
Navigate to the project directory and run:
```bash
composer install
```

### 3. Set Up Environment
Copy the `.env.example` file to `.env`:
```bash
cp .env.example .env
```
Update the following fields in the `.env` file:
- **Database credentials** (DB_DATABASE, DB_USERNAME, DB_PASSWORD)
- **APP_URL**

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Run Migrations and Seeders
Run the migrations to create the database structure and seed the admin user:
```bash
php artisan migrate --seed
```

### 6. Start the Development Server
Start the Laravel development server:
```bash
php artisan serve
```
Access the project at `http://localhost:8000`.

---

## Admin Credentials
Default admin credentials after running seeders:
- **Email**: admin@example.com
- **Password**: password

You can update these credentials after logging in.

---

## Folder Structure
- **app/Models**: Contains models for Category, Product, and User.
- **app/Http/Controllers**: Includes controllers for admin and user functionalities.
- **resources/views**: Blade templates for admin and user interfaces.
- **routes/web.php**: Application routes.

---

## Middleware
Role-based access is managed using middleware:
- **Admin Middleware**: Restricts access to admin features.
- **User Middleware**: Allows only registered users to access user-specific pages.

---

## Future Enhancements
- Add cart and checkout functionality.
- Implement product reviews and ratings.
- Add an order management system for users and admin.

---

## Contributing
Feel free to contribute by submitting a pull request. For major changes, please open an issue first to discuss what you would like to change.

---

## License
This project is open-source and available under the [MIT License](LICENSE).

