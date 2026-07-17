# Plan Nauki: 90 Dni Vue 3 + TypeScript + Laravel

Plan zaklada okolo 1 godzine dziennie. Budujemy Voter: SaaS do feedbacku, glosowania na funkcje, roadmapy, changeloga i zamykania petli feedbacku z uzytkownikami.

Nie probujemy zrobic calego produktu z `doc/idea.md` w 90 godzin. Celem jest sensowne MVP, ktore pokazuje glowna wartosc aplikacji i daje praktyke z Laravel API, Vue 3, TypeScript, Pinia, PrimeVue Aura, PostgreSQL, testami i CI/CD.

## MVP Votera

MVP obejmuje:

- organizacje i produkty,
- publiczny feedback board,
- dodawanie requestow,
- glosowanie,
- komentarze,
- statusy requestow,
- panel admina,
- roadmapa `Now / Next / Later / Done`,
- changelog,
- powiazanie changeloga z requestami,
- podstawowe powiadomienia przez Mailpit,
- endpoint API do synchronizacji changeloga z `external_id`,
- podstawowe analytics.

Poza MVP zostaja: pelne AI, widgety embedowane, Evidence Score, billing, custom domain, integracje, zaawansowane role i headless mode.

## Stack

- Backend: Laravel 13.
- Frontend: Vue 3 + TypeScript.
- UI: PrimeVue + theme Aura.
- State management: Pinia.
- Baza danych: PostgreSQL.
- Cache / kolejki: Redis.
- Mail dev: Mailpit.
- Srodowisko: Docker Compose / Laravel Sail.
- Jakosc: PHPUnit, Pint, vue-tsc, Vite build.
- CI/CD: GitHub Actions.

## Rytm Dnia

- 10 min: omowienie tematu i celu dnia.
- 35 min: samodzielna implementacja.
- 10 min: debugowanie, review lub refactor.
- 5 min: fiszka do `doc/fiszki.md`.

## Fazy

| Dni | Temat | Efekt |
| --- | --- | --- |
| 1-10 | Fundamenty Votera | Docker, PostgreSQL, Laravel, Vue, Pinia, PrimeVue |
| 11-25 | Backend feedback boarda | Organizacje, produkty, requesty, glosy, komentarze |
| 26-40 | Frontend publiczny i admin | PrimeVue UI, formularze, board, filtry, store'y |
| 41-55 | Roadmapa i changelog | Roadmapa, update'y, linkowanie requestow z release |
| 56-65 | Sync API i powiadomienia | `external_id`, endpoint sync, Mailpit, podstawowe analytics |
| 66-78 | Testy i CI/CD | PHPUnit, feature tests, type-check, build, GitHub Actions |
| 79-90 | Debugowanie i final | Refactor, edge case'y, demo, podsumowanie |

## Plan Dzien Po Dniu

### Dni 1-10: Fundamenty

- [x] Dzien 1: Architektura Votera i omowienie MVP wzgledem pelnego `idea.md`.
- [x] Dzien 2: Docker Compose, `compose.yaml`, PostgreSQL, Redis i Mailpit.
- [x] Dzien 3: Struktura Laravel: routes, controllers, models, migrations, requests, resources, tests.
- [x] Dzien 4: Vue 3 + TypeScript: `script setup`, komponenty, props, typy.
- [x] Dzien 5: PrimeVue + Aura: Button, Card, DataTable, Dialog, Tag, Toast.
- [x] Dzien 6: Pinia: `defineStore`, state, getters, actions, `storeToRefs`.
- [x] Dzien 7: Pierwszy store `product`: aktywny produkt i aktywny widok.
- [x] Dzien 8: Pierwszy endpoint API `GET /api/health` i test feature.
- [ ] Dzien 9: Pierwszy request z Vue do API przez typed API client.
- [ ] Dzien 10: Review fundamentow: kiedy Pinia, kiedy local state, kiedy composable.

### Dni 11-25: Backend Feedback Boarda

- [ ] Dzien 11: Model `Organization`, migracja, factory, seeder.
- [ ] Dzien 12: Model `Product`, relacja z organizacja.
- [ ] Dzien 13: Publiczny identyfikator produktu: slug albo public key.
- [ ] Dzien 14: Model `FeatureRequest`: tytul, opis, status, author, product.
- [ ] Dzien 15: Statusy requestow: enum i walidacja.
- [ ] Dzien 16: `FeatureRequestController@index` z filtrowaniem i sortowaniem.
- [ ] Dzien 17: `FeatureRequestController@store` z Form Request.
- [ ] Dzien 18: Glosowanie: model `Vote`, unikalnosc glosu per user/email/request.
- [ ] Dzien 19: Komentarze: model `Comment`, relacje, walidacja.
- [ ] Dzien 20: API Resources dla requestow, glosow i komentarzy.
- [ ] Dzien 21: Wyszukiwanie requestow po tytule i opisie.
- [ ] Dzien 22: Kategorie lub tagi w minimalnym zakresie.
- [ ] Dzien 23: Admin endpointy do zmiany statusu requestu.
- [ ] Dzien 24: Testy feature dla requestow, glosow i komentarzy.
- [ ] Dzien 25: Review backendu feedback boarda.

### Dni 26-40: Frontend Publiczny i Admin

- [ ] Dzien 26: Routing frontendu: public board, request details, admin.
- [ ] Dzien 27: Typy TypeScript dla `Product`, `FeatureRequest`, `Vote`, `Comment`.
- [ ] Dzien 28: API client i obsluga bledow walidacji.
- [ ] Dzien 29: Publiczny board w PrimeVue DataTable.
- [ ] Dzien 30: Formularz dodawania requestu w PrimeVue Dialog.
- [ ] Dzien 31: Glosowanie z optimistic update i obsluga rollbacku.
- [ ] Dzien 32: Szczegoly requestu i komentarze.
- [ ] Dzien 33: Store `requestFilters`: status, sortowanie, search.
- [ ] Dzien 34: Admin lista requestow z DataTable i Tag statusu.
- [ ] Dzien 35: Admin zmienia status requestu.
- [ ] Dzien 36: Toasty i ConfirmDialog dla akcji uzytkownika.
- [ ] Dzien 37: Empty states, loading states i error states.
- [ ] Dzien 38: Refactor komponentow: board, request row, status tag, dialog.
- [ ] Dzien 39: Debugowanie Vue, Pinia i requestow sieciowych.
- [ ] Dzien 40: Review frontendu publicznego i admina.

### Dni 41-55: Roadmapa i Changelog

- [ ] Dzien 41: Model `RoadmapItem` i kolumny `Now / Next / Later / Done`.
- [ ] Dzien 42: Powiazanie roadmap item z requestem.
- [ ] Dzien 43: Publiczny widok roadmapy w PrimeVue.
- [ ] Dzien 44: Admin zarzadza roadmapa.
- [ ] Dzien 45: Model `ChangelogEntry`.
- [ ] Dzien 46: Kategorie changeloga: Added / Improved / Fixed.
- [ ] Dzien 47: Publiczny widok changeloga.
- [ ] Dzien 48: Admin tworzy wpis changeloga.
- [ ] Dzien 49: Powiazanie changelog entry z feature requestem.
- [ ] Dzien 50: Zmiana statusu requestu na `Released` po powiazaniu z release.
- [ ] Dzien 51: Informacja `Released in` przy requestcie.
- [ ] Dzien 52: Upload/screenshot URL w wersji minimalnej jako pole tekstowe.
- [ ] Dzien 53: Testy feature roadmapy.
- [ ] Dzien 54: Testy feature changeloga.
- [ ] Dzien 55: Review petli feedback -> roadmap -> changelog -> released.

### Dni 56-65: Sync API, Powiadomienia, Analytics

- [ ] Dzien 56: Projekt endpointu sync dla changeloga.
- [ ] Dzien 57: `external_id`, `source`, `source_url`, `last_synced_at`.
- [ ] Dzien 58: Upsert changelog entry po `external_id`.
- [ ] Dzien 59: Prosty token API dla produktu.
- [ ] Dzien 60: Mailpit i powiadomienie po zmianie statusu requestu.
- [ ] Dzien 61: Powiadomienie po release do glosujacych.
- [ ] Dzien 62: Podstawowe analytics: requesty z najwieksza liczba glosow.
- [ ] Dzien 63: Analytics statusow requestow.
- [ ] Dzien 64: Analytics ostatnich aktywnosci.
- [ ] Dzien 65: Review sync API, maili i analytics.

### Dni 66-78: Testy i CI/CD

- [ ] Dzien 66: Strategia testow: unit, feature, frontend type-check, build.
- [ ] Dzien 67: Testy organizacji i produktow.
- [ ] Dzien 68: Testy requestow i walidacji.
- [ ] Dzien 69: Testy glosowania i unikalnosci glosu.
- [ ] Dzien 70: Testy komentarzy.
- [ ] Dzien 71: Testy roadmapy.
- [ ] Dzien 72: Testy changeloga i linkowania z requestami.
- [ ] Dzien 73: Testy sync API z `external_id`.
- [ ] Dzien 74: `vue-tsc` i naprawa bledow typow.
- [ ] Dzien 75: `npm run build` i naprawa bledow bundla.
- [ ] Dzien 76: Laravel Pint i standard formatowania.
- [ ] Dzien 77: GitHub Actions: Composer, PostgreSQL service, Laravel tests, npm ci, type-check, build.
- [ ] Dzien 78: Debugowanie CI i definicja gotowosci PR.

### Dni 79-90: Debugowanie, Refactor, Final

- [ ] Dzien 79: Lista znanych bugow i priorytety napraw.
- [ ] Dzien 80: Debugowanie backendu: logi, stack trace, tinker, query log.
- [ ] Dzien 81: Debugowanie frontendu: Vue Devtools, Pinia Devtools, Network tab.
- [ ] Dzien 82: Problem N+1 w Eloquent i eager loading.
- [ ] Dzien 83: Indeksy w PostgreSQL pod requesty, glosy i sync.
- [ ] Dzien 84: Refactor kontrolerow, requestow i resources.
- [ ] Dzien 85: Refactor komponentow PrimeVue i composables.
- [ ] Dzien 86: Edge case'y: puste listy, bledy sieci, brak uprawnien, duplikat glosu.
- [ ] Dzien 87: Przygotowanie danych demo.
- [ ] Dzien 88: Przejscie calego flow: request -> glos -> roadmap -> changelog -> released -> mail.
- [ ] Dzien 89: Finalne testy, type-check, build i dokumentacja.
- [ ] Dzien 90: Podsumowanie, fiszki zbiorcze i plan kolejnych 30 dni.

## Minimalny Zakres CI/CD

Pipeline powinien docelowo sprawdzac:

- instalacje zaleznosci PHP przez Composer,
- instalacje zaleznosci JS przez npm,
- PostgreSQL jako service w GitHub Actions,
- migracje na bazie testowej,
- `php artisan test`,
- `./vendor/bin/pint --test`,
- `npm run type-check`,
- `npm run build`.

## Fiszka Dnia

Na koniec kazdego dnia dopisujemy do `doc/fiszki.md`:
