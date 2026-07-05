# Plan Nauki: 90 Dni Vue 3 + TypeScript + Laravel

Plan zaklada okolo 1 godzine dziennie. Priorytetem jest samodzielne pisanie kodu, debugowanie i rozumienie decyzji technicznych. Mentor najpierw tlumaczy temat, potem Ty implementujesz, a dopiero po Twojej probie robimy review, debugowanie i korekty.

## Cel Projektu

Budujemy FlowBoard: aplikacje do zarzadzania praca zespolu inspirowana narzedziami typu ClickUp. System bedzie obslugiwal workspace'y, projekty, listy, zadania, subtaski, komentarze, statusy, priorytety, terminy, tagi i rozne widoki pracy: lista, kanban oraz kalendarz.

Stylowanie jest drugorzedne. Najwazniejsze sa: architektura, API, typy, Pinia, relacje w bazie, walidacja, testy, debugowanie oraz CI/CD.

## Zasada Architektury Frontendu

Pinia wchodzi od poczatku, bo FlowBoard bedzie mial stan wspoldzielony miedzy wieloma ekranami.

- Pinia: aktualny workspace, zalogowany uzytkownik, aktywny widok, filtry, kontekst projektu, statusy i tagi.
- Local state: formularze, dropdowny, tymczasowe wartosci inputow, pojedyncze modale.
- Composables: requesty API, mapowanie danych, logika filtrowania, wspolne zachowania formularzy.
- Laravel API: zrodlo prawdy dla danych trwalych, relacji, walidacji i uprawnien.

## Rytm Dnia

- 10 min: omowienie tematu i celu dnia.
- 35 min: samodzielna implementacja.
- 10 min: debugowanie, review lub refactor.
- 5 min: fiszka do `doc/fiszki.md`.

## Fazy

| Dni | Temat | Efekt |
| --- | --- | --- |
| 1-10 | Fundamenty projektu | Docker, Laravel, Vue, TypeScript, Pinia, pierwsze API |
| 11-25 | Backend FlowBoard | Workspace'y, projekty, listy, zadania, relacje, CRUD |
| 26-40 | Frontend Vue + Pinia | Komponenty, routing, store'y, formularze, API client |
| 41-55 | Widoki pracy i uprawnienia | Lista, kanban, kalendarz, auth, role, policies |
| 56-65 | Nuxt i architektura Vue | Czym jest Nuxt, SSR/SPA, porownanie z Vite SPA |
| 66-78 | Testy i CI/CD | PHPUnit, feature tests, type-check, build, GitHub Actions |
| 79-90 | Debugowanie i finalizacja | Bugfixing, refactor, performance, finalne demo |

## Plan Dzien Po Dniu

### Dni 1-10: Fundamenty

1. Dzien 1: Architektura FlowBoard: Laravel API, Vue SPA, Pinia, Docker Compose.
2. Dzien 2: Struktura katalogow Laravela: routes, controllers, models, migrations, config, tests.
3. Dzien 3: Struktura Vue 3 + TypeScript: `script setup`, komponenty, props, reactive state.
4. Dzien 4: Pinia od podstaw: `defineStore`, state, getters, actions, `storeToRefs`.
5. Dzien 5: Pierwszy store `workspace`: aktywny workspace i aktywny widok.
6. Dzien 6: Pierwszy endpoint API `GET /api/health` i test feature w Laravelu.
7. Dzien 7: Pierwszy request z Vue do API przez typed API client.
8. Dzien 8: Debugowanie 404, 500, CORS i bledow w konsoli przegladarki.
9. Dzien 9: Migracje i Eloquent: tabela `workspaces`, model `Workspace`, factory.
10. Dzien 10: Review tygodnia: kiedy Pinia, kiedy local state, kiedy composable.

### Dni 11-25: Backend FlowBoard

11. Dzien 11: `WorkspaceController@index` i API Resource dla workspace'a.
12. Dzien 12: `WorkspaceController@store`, Form Request i walidacja danych.
13. Dzien 13: `WorkspaceController@show`, update i delete.
14. Dzien 14: Czlonkowie workspace'a: tabela pivot, role i relacje.
15. Dzien 15: Model `Project`, migracja i relacja `Workspace hasMany Project`.
16. Dzien 16: CRUD projektow z filtrem po workspace.
17. Dzien 17: Model `TaskList`, kolejnosc list i relacja z projektem.
18. Dzien 18: Model `Task`, status, priorytet, termin i opis.
19. Dzien 19: Relacje taskow: assignee, creator, project, list.
20. Dzien 20: Subtaski: relacja self-referencing albo osobna tabela - decyzja projektowa.
21. Dzien 21: Komentarze do zadan i historia aktywnosci.
22. Dzien 22: Tagi i filtrowanie po tagach.
23. Dzien 23: Sortowanie i paginacja zadan po statusie, terminie, priorytecie.
24. Dzien 24: Standaryzacja odpowiedzi API i bledow walidacji.
25. Dzien 25: Backend review: kontrolery, requesty, resources, testy, nazewnictwo.

### Dni 26-40: Vue 3 + TypeScript + Pinia

26. Dzien 26: Vue Router: workspace, projekt, lista zadan, szczegoly zadania.
27. Dzien 27: Typy TypeScript dla `Workspace`, `Project`, `TaskList`, `Task`, `User`.
28. Dzien 28: API client: jedna warstwa do requestow HTTP.
29. Dzien 29: Store `workspace`: lista workspace'ow, aktywny workspace, loading, error.
30. Dzien 30: Store `project`: aktywny projekt, listy i licznik zadan.
31. Dzien 31: Store `taskFilters`: statusy, priorytety, assignee, tagi, search.
32. Dzien 32: Lista workspace'ow z loading, empty state i error state.
33. Dzien 33: Formularz workspace'a z `v-model` i typowanym stanem formularza.
34. Dzien 34: Obsluga bledow walidacji z Laravela po stronie Vue.
35. Dzien 35: Lista projektow w aktywnym workspace.
36. Dzien 36: Lista zadan projektu z filtrami z Pinii.
37. Dzien 37: Kiedy nie uzywac Pinii: formularze i lokalne UI state.
38. Dzien 38: Composables: `useWorkspaces`, `useProjects`, `useTasks`.
39. Dzien 39: Debugowanie reaktywnosci Vue, Pinia Devtools, watch, computed.
40. Dzien 40: Frontend review: komponenty, store'y, composables, typy, API client.

### Dni 41-55: Widoki Pracy, Auth i Uprawnienia

41. Dzien 41: Widok listy: grupowanie zadan po statusie albo liscie.
42. Dzien 42: Widok kanban: kolumny statusow i przenoszenie zadania miedzy statusami.
43. Dzien 43: Drag and drop: biblioteka, zdarzenia, aktualizacja API.
44. Dzien 44: Widok kalendarza: zadania z terminami.
45. Dzien 45: Szczegoly zadania: opis, komentarze, assignee, tagi, aktywnosc.
46. Dzien 46: Laravel auth: sesje vs tokeny, wybor podejscia dla tego projektu.
47. Dzien 47: Rejestracja i logowanie uzytkownika.
48. Dzien 48: Store `auth`: zalogowany uzytkownik i status sesji.
49. Dzien 49: Ochrona endpointow API przez middleware.
50. Dzien 50: Route guards w Vue.
51. Dzien 51: Role w workspace: owner, admin, member, guest.
52. Dzien 52: Laravel Policies dla workspace'ow, projektow i zadan.
53. Dzien 53: Testy autoryzacji: 401, 403, dostep czlonka workspace.
54. Dzien 54: Mailpit i pierwszy mail dev, np. powiadomienie o przypisaniu zadania.
55. Dzien 55: Review modulu auth, widokow pracy i decyzji architektonicznych.

### Dni 56-65: Nuxt i Szerszy Ekosystem Vue

56. Dzien 56: Czym jest Nuxt: framework na Vue, routing plikowy, SSR, SSG, server routes.
57. Dzien 57: Nuxt vs Vite SPA: kiedy wybrac Nuxt, kiedy zostac przy czystym Vue.
58. Dzien 58: Mini spike Nuxt poza glowna aplikacja: `pages`, `components`, `server`.
59. Dzien 59: Data fetching w Nuxt: `useFetch`, `useAsyncData`, SSR i cache.
60. Dzien 60: Pinia w Nuxt: plugin, hydratacja i roznice wzgledem SPA.
61. Dzien 61: Auth w Nuxt - roznice wzgledem SPA.
62. Dzien 62: SEO i SSR: dlaczego Nuxt jest czesto wybierany do publicznych stron.
63. Dzien 63: Decyzja projektowa: FlowBoard zostaje SPA, Nuxt traktujemy jako osobna kompetencje.
64. Dzien 64: Porownanie debugowania Nuxt i Vue SPA.
65. Dzien 65: Powtorka Vue: Composition API, Pinia, composables, router, typy.

### Dni 66-78: Testy i CI/CD

66. Dzien 66: Piramida testow: unit, feature, integration, e2e - co testujemy w tym projekcie.
67. Dzien 67: PHPUnit dla logiki domenowej i prostych helperow.
68. Dzien 68: Testy feature dla workspace'ow.
69. Dzien 69: Testy feature dla projektow i relacji z workspace.
70. Dzien 70: Testy feature dla zadan, filtrow i walidacji.
71. Dzien 71: Testy autoryzacji i policies.
72. Dzien 72: Laravel factories i seedery pod testy.
73. Dzien 73: `vue-tsc` jako test typow frontendu.
74. Dzien 74: `npm run build` jako test integracji Vue + Vite + Pinia.
75. Dzien 75: Laravel Pint i podstawy formatowania w pipeline.
76. Dzien 76: GitHub Actions: Composer, Laravel tests, npm ci, type-check i build.
77. Dzien 77: Debugowanie CI: cache, zmienne srodowiskowe, baza testowa, logi jobow.
78. Dzien 78: Minimalna definicja gotowosci PR: testy, type-check, build, review.

### Dni 79-90: Dopracowanie, Debugowanie, Final

79. Dzien 79: Lista znanych bugow i priorytety napraw.
80. Dzien 80: Debugowanie backendu: logi, stack trace, tinker, query log.
81. Dzien 81: Debugowanie frontendu: Vue Devtools, Pinia Devtools, Network tab, source maps.
82. Dzien 82: Problem N+1 w Eloquent i jak go wykryc.
83. Dzien 83: Optymalizacja endpointow list: eager loading, paginacja, indeksy.
84. Dzien 84: Refactor kontrolerow i requestow bez zmiany zachowania.
85. Dzien 85: Refactor komponentow Vue, store'ow Pinia i composables.
86. Dzien 86: Obsluga edge case'ow: puste listy, brak uprawnien, bledy sieci, timeout.
87. Dzien 87: Przygotowanie demo danych i scenariusza prezentacji.
88. Dzien 88: Przejscie calego flow: workspace -> projekt -> lista -> zadanie -> komentarze -> kanban.
89. Dzien 89: Finalne CI, testy, build i porzadki w dokumentacji.
90. Dzien 90: Podsumowanie: czego sie nauczyles, co wymaga powtorki, plan kolejnych 30 dni.

## Minimalny Zakres CI/CD

Pipeline powinien docelowo sprawdzac:

- Instalacje zaleznosci PHP przez Composer.
- Instalacje zaleznosci JS przez npm.
- Migracje na bazie testowej.
- `php artisan test`.
- `./vendor/bin/pint --test`.
- `npm run type-check`.
- `npm run build`.

## Fiszka Dnia

Na koniec kazdego dnia dopisujemy do `doc/fiszki.md`:

```md
## Dzien X - temat

### Pojecia
- ...

### Pytania i odpowiedzi
Q: ...
A: ...

### Debugowanie
- Blad:
- Przyczyna:
- Rozwiazanie:

### Do powtorki
- ...
```
