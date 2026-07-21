# Voter

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 13">
  <img src="https://img.shields.io/badge/Vue-3-42B883?style=for-the-badge&logo=vuedotjs&logoColor=white" alt="Vue 3">
  <img src="https://img.shields.io/badge/Pinia-state-FFD859?style=for-the-badge&logo=vuedotjs&logoColor=black" alt="Pinia">
  <img src="https://img.shields.io/badge/PrimeVue-Aura-6366F1?style=for-the-badge" alt="PrimeVue Aura">
  <img src="https://img.shields.io/badge/PostgreSQL-17-4169E1?style=for-the-badge&logo=postgresql&logoColor=white" alt="PostgreSQL 17">
</p>

Voter to aplikacja SaaS do zbierania feedbacku od uzytkownikow, glosowania na funkcje, prowadzenia roadmapy, publikowania changeloga i informowania uzytkownikow, gdy ich feedback zostal wdrozony.

Główna idea produktu:

**feedback -> glosy -> decyzja -> roadmapa -> wdrozenie -> changelog -> powiadomienie uzytkownika**

Voter nie ma byc tylko tablica do glosowania. Ma pomagac firmom zamykac petle feedbacku: pokazac uzytkownikom, ze ich glos realnie wplywa na rozwoj produktu.

## MVP

W 90 godzinach celujemy w praktyczne MVP, a nie pelna wersje z calego `doc/idea.md`.

Zakres MVP:

- Organizacje i produkty.
- Publiczny feedback board dla produktu.
- Dodawanie feature requestow.
- Glosowanie na requesty.
- Komentarze pod requestami.
- Statusy requestow: `Open`, `Under Review`, `Planned`, `In Progress`, `Released`, `Declined`.
- Panel admina do zarzadzania requestami.
- Roadmapa: `Now`, `Next`, `Later`, `Done`.
- Changelog / historia aktualizacji.
- Powiazanie changelog entry z requestem.
- Podstawowe powiadomienia mailowe przez Mailpit.
- API do synchronizacji changeloga z aplikacji klienta przez `external_id`.
- Podstawowe analytics: najwiecej glosow, statusy, ostatnie requesty.

Poza MVP zostaja: pelne AI, widgety embedowane jako osobny bundle, Evidence Score, billing, custom domain, integracje i zaawansowane role.

## Technologie

| Warstwa | Narzedzia |
| --- | --- |
| Backend | Laravel 13, PHP, Eloquent ORM, Form Requests, Policies |
| Frontend | Vue 3, Composition API, TypeScript, Vite |
| UI | PrimeVue, theme Aura, PrimeIcons |
| Stan frontendu | Pinia, composables, typowane klienty API |
| Baza danych | PostgreSQL 17 |
| Cache / kolejki | Redis |
| Lokalna poczta | Mailpit |
| Srodowisko | Docker Compose, Laravel Sail |
| Jakosc | PHPUnit, Laravel Pint, vue-tsc, Vite build |
| CI/CD | GitHub Actions dla testow backendu, type-checku i buildu frontendu |

## Architektura Frontendu

Pinia jest czescia podstawowej architektury frontendu. Voter bedzie mial stan wspoldzielony miedzy publicznym boardem, panelem admina, roadmapa i changelogiem.

Zasady odpowiedzialnosci za stan:

- Pinia: aktualny produkt, zalogowany admin, aktywny widok, filtry requestow, statusy, kategorie i kontekst boarda.
- Local state komponentu: formularze, otwarte dialogi, tymczasowe inputy, stan pojedynczego dropdowna.
- Composables: requesty API, mapowanie odpowiedzi, logika filtrow, helpery formularzy i obsluga bledow.
- Laravel API: zrodlo prawdy dla danych trwalych, relacji, walidacji i uprawnien.

PrimeVue z theme Aura odpowiada za warstwe UI. Dzieki temu skupiamy sie na logice, strukturze danych i debugowaniu, a nie na pisaniu calego systemu komponentow od zera.

## PostgreSQL

Projekt uzywa PostgreSQL jako glownej bazy danych, bo Voter ma charakter aplikacji SaaS z relacyjnymi danymi: organizacje, produkty, requesty, glosy, komentarze, roadmapa, changelog i synchronizacja przez `external_id`.

PostgreSQL dobrze pasuje do tego typu domeny i zostawia miejsce na pozniejsze rozszerzenia, np. indeksy pod wyszukiwanie, agregacje analytics albo bardziej zaawansowane typy danych.

## Docker Compose

Plik nazywa sie `compose.yaml`, poniewaz Docker Compose V2 traktuje te nazwe jako aktualna, preferowana konwencje. Starsza nazwa `docker-compose.yml` nadal dziala, ale nie jest konieczna.

Domyslne lokalne uslugi:

| Usluga | URL / port |
| --- | --- |
| Aplikacja | `http://localhost:8088` |
| Vite dev server | `http://localhost:5173` |
| PostgreSQL | `localhost:5433` |
| Redis | `localhost:6380` |
| Mailpit UI | `http://localhost:8026` |

## Uruchomienie Lokalne

```bash
cp .env.example .env
docker compose up -d
docker compose exec laravel.test php artisan migrate
docker compose exec laravel.test npm run dev
```

## Przydatne Komendy

```bash
docker compose exec laravel.test php artisan test
docker compose exec laravel.test npm run type-check
docker compose exec laravel.test npm run build
docker compose exec laravel.test ./vendor/bin/pint

docker compose exec <nazwa-usługi> php artisan <komenda>
```

## Roadmapa Nauki

Szczegolowy plan nauki i implementacji znajduje sie w `doc/plan-nauki-90-dni.md`.

docker compose exec laravel.test npm run dev -- --force    