# Media Admin

A Laravel-based admin system for managing media products including movies, games, vinyl records and books.

## Quick Start (for demo)

```bash
# 1. Clone the repository
git clone https://github.com/EddieJohanssonn3000/media-admin.git
cd media-admin/media-admin

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Setup database and seed with test data
-- If database is not created automatically: touch database/database.sqlite 
php artisan migrate:fresh --seed

# 5. Build assets
npm run build

# 6. Start the server
php artisan serve
```

Open given localhost.


---

## Login Credentials

| Field    | Value          |
|----------|----------------|
| Email    | admin@test.com |
| Password | 123            |

---

## Features

### Authentication
- ✅ Secure login/logout
- ✅ Protected routes (must be logged in to access products)
- ✅ Dashboard with welcome message

### Products (CRUD)
- ✅ View all products in a table
- ✅ Add new products (title, type, category, price, year, stock, description)
- ✅ Edit existing products
- ✅ Delete products with confirmation dialog

### Filtering
- ✅ Filter by type (Movie, Game, Vinyl, Book)
- ✅ Filter by category
- ✅ Filter by price range (min/max)
- ✅ Filters can be combined

### User Experience
- ✅ Stock warning ⚠ when product is out of stock (stock = 0)
- ✅ Clean navigation between pages

### Accessibility (A11Y)
- ✅ ARIA labels on navigation and forms
- ✅ Keyboard navigation support (Tab through all elements)
- ✅ Focus indicators for keyboard users
- ✅ Error messages with visual indicators (red border)
- ✅ High contrast colors (WCAG compliant)
- ✅ Semantic HTML structure

---

## Testing the System

### Basic Flow
1. Login with credentials above
2. View dashboard → Click "Go to Products"
3. Browse products in table
4. Try filtering by type, category, or price
5. Add a new product
6. Edit an existing product
7. Delete a product (confirm dialog appears)
8. Logout

### Accessibility Testing
- Press `Tab` to navigate through the page
- Zoom to 200% - layout should not break
- Check that all form errors are visible

### Edge Cases
- Try submitting empty form → validation errors appear
- Filter to show products with stock = 0 → warning icon ⚠ appears

---

## Tech Stack

| Technology | Purpose           |
|------------|-------------------|
| Laravel 11 | Backend framework |
| Blade      | Templating        |
| Vite       | Asset bundling    |
| CSS        | Custom styling    |
| SQLite     | Database          |

---

## Project Structure

```
app/
├── Http/Controllers/
│   └── ProductController.php    # CRUD logic
├── Models/
│   ├── Product.php              # Product model
│   └── Category.php             # Category model

resources/views/
├── errors/
│   └── 404.blade.php            # Error page 
├── partials/
│   └── error.blade.php          # Error handeling
├── layouts/
│   └── app.blade.php            # Main layout
├── products/
│   ├── index.blade.php          # Product list with filters
│   ├── create.blade.php         # Add product form
│   └── edit.blade.php           # Edit product form
├── dashboard.blade.php          # Dashboard after login
└── index.blade.php              # Login page

database/
├── migrations/                  # Database structure
├── seeders/                     # Test data
└── factories/                   # Product factory
```

## Authors

- Eddie Johansson
- Allan Tran

---

## Repository

https://github.com/EddieJohanssonn3000/media-admin.git
