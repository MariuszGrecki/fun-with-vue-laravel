# Plan produktu: Voter

## 1. Czym jest Voter

**Voter** to aplikacja SaaS do zbierania feedbacku od użytkowników, głosowania na funkcje, prowadzenia roadmapy oraz komunikowania aktualizacji produktu.

Voter pomaga firmom zamknąć pętlę między użytkownikiem a produktem:

**feedback → głosy → decyzja → roadmapa → wdrożenie → aktualizacja → powiadomienie użytkownika**

Główna wartość produktu polega na tym, że użytkownik nie tylko zgłasza pomysł, ale może później zobaczyć, że jego głos realnie wpłynął na rozwój aplikacji.

## 2. Główne założenie

Voter nie wymusza na firmach przenoszenia całej historii aktualizacji do siebie.

Aplikacja klienta może nadal posiadać własną historię aktualizacji, a Voter działa jako zewnętrzna warstwa do:

* zbierania feedbacku,
* głosowania,
* prowadzenia publicznej roadmapy,
* publikowania changeloga,
* synchronizacji aktualizacji,
* powiadamiania użytkowników,
* łączenia wdrożonych funkcji z wcześniejszym feedbackiem.

Najważniejsze założenie:

**Aplikacja klienta może być źródłem prawdy dla własnych aktualizacji, a Voter jest źródłem prawdy dla feedbacku, głosów, komentarzy i powiązań między requestami a wdrożeniami.**

## 3. Dla kogo jest Voter

Voter jest skierowany głównie do:

* małych SaaS-ów,
* indie founderów,
* startupów,
* software house’ów,
* zespołów produktowych,
* twórców aplikacji webowych i mobilnych,
* firm, które mają użytkowników i chcą lepiej zbierać pomysły na rozwój produktu.

Najlepszy klient początkowy:

**mały SaaS albo founder, który ma użytkowników, ale feedback jest rozproszony po mailach, Slacku, Discordzie, rozmowach i notatkach.**

## 4. Główna obietnica produktu

**Voter pomaga firmom zbierać pomysły od użytkowników, priorytetyzować funkcje i informować klientów, gdy ich feedback trafia do produktu.**

Krótka wersja po angielsku:

**Collect feedback. Prioritize features. Sync product updates. Close the loop with your users.**

Krótka wersja po polsku:

**Zbieraj feedback, priorytetyzuj funkcje, synchronizuj aktualizacje i pokazuj użytkownikom, że ich głos ma znaczenie.**

## 5. Główne moduły produktu

## 5.1 Feedback Board

Publiczna lub prywatna tablica, na której użytkownicy mogą zgłaszać pomysły i głosować na istniejące requesty.

Funkcje:

* dodawanie feature requestów,
* głosowanie,
* komentarze,
* kategorie,
* tagi,
* wyszukiwarka,
* sortowanie po liczbie głosów,
* filtrowanie po statusie,
* zgłaszanie duplikatów,
* obserwowanie requestów.

Przykładowe statusy requestów:

* Open,
* Under Review,
* Planned,
* In Progress,
* Released,
* Declined.

## 5.2 AI Duplicate Detection

AI pomaga wykrywać podobne zgłoszenia.

Przykład:

Użytkownik chce dodać request:

**„Eksport faktur do PDF”**

System wykrywa, że istnieje już podobny request:

**„Możliwość pobrania faktury jako PDF”**

Voter pokazuje użytkownikowi:

**„Podobny pomysł już istnieje. Możesz na niego zagłosować zamiast tworzyć nowy.”**

Korzyść:

* mniej duplikatów,
* czystszy board,
* lepsze dane dla firmy,
* mniej pracy moderatora.

## 5.3 AI Request Summary

AI może automatycznie streszczać długie requesty i komentarze.

Przykład:

Request ma 25 komentarzy od użytkowników. AI tworzy krótkie podsumowanie:

**Użytkownicy proszą o eksport faktur do PDF, ponieważ potrzebują przekazywać dokumenty księgowości i archiwizować je poza aplikacją. Najczęściej pojawia się potrzeba eksportu pojedynczej faktury oraz eksportu zbiorczego z filtrem dat.**

Korzyść:

* admin szybciej rozumie problem,
* łatwiej ocenić priorytet,
* łatwiej stworzyć zadanie do developmentu.

## 5.4 Roadmapa

Roadmapa pokazuje, co firma planuje zrobić.

Prosty układ:

* Now,
* Next,
* Later,
* Done.

Każdy element roadmapy może być powiązany z requestami z feedback boarda.

Roadmapa może być:

* publiczna,
* prywatna,
* częściowo publiczna,
* dostępna tylko dla zalogowanych użytkowników.

## 5.5 Changelog / Historia aktualizacji

Voter ma moduł historii aktualizacji, ale nie musi być jedynym źródłem changeloga firmy.

Firma może dodawać aktualizacje:

1. ręcznie w Voterze,
2. przez API,
3. przez webhook,
4. przez import CSV/JSON/Markdown,
5. w przyszłości przez integracje z GitHub, Linear, Jira lub własnym systemem.

Każdy wpis aktualizacji może zawierać:

* tytuł,
* opis,
* wersję,
* datę publikacji,
* kategorię: Added / Improved / Fixed,
* screenshot,
* galerię screenów,
* link do oryginalnej aktualizacji w aplikacji klienta,
* powiązane requesty,
* liczbę głosów,
* listę użytkowników, których dotyczyła zmiana.

## 5.6 AI Changelog Writer

AI może pomagać tworzyć wpisy do historii aktualizacji.

Admin podaje krótką notatkę:

**„Dodaliśmy eksport faktur do PDF i poprawiliśmy szybkość listy faktur.”**

AI generuje gotowy changelog:

**Added**

* Dodano możliwość eksportu faktur do PDF.

**Improved**

* Przyspieszono ładowanie listy faktur, szczególnie przy większej liczbie dokumentów.

AI może też przygotować kilka wersji tonu:

* techniczny,
* prosty dla użytkowników,
* marketingowy,
* krótki do popupu,
* dłuższy do changeloga.

## 5.7 Synchronizacja aktualizacji z aplikacji klienta

To jeden z najważniejszych wyróżników Votera.

Firma może mieć własną historię aktualizacji w swojej aplikacji. Voter nie każe jej tego usuwać ani przenosić.

Zamiast tego aplikacja klienta może wysyłać dane do Votera przez API.

Przepływ:

**Aplikacja klienta → Voter API → Changelog w Voterze → powiązanie z feedbackiem → powiadomienie użytkowników**

Każda aktualizacja synchronizowana z aplikacji klienta powinna mieć:

* `external_id`,
* `source`,
* `title`,
* `description`,
* `version`,
* `published_at`,
* `screenshot_url`,
* `original_url`.

Dzięki `external_id` Voter wie, że dana aktualizacja pochodzi z zewnętrznego systemu i nie tworzy duplikatów.

## 5.8 Powiązanie requestów z aktualizacjami

To jest kluczowy mechanizm produktu.

Przykład:

Użytkownicy głosują na request:

**„Dodaj eksport faktur do PDF”**

Request ma:

* 42 głosy,
* 18 komentarzy,
* 12 głosów od płacących klientów.

Po wdrożeniu firma publikuje update:

**„Dodano eksport faktur do PDF”**

Voter pozwala połączyć ten update z requestem.

Efekt:

* request zmienia status na Released,
* przy requestcie pojawia się informacja: **Released in v1.8.0**,
* w changelogu pojawia się informacja: **Based on customer feedback**,
* użytkownicy, którzy głosowali, dostają powiadomienie.

## 5.9 AI Auto-Linking

AI może automatycznie sugerować, które aktualizacje pasują do których requestów.

Przykład:

Nowy changelog entry:

**„Dodano eksport faktur do PDF.”**

AI znajduje podobny request:

**„Możliwość pobierania faktur jako PDF.”**

System sugeruje adminowi:

**„Ten update prawdopodobnie realizuje request z 42 głosami. Czy chcesz je połączyć?”**

Korzyść:

* mniej ręcznej pracy,
* lepsze zamykanie pętli feedbacku,
* mniejsze ryzyko, że firma zapomni powiadomić głosujących.

## 5.10 Widgety

Voter powinien oferować kilka widgetów do osadzenia w aplikacji klienta.

### Widget: Suggest Feature

Użytkownik może zgłosić pomysł bez opuszczania aplikacji klienta.

### Widget: Feedback Board

Użytkownik widzi listę requestów i może głosować.

### Widget: Roadmap

Użytkownik widzi, co jest planowane.

### Widget: What’s New

Użytkownik widzi najnowsze aktualizacje produktu.

### Widget: My Votes

Użytkownik widzi requesty, na które głosował, i ich aktualny status.

## 5.11 AI Feedback Assistant

W widgetcie można dodać lekkiego asystenta AI, który pomaga użytkownikowi lepiej opisać pomysł.

Przykład:

Użytkownik wpisuje:

**„Brakuje PDF do faktur.”**

AI proponuje lepszą wersję:

**„Chciałbym mieć możliwość eksportowania faktur do pliku PDF, aby łatwo przekazywać je księgowości i archiwizować poza aplikacją.”**

AI może też zapytać:

* Do czego potrzebujesz tej funkcji?
* Jak często byś z niej korzystał?
* Czy to blokuje Ci pracę?
* Czy masz przykład obecnego problemu?

Korzyść:

* lepsza jakość feedbacku,
* mniej niejasnych requestów,
* więcej kontekstu dla firmy.

## 5.12 Analytics

Panel analityczny powinien pokazywać:

* najczęściej głosowane requesty,
* requesty z największą liczbą komentarzy,
* requesty od płacących klientów,
* trendy głosów w czasie,
* najaktywniejszych użytkowników,
* statusy requestów,
* liczbę wdrożonych requestów,
* czas od zgłoszenia do wdrożenia,
* skuteczność zamykania pętli feedbacku.

## 5.13 Evidence Score

Evidence Score to ocena siły danego requestu.

Nie chodzi tylko o liczbę głosów. Liczą się też:

* liczba płacących klientów,
* komentarze,
* plan użytkowników,
* MRR klientów, którzy głosowali,
* liczba podobnych requestów,
* strategiczne znaczenie,
* częstotliwość pojawiania się problemu.

Przykład:

**Export invoices to PDF**

* 42 votes,
* 12 paying customers,
* $840 affected MRR,
* 18 comments,
* 3 duplicate requests,
* Evidence Score: High.

## 5.14 AI Prioritization Assistant

AI może pomagać adminowi ocenić, które requesty warto rozważyć jako pierwsze.

AI nie powinno podejmować decyzji za firmę, ale może sugerować:

* requesty o wysokim wpływie,
* requesty od płacących klientów,
* requesty często powtarzane,
* requesty łatwe do wdrożenia,
* requesty powiązane z churnem lub sprzedażą.

Przykład rekomendacji:

**„Eksport faktur do PDF ma wysoki priorytet, ponieważ prosiło o niego 12 płacących klientów, request ma 42 głosy i pojawia się w kilku komentarzach dotyczących księgowości.”**

## 6. Tryby działania Votera

## 6.1 Standalone Portal

Firma dostaje publiczną stronę, np.:

**company.voter.app**

Na stronie znajdują się:

* feedback board,
* roadmapa,
* changelog,
* statusy requestów.

To najprostszy tryb dla małych SaaS-ów.

## 6.2 Embedded Widget

Firma osadza Votera w swojej aplikacji.

Przykład:

Użytkownik w aplikacji X klika:

**Feedback** albo **What’s new**

Otwiera się widget Votera.

To najlepszy tryb dla firm, które chcą mieć feedback i aktualizacje wewnątrz własnej aplikacji.

## 6.3 Sync Mode

Firma ma własną historię aktualizacji.

Aplikacja klienta wysyła update’y do Votera przez API lub webhooki.

Voter synchronizuje dane, łączy je z requestami i powiadamia użytkowników.

To jest ważny wyróżnik produktu.

## 6.4 Headless/API Mode

Firma może używać własnego UI, a Voter może obsługiwać backend feedbacku, głosów, roadmapy, powiadomień i changeloga.

Ten tryb jest dla bardziej technicznych firm, które chcą pełnej kontroli nad wyglądem.

## 7. MVP

Pierwsza wersja Votera powinna zawierać:

1. Rejestrację organizacji.
2. Tworzenie projektu.
3. Publiczny feedback board.
4. Dodawanie requestów.
5. Głosowanie.
6. Komentarze.
7. Statusy requestów.
8. Panel admina.
9. Roadmapę Now / Next / Later / Done.
10. Historię aktualizacji.
11. Screen przy aktualizacji.
12. Powiązanie requestu z aktualizacją.
13. Powiadomienia mailowe po zmianie statusu i po release.
14. Widget Suggest Feature.
15. Widget What’s New.
16. API do dodawania aktualizacji z aplikacji klienta.
17. `external_id` dla synchronizowanych aktualizacji.
18. Podstawowe analytics.
19. AI Duplicate Detection.
20. AI Changelog Writer.
21. AI Request Summary.

To MVP jest już wystarczająco mocne, żeby nie być tylko kopią zwykłego voting boarda.

## 8. Funkcje po MVP

Po MVP można dodać:

* AI Auto-Linking requestów z aktualizacjami,
* AI Prioritization Assistant,
* Evidence Score,
* import changeloga z CSV/JSON/Markdown,
* custom domain,
* white label,
* private boards,
* segmentację użytkowników,
* integracje ze Slackiem,
* integracje z Discordem,
* integracje z GitHubem,
* integracje z Linear/Jira,
* webhooki,
* public API,
* headless mode,
* role i uprawnienia,
* SSO dla większych firm,
* zaawansowane wykresy,
* eksport danych.

## 9. Dane i źródło prawdy

### Dane trzymane w aplikacji klienta

Aplikacja klienta może być źródłem prawdy dla:

* własnej historii aktualizacji,
* release notes,
* wersji aplikacji,
* screenów,
* wewnętrznych informacji o produkcie.

### Dane trzymane w Voterze

Voter jest źródłem prawdy dla:

* feature requestów,
* głosów,
* komentarzy,
* statusów,
* roadmapy,
* powiązań requestów z update’ami,
* powiadomień,
* danych feedbackowych,
* Evidence Score.

### Dane synchronizowane

Historia aktualizacji może być synchronizowana między aplikacją klienta a Voterem.

Voter powinien przechowywać:

* `external_id`,
* `source`,
* `source_url`,
* `last_synced_at`.

Dzięki temu Voter może aktualizować istniejące wpisy zamiast tworzyć duplikaty.

## 10. Przykładowy flow użytkownika

1. Użytkownik otwiera widget w aplikacji klienta.
2. Wpisuje pomysł: **„Chcę eksport faktur do PDF.”**
3. AI poprawia opis i sugeruje podobne requesty.
4. Użytkownik widzi, że podobny request już istnieje.
5. Głosuje na istniejący request.
6. Firma widzi, że request ma dużo głosów.
7. Admin zmienia status na Planned.
8. Użytkownik dostaje powiadomienie.
9. Po wdrożeniu aplikacja klienta wysyła update do Votera przez API.
10. AI sugeruje powiązanie update’u z requestem.
11. Admin zatwierdza.
12. Request zmienia status na Released.
13. Głosujący dostają maila.
14. W changelogu pojawia się informacja: **Based on customer feedback**.

## 11. Przykładowy flow firmy

1. Firma zakłada konto w Voterze.
2. Tworzy projekt.
3. Ustawia publiczny board.
4. Osadza widget Suggest Feature w swojej aplikacji.
5. Opcjonalnie podłącza API do synchronizacji aktualizacji.
6. Użytkownicy zaczynają zgłaszać pomysły.
7. AI pomaga usuwać duplikaty i streszczać feedback.
8. Firma wybiera najlepsze requesty do roadmapy.
9. Po wdrożeniu publikuje aktualizację.
10. Voter informuje użytkowników, że ich feedback został zrealizowany.

## 12. Funkcje AI w Voterze

AI powinno być użyte tam, gdzie realnie zmniejsza pracę admina lub poprawia jakość feedbacku.

Najważniejsze funkcje AI:

1. **AI Duplicate Detection**
   Wykrywanie podobnych requestów.

2. **AI Request Summary**
   Streszczanie requestów i komentarzy.

3. **AI Feedback Assistant**
   Pomoc użytkownikowi w lepszym opisaniu pomysłu.

4. **AI Changelog Writer**
   Generowanie wpisów do historii aktualizacji.

5. **AI Auto-Linking**
   Sugerowanie powiązań między requestami a update’ami.

6. **AI Prioritization Assistant**
   Pomoc w ocenie, które requesty warto rozważyć.

7. **AI Translation**
   Automatyczne tłumaczenie requestów i changeloga na inne języki.

8. **AI Tone Adjuster**
   Przepisywanie changeloga na styl prosty, techniczny, marketingowy lub krótki.

## 13. Pricing

Proponowany model cenowy:

### Free

Dla małych projektów.

* 1 projekt,
* limit requestów,
* podstawowy feedback board,
* podstawowa roadmapa,
* branding Voter.

### Starter — $9–15/mies.

Dla indie founderów.

* więcej requestów,
* changelog,
* podstawowy widget,
* powiadomienia mailowe,
* podstawowe analytics.

### Pro — $29–49/mies.

Dla małych SaaS-ów.

* custom domain,
* brak brandingu Voter,
* widget What’s New,
* API do synchronizacji changeloga,
* AI Changelog Writer,
* AI Duplicate Detection,
* screeny przy update’ach,
* więcej projektów.

### Team — $79–149/mies.

Dla zespołów.

* role i uprawnienia,
* private boards,
* segmentacja użytkowników,
* Evidence Score,
* AI Prioritization Assistant,
* integracje,
* webhooki,
* zaawansowane analytics.

## 14. Rekomendowany stack

Rekomendowany stack dla Votera:

* Frontend: Vue 3,
* Backend: Spring Boot,
* Baza danych: PostgreSQL,
* Cache i kolejki: Redis,
* Pliki i screeny: S3-compatible storage,
* Maile: Resend, Postmark albo Amazon SES,
* Widget: osobny lekki JavaScript bundle,
* API: REST,
* Auth: JWT/session dla adminów, magic link lub signed user token dla użytkowników,
* AI: integracja z modelem LLM przez osobny serwis lub moduł backendowy.

Jeżeli zależy nam na szybkości API i stabilności, sensowny wybór to:

**Vue + Spring Boot + PostgreSQL + Redis**

## 15. Najważniejsze wyróżniki Votera

Voter powinien wyróżniać się nie samym głosowaniem, ale całym procesem zamykania pętli feedbacku.

Najważniejsze wyróżniki:

1. Synchronizacja historii aktualizacji z aplikacji klienta.
2. Łączenie update’ów z requestami.
3. Powiadamianie użytkowników, gdy ich feedback został wdrożony.
4. AI do wykrywania duplikatów i streszczania feedbacku.
5. AI do generowania changeloga.
6. Widget What’s New.
7. Screeny i media przy aktualizacjach.
8. Evidence Score pokazujący, które requesty mają realną wartość biznesową.
9. Tryb standalone, widget, sync i headless.
10. Brak wymuszania migracji danych z aplikacji klienta.

## 16. Najważniejsze zdanie produktowe

**Voter to nie tylko narzędzie do głosowania na funkcje. To system, który łączy feedback użytkowników z roadmapą, historią aktualizacji i powiadomieniami, żeby firmy mogły pokazać klientom, że ich głos naprawdę wpływa na rozwój produktu.**


