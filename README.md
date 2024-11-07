# Event Management System

Projekt zarządzania wydarzeniami. System zapewnia pełny CRUD (ang. Create, Read, Update, Delete) dla wydarzeń oraz przypisanych do nich kategorii.
Wydażenia widoczne są na osi czasu, w formie tabelki, która prezentuje podstawowe dane na temat danego wydarzenia.

![image](https://github.com/user-attachments/assets/a4009cdd-6bff-41e1-9842-cb88c6dbaabf)

Projekt korzysta z frameworka Laravel oraz Blade jako silnika szablonów.

## Spis treści
- [Wymagania](#wymagania)
- [Instalacja](#instalacja)
- [Uruchamianie aplikacji](#uruchamianie-aplikacji)
- [Struktura katalogów aplikacji](#struktura-katalogów-aplikacji)
- [Struktura bazy danych](#struktura-bazy-danych)
- [Opis kodu źródłowego](#opis-kodu-źródłowego)
- [Zrzuty ekranu](#zrzuty-ekranu)

## Wymagania

Aby uruchomić projekt lokalnie, należy mieć zainstalowane następujące oprogramowanie:

- [XAMPP](https://www.apachefriends.org/index.html) (wraz z PHP wersja >= 8.2 oraz MySQGL)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (wersja 14 lub wyższa)
- [npm](https://www.npmjs.com/) (wersja 8 lub wyższa)

## Instalacja

1. **Klonowanie repozytorium**

   Sklonuj repozytorium na swój komputer za pomocą komendy:

   ```bash
   git clone https://github.com/Michal-Marciniak/Projekt_1.git
   cd Projekt_1

## Uruchamianie aplikacji

1. **Uruchomienie XAMPP**

   Uruchom program XAMPP jako administrator oraz włącz w nim dwa moduły (Apache oraz MySQL).\
   Po poprawnym uruchomieniu modułów powinny się one świecić na jasno-zielony kolor, jak również powinny zostać do nich przypisane porty.

   Apache - **80, 443**\
   MySQL - **3306**

   ![image](https://github.com/user-attachments/assets/f84a1b36-6601-4cd8-9cfa-f147e830c051)

2. **Budowanie oraz uruchomienie aplikacji**

    W celu zbudowania oraz uruchomienia aplikacji, należy w folderze projektu uruchomić skrypt:

    ```bash
    npm run build
    ```

    > **⚠️ WAŻNE**: Powyższy skrypt należy uruchomić tylko raz, po sklonowaniu repozytorium!
    > 
    > W przypadku chęci dalszego korzystania z aplikacji, należy ją uruchamiać poprzez skrypt `npm run serve`

    Po poprawnym zbudowaniu się aplikacji, w konsoli powinien pojawić się następujący komunikat
   
    ![image](https://github.com/user-attachments/assets/7e67b6fd-e431-440f-9150-44ac49e06aa3)

    informujący o tym, że aplikacja działa na porcie 8000, jak również poprawnie wykonane zostały skrypty dodające użytkownika admin do bazy danych, oraz uzupełniające tabele wydarzeń oraz kategorii domyślnymi wartościami.
   
    Dzięki temu, już po uruchomieniu aplikacji będzie można zapoznać się z jej funkcjonalnościami, bez konieczności ręcznego tworzenia nowego użytkownika, oraz dodawania kategorii i wydarzeń.

    W celu korzystania z aplikacji, należy w przeglądarce wejść na adres URL [http://127.0.0.1:8000/](http://127.0.0.1:8000/)

## Struktura katalogów aplikacji

1. **Struktura katalogów aplikacji**

   - **`app/`**: Katalog z logiką aplikacji (modele, kontrolery, widoki itp.)
   - **`database/migrations/`**: Katalog z migracjami bazy danych
   - **`resources/views/`**: Katalog z widokami
   - **`routes/web.php`**: Plik z definicjami ścieżek aplikacji (routingu)
   - **`public/`**: Katalog publiczny, dostępny z poziomu przeglądarki
   - **`node_modules/`**: Zainstalowane zależności Node.js
   - **`package.json`**: Plik konfiguracyjny npm
   - **`composer.json`**: Plik konfiguracyjny Composer
   
## Struktura bazy danych

![image](https://github.com/user-attachments/assets/87c6a868-224e-42b0-b299-19d5c1dcc384)

Tabele niezaznaczone w czerwonej ramce, są tabelami domyślnie tworzonymi przez framework Laravel, natomiast 3 tabele zaznaczone w czerwonej ramce są tabelami utworzonymi poprzez napisane w kodzie migracje, 
znajdujące się w folderze `/database/migrations`

![image](https://github.com/user-attachments/assets/89e3f6b6-8930-422d-b82b-745bc48471f1)

**Struktura oraz opis tabel**

1. Tabela **users**
   
   ![image](https://github.com/user-attachments/assets/83b00f37-44bd-4a5c-95c4-2a99e1cec62c)

   Tabela **users** składa się z następujących kolumn:
   - **`id`** - przechowuje id użytkowników, używana jako klucz główny tabeli (ang. primary key)
   - **`name`** - przechowuje nazwy użytkowników
   - **`email`** - przechowuje emaile użytkowników
   - **`password`** - przechowuje hasła użytkowników w formie hashy
   - **`created_at`** - kolumna tworzona automatycznie przez framework Laravel
   - **`updated_at`** - kolumna tworzona automatycznie przez framework Laravel

2. Tabela **categories**

   d

3. Tabela **events**

   f

   
