## Debugowanie bledu 404 w tescie

Problem:
Test oczekiwal statusu 200, ale dostawal 404.

Przyczyna:
Endpoint byl zdefiniowany w `routes/api.php`, ale plik api routes nie byl podpiety w `bootstrap/app.php`. Dodatkowo test uderzal w `/health`, a endpoint API dziala pod `/api/health`.

Rozwiazanie:
- dodano `api: __DIR__.'/../routes/api.php'` w `bootstrap/app.php`,
- zmieniono test na `getJson('/api/health')`,
- poprawiono nazwe kontrolera na `HealthCheckController.php`.

Wniosek:
Przy bledzie 404 najpierw sprawdzam, czy route istnieje przez `php artisan route:list`.