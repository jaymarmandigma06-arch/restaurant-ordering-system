# Restaurant Ordering System

Laravel restaurant ordering platform with customer ordering and role-protected administration.

## XAMPP / MySQL setup

1. Start **Apache** and **MySQL** in XAMPP, then create a database named `restaurant_ordering_db` in phpMyAdmin.
2. In `.env`, configure:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=restaurant_ordering_db
DB_USERNAME=root
DB_PASSWORD=
```

3. Ensure `extension=zip` is enabled in `C:\xampp\php\php.ini` before running Composer commands.
4. Run:

```powershell
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000`.

## Seeded accounts

| Role | Email | Password |
|---|---|---|
| Admin | admin@flamefork.test | Admin@12345 |
| Customer | customer@flamefork.test | Customer@12345 |

## Included modules

- Customer registration, authentication, menu search, cart, secure checkout, orders, payment status, and cancellation of pending orders.
- Admin dashboard, categories, menu items, order status processing, payment verification, inventory adjustments/history, and discount creation.
- Database migrations for categories, food, cart/order/payment records, addresses, tables, inventory transactions, notifications, reviews, discounts, and settings.
- Transactional checkout and stock deduction at order confirmation to protect pricing and inventory records.
