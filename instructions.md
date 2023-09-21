php artisan migrate --path=database/migrations/landlord --database=landlord


php artisan tenants:artisan "migrate --database=tenant --seed"
php artisan tenants:artisan "migrate:refresh --seed" --tenant=1
php artisan tenants:artisan "migrate --seed" --tenant=1


// pusher e impresiones estan desabilitadas por defecto