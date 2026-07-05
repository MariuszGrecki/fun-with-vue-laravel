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

- Backend: Laravel 12.
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

1. Dzien 1: Architektura Votera i omowienie MVP wzgledem pelnego `idea.md`.
2. Dzien 2: Docker Compose, `compose.yaml`, PostgreSQL, Redis i Mailpit.
3. Dzien 3: Struktura Laravel: routes, controllers, models, migrations, requests, resources, tests.
4. Dzien 4: Vue 3 + TypeScript: `script setup`, komponenty, props, typy.
5. Dzien 5: PrimeVue + Aura: Button, Card, DataTable, Dialog, Tag, Toast.
6. Dzien 6: Pinia: `defineStore`, state, getters, actions, `storeToRefs`.
7. Dzien 7: Pierwszy store `product`: aktywny produkt i aktywny widok.
8. Dzien 8: Pierwszy endpoint API `GET /api/health` i test feature.
9. Dzien 9: Pierwszy request z Vue do API przez typed API client.
10. Dzien 10: Review fundamentow: kiedy Pinia, kiedy local state, kiedy composable.

### Dni 11-25: Backend Feedback Boarda

11. Dzien 11: Model `Organization`, migracja, factory, seeder.
12. Dzien 12: Model `Product`, relacja z organizacja.
13. Dzien 13: Publiczny identyfikator produktu: slug albo public key.
14. Dzien 14: Model `FeatureRequest`: tytul, opis, status, author, product.
15. Dzien 15: Statusy requestow: enum i walidacja.
16. Dzien 16: `FeatureRequestController@index` z filtrowaniem i sortowaniem.
17. Dzien 17: `FeatureRequestController@store` z Form Request.
18. Dzien 18: Glosowanie: model `Vote`, unikalnosc glosu per user/email/request.
19. Dzien 19: Komentarze: model `Comment`, relacje, walidacja.
20. Dzien 20: API Resources dla requestow, glosow i komentarzy.
21. Dzien 21: Wyszukiwanie requestow po tytule i opisie.
22. Dzien 22: Kategorie lub tagi w minimalnym zakresie.
23. Dzien 23: Admin endpointy do zmiany statusu requestu.
24. Dzien 24: Testy feature dla requestow, glosow i komentarzy.
25. Dzien 25: Review backendu feedback boarda.

### Dni 26-40: Frontend Publiczny i Admin

26. Dzien 26: Routing frontendu: public board, request details, admin.
27. Dzien 27: Typy TypeScript dla `Product`, `FeatureRequest`, `Vote`, `Comment`.
28. Dzien 28: API client i obsluga bledow walidacji.
29. Dzien 29: Publiczny board w PrimeVue DataTable.
30. Dzien 30: Formularz dodawania requestu w PrimeVue Dialog.
31. Dzien 31: Glosowanie z optimistic update i obsluga rollbacku.
32. Dzien 32: Szczegoly requestu i komentarze.
33. Dzien 33: Store `requestFilters`: status, sortowanie, search.
34. Dzien 34: Admin lista requestow z DataTable i Tag statusu.
35. Dzien 35: Admin zmienia status requestu.
36. Dzien 36: Toasty i ConfirmDialog dla akcji uzytkownika.
37. Dzien 37: Empty states, loading states i error states.
38. Dzien 38: Refactor komponentow: board, request row, status tag, dialog.
39. Dzien 39: Debugowanie Vue, Pinia i requestow sieciowych.
40. Dzien 40: Review frontendu publicznego i admina.

### Dni 41-55: Roadmapa i Changelog

41. Dzien 41: Model `RoadmapItem` i kolumny `Now / Next / Later / Done`.
42. Dzien 42: Powiazanie roadmap item z requestem.
43. Dzien 43: Publiczny widok roadmapy w PrimeVue.
44. Dzien 44: Admin zarzadza roadmapa.
45. Dzien 45: Model `ChangelogEntry`.
46. Dzien 46: Kategorie changeloga: Added / Improved / Fixed.
47. Dzien 47: Publiczny widok changeloga.
48. Dzien 48: Admin tworzy wpis changeloga.
49. Dzien 49: Powiazanie changelog entry z feature requestem.
50. Dzien 50: Zmiana statusu requestu na `Released` po powiazaniu z release.
51. Dzien 51: Informacja `Released in` przy requestcie.
52. Dzien 52: Upload/screenshot URL w wersji minimalnej jako pole tekstowe.
53. Dzien 53: Testy feature roadmapy.
54. Dzien 54: Testy feature changeloga.
55. Dzien 55: Review petli feedback -> roadmap -> changelog -> released.

### Dni 56-65: Sync API, Powiadomienia, Analytics

56. Dzien 56: Projekt endpointu sync dla changeloga.
57. Dzien 57: `external_id`, `source`, `source_url`, `last_synced_at`.
58. Dzien 58: Upsert changelog entry po `external_id`.
59. Dzien 59: Prosty token API dla produktu.
60. Dzien 60: Mailpit i powiadomienie po zmianie statusu requestu.
61. Dzien 61: Powiadomienie po release do glosujacych.
62. Dzien 62: Podstawowe analytics: requesty z najwieksza liczba glosow.
63. Dzien 63: Analytics statusow requestow.
64. Dzien 64: Analytics ostatnich aktywnosci.
65. Dzien 65: Review sync API, maili i analytics.

### Dni 66-78: Testy i CI/CD

66. Dzien 66: Strategia testow: unit, feature, frontend type-check, build.
67. Dzien 67: Testy organizacji i produktow.
68. Dzien 68: Testy requestow i walidacji.
69. Dzien 69: Testy glosowania i unikalnosci glosu.
70. Dzien 70: Testy komentarzy.
71. Dzien 71: Testy roadmapy.
72. Dzien 72: Testy changeloga i linkowania z requestami.
73. Dzien 73: Testy sync API z `external_id`.
74. Dzien 74: `vue-tsc` i naprawa bledow typow.
75. Dzien 75: `npm run build` i naprawa bledow bundla.
76. Dzien 76: Laravel Pint i standard formatowania.
77. Dzien 77: GitHub Actions: Composer, PostgreSQL service, Laravel tests, npm ci, type-check, build.
78. Dzien 78: Debugowanie CI i definicja gotowosci PR.

### Dni 79-90: Debugowanie, Refactor, Final

79. Dzien 79: Lista znanych bugow i priorytety napraw.
80. Dzien 80: Debugowanie backendu: logi, stack trace, tinker, query log.
81. Dzien 81: Debugowanie frontendu: Vue Devtools, Pinia Devtools, Network tab.
82. Dzien 82: Problem N+1 w Eloquent i eager loading.
83. Dzien 83: Indeksy w PostgreSQL pod requesty, glosy i sync.
84. Dzien 84: Refactor kontrolerow, requestow i resources.
85. Dzien 85: Refactor komponentow PrimeVue i composables.
86. Dzien 86: Edge case'y: puste listy, bledy sieci, brak uprawnien, duplikat glosu.
87. Dzien 87: Przygotowanie danych demo.
88. Dzien 88: Przejscie calego flow: request -> glos -> roadmap -> changelog -> released -> mail.
89. Dzien 89: Finalne testy, type-check, build i dokumentacja.
90. Dzien 90: Podsumowanie, fiszki zbiorcze i plan kolejnych 30 dni.

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

