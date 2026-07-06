# Dzien 1 - Architektura Votera

## Czym jest Voter?

Voter to aplikacja, w ktorej uzytkownicy produktu zglaszaja potrzeby, glosuja na funkcje, a wlasciciel produktu podejmuje decyzje, co trafi na roadmapę i do changeloga.

## Problem, ktory rozwiazuje aplikacja

Voter rozwiązuje problem priorytetyzacji rozwoju produktu na podstawie realnego feedbacku użytkowników.

## Glowne encje

## Glowne encje domenowe

### Organization

Reprezentuje firme / zespol, ktory korzysta z Votera.

Przykladowe pola:
- id
- name
- slug
- created_at
- updated_at

Relacje:
- Organization ma wiele Product.

### Product

Reprezentuje konkretny produkt lub aplikacje, dla ktorej zbierany jest feedback.

Przykladowe pola:
- id
- organization_id
- name
- slug
- public_key
- created_at
- updated_at

Relacje:
- Product nalezy do Organization.
- Product ma wiele FeatureRequest.
- Product ma wiele RoadmapItem.
- Product ma wiele ChangelogEntry.

### FeatureRequest

Reprezentuje propozycje funkcji, problem albo potrzebe zgloszona przez uzytkownika.

Przykladowe pola:
- id
- product_id
- title
- description
- status
- author_name
- author_email
- created_at
- updated_at

Statusy:
- open
- under_review
- planned
- in_progress
- released
- declined

Relacje:
- FeatureRequest nalezy do Product.
- FeatureRequest ma wiele Vote.
- FeatureRequest ma wiele Comment.
- FeatureRequest moze byc powiazany z RoadmapItem.
- FeatureRequest moze byc powiazany z ChangelogEntry.

### Vote

Reprezentuje glos uzytkownika na konkretny feature request.

Przykladowe pola:
- id
- feature_request_id
- voter_email
- voter_name
- created_at
- updated_at

Regula:
- jeden email moze oddac tylko jeden glos na jeden FeatureRequest.

Relacje:
- Vote nalezy do FeatureRequest.

### Comment

Reprezentuje komentarz pod feature requestem.

Przykladowe pola:
- id
- feature_request_id
- author_name
- author_email
- body
- is_admin
- created_at
- updated_at

Relacje:
- Comment nalezy do FeatureRequest.

### RoadmapItem

Reprezentuje element roadmapy, czyli decyzje produktowa: co jest teraz robione, co bedzie pozniej, a co zostalo zakonczone.

Przykladowe pola:
- id
- product_id
- feature_request_id
- title
- description
- column
- sort_order
- created_at
- updated_at

Kolumny:
- now
- next
- later
- done

Relacje:
- RoadmapItem nalezy do Product.
- RoadmapItem moze byc powiazany z FeatureRequest.

### ChangelogEntry

Reprezentuje wpis changeloga / release note.

Przykladowe pola:
- id
- product_id
- feature_request_id
- external_id
- title
- body
- category
- released_at
- source
- source_url
- created_at
- updated_at

Kategorie:
- added
- improved
- fixed

Relacje:
- ChangelogEntry nalezy do Product.
- ChangelogEntry moze byc powiazany z FeatureRequest.

## MVP

W MVP robimy:

- organizacje,
- produkty,
- publiczny feedback board dla produktu,
- dodawanie feature requestow,
- glosowanie na requesty,
- komentarze,
- statusy requestow,
- panel admina do zmiany statusu,
- prosta roadmapa: now / next / later / done,
- changelog,
- powiazanie changelog entry z feature requestem,
- synchronizacja changeloga przez API po `external_id`,
- media w changelogu jako URL-e,
- podstawowe powiadomienia mailowe przez Mailpit,
- podstawowe testy backendu,
- type-check i build frontendu,
- CI w GitHub Actions.

Poza MVP zostaje:

- AI do analizy feedbacku,
- Evidence Score,
- widget embedowany jako osobny bundle,
- billing i plany platnosci,
- custom domain,
- zaawansowane role i uprawnienia,
- SSO,
- integracje z Jira, Slackiem, GitHubem,
- upload plikow do Votera,
- cron synchronizujacy zewnetrzne systemy,
- zaawansowane analytics,
- wersjonowanie publicznego API,
- pelny system notyfikacji produkcyjnych.

## Pytania / niejasnosci

- Do logowania admina uzyjemy Laravel Fortify + Sanctum.
- Publiczni uzytkownicy boarda w MVP nie maja kont.
- Synchronizacja changeloga bedzie uzywala tokenu API produktu.