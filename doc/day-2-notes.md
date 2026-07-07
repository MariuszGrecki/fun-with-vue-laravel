# wersja laravela

docker compose exec laravel.test php artisan --version

# puszczenie mgiracji

docker compose exec laravel.test php artisan migrate

# status migracji

docker compose exec laravel.test php artisan migrate:status

===========================================================

# przed commitem warto odpalić oba

# odpalenie typescripta dla VUE

docker compose exec laravel.test npm run type-check

# budowanie frontendu produkcyjnego

docker compose exec laravel.test npm run build
===========================================================

# logi laravela

docker compose logs laravel.test

# logi postgresa

docker compose logs pgsql