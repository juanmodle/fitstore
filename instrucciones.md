```bash
composer install
npm install
php artisan migrate:fresh --seed
npm run build
php artisan serve
```

## Credenciales usuarios de prueba

Admin: administrador@gmail.com : contraseÃ±a
Manager: manager@gmail.com : contraseÃ±a
Editor: editor@gmail.com : contraseÃ±a
Cliente VIP: vip@gmail.com : contraseÃ±a
Cliente normal: cliente@gmail.com : contraseÃ±a

```bash
php artisan fitstore:choose-giveaway-winner
php artisan fitstore:cleanup-old-carts
php artisan fitstore:create-api-token cliente@gmail.com
php artisan fitstore:expire-coupons
php artisan fitstore:daily-sales-report
php artisan fitstore:low-stock-report
php artisan fitstore:recalculate-vip-points
php artisan payments:send-pending-reminders
php artisan fitstore:send-vip-welcome 1
```

