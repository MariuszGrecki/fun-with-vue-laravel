# FlowBoard

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12">
  <img src="https://img.shields.io/badge/Vue-3-42B883?style=for-the-badge&logo=vuedotjs&logoColor=white" alt="Vue 3">
  <img src="https://img.shields.io/badge/Pinia-state-FFD859?style=for-the-badge&logo=vuedotjs&logoColor=black" alt="Pinia">
  <img src="https://img.shields.io/badge/TypeScript-strict-3178C6?style=for-the-badge&logo=typescript&logoColor=white" alt="TypeScript">
  <img src="https://img.shields.io/badge/Docker-Compose-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="Docker Compose">
</p>

FlowBoard to aplikacja do zarzadzania praca w zespolach, inspirowana narzedziami typu ClickUp. Laczy workspace'y, projekty, listy zadan, zadania, subtaski, komentarze, priorytety, terminy, tagi i rozne widoki pracy w jednym panelu operacyjnym.

Aplikacja ma wspierac codzienna prace nad projektami: planowanie zadan, przypisywanie osob, sledzenie postepu, przelaczanie sie miedzy widokiem listy, tablicy i kalendarza, filtrowanie zadan oraz przeglad aktywnosci zespolu.

## Zakres Produktu

- Workspace'y z czlonkami i rolami.
- Projekty pogrupowane w workspace'ach.
- Listy zadan wewnatrz projektow.
- Zadania ze statusem, priorytetem, przypisana osoba, terminem, opisem i tagami.
- Subtaski, komentarze i historia aktywnosci.
- Widoki: lista, tablica kanban i kalendarz.
- Filtrowanie, sortowanie i paginacja.
- Logowanie, autoryzacja i uprawnienia na poziomie workspace'a.
- Dashboard z podsumowaniem pracy zespolu i projektow.
- Backend API przygotowany pod testy i przyszle integracje.

## Technologie

| Warstwa | Narzedzia |
| --- | --- |
| Backend | Laravel 12, PHP, Eloquent ORM, Form Requests, Policies |
| Frontend | Vue 3, Composition API, TypeScript, Vite |
| Stan frontendu | Pinia, composables, typowane klienty API |
| Baza danych | MySQL 8.4 |
| Cache / kolejki | Redis |
| Lokalna poczta | Mailpit |
| Srodowisko | Docker Compose, Laravel Sail |
| Jakosc | PHPUnit, Laravel Pint, vue-tsc, Vite build |
| CI/CD | GitHub Actions dla testow backendu, type-checku i buildu frontendu |

## Architektura Stanu Frontendu

Pinia jest podstawowym elementem architektury frontendu. FlowBoard ma stan, ktory musi byc wspoldzielony miedzy wieloma ekranami: aktualny workspace, wybrany projekt, aktywny widok, filtry, kontekst zalogowanego uzytkownika i metadane zadan.

Zasady odpowiedzialnosci za stan:

- Uzywamy Pinii dla stanu wspoldzielonego: aktualny workspace, sesja uzytkownika, aktywny widok, filtry zadan, wybrany projekt, statusy i tagi.
- Uzywamy stanu komponentu dla lokalnych szczegolow UI: pola formularza, otwarte dropdowny, tymczasowe wartosci inputow i widocznosc modali.
- Uzywamy composables dla wspolnej logiki: requesty API, mapowanie odpowiedzi, logika filtrow i helpery formularzy.
- Laravel API jest zrodlem prawdy dla danych trwalych, relacji, walidacji i uprawnien.

Pierwszy store Pinia znajduje sie w `resources/js/stores/workspace.ts`. Definiuje aktywny workspace i wybrany widok pracy.

## Uruchomienie Lokalne

Projekt dziala na Docker Compose przez Laravel Sail.

```bash
cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail npm run dev
```

Domyslne lokalne uslugi:

| Usluga | URL / port |
| --- | --- |
| Aplikacja | `http://localhost:8088` |
| Vite dev server | `http://localhost:5173` |
| MySQL | `localhost:3307` |
| Redis | `localhost:6380` |
| Mailpit UI | `http://localhost:8026` |

## Przydatne Komendy

```bash
./vendor/bin/sail artisan test
./vendor/bin/sail npm run type-check
./vendor/bin/sail npm run build
./vendor/bin/sail pint
```

## Roadmapa

FlowBoard bedzie rozwijany iteracyjnie:

1. Rdzen API w Laravelu i model bazy danych.
2. Ekrany Vue 3 z typami TypeScript.
3. Store'y Pinia dla workspace'a, auth, kontekstu projektu i filtrow zadan.
4. Widoki zadan: lista, tablica i kalendarz.
5. Logowanie, role i policies.
6. Testy, debugowanie i CI/CD.
7. Spike Nuxt, zeby porownac architekture Vue SPA z frameworkiem full-stack opartym o Vue.

Szczegolowy plan nauki i implementacji znajduje sie w `doc/plan-nauki-90-dni.md`.
