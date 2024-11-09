# Event Management System

Projekt zarządzania wydarzeniami. System zapewnia pełny CRUD (ang. Create, Read, Update, Delete) dla wydarzeń oraz przypisanych do nich kategorii.
Wydażenia widoczne są na osi czasu, w formie tabelki, która prezentuje podstawowe dane na temat danego wydarzenia.

![image](https://github.com/user-attachments/assets/a4009cdd-6bff-41e1-9842-cb88c6dbaabf)

Projekt korzysta z frameworka Laravel oraz Blade jako silnika szablonów.

> #### Dane logowania do aplikacji na konto admin (Aby mieć dostęp do akcji CRUD na wydarzeniach oraz kategoriach)
> 
> **login**: `'admin@admin.com'`\
> **hasło**: `qweQWE123!@#`

## Spis treści
- [Wymagania](#wymagania)
- [Instalacja](#instalacja)
- [Uruchamianie aplikacji](#uruchamianie-aplikacji)
- [Struktura katalogów aplikacji](#struktura-katalogów-aplikacji)
- [Struktura bazy danych](#struktura-bazy-danych)
- [Opis kodu źródłowego](#opis-kodu-źródłowego)
- [Zrzuty ekranu](#zrzuty-ekranu)
- [Drukowanie zawartości pamiętnika](#drukowanie-zawartości-pamiętnika)

# Wymagania

Aby uruchomić projekt lokalnie, należy mieć zainstalowane następujące oprogramowanie:

- [XAMPP](https://www.apachefriends.org/index.html) (wraz z PHP wersja >= 8.2 oraz MySQGL)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (wersja 14 lub wyższa)
- [npm](https://www.npmjs.com/) (wersja 8 lub wyższa)

# Instalacja

1. **Klonowanie repozytorium**

   Sklonuj repozytorium na swój komputer za pomocą komendy:

   ```bash
   git clone https://github.com/Michal-Marciniak/Projekt_1.git
   cd Projekt_1

2. **Pobranie repozytorium w formie .zip**

   Wejście na [stronę z repozytorium](https://github.com/Michal-Marciniak/Projekt_1) oraz pobranie go jako .zip
   ![image](https://github.com/user-attachments/assets/3f293984-9eb0-42a7-85ed-589baa3d8a91)

# Uruchamianie aplikacji

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

# Struktura katalogów aplikacji

1. **Struktura katalogów aplikacji**

   - **`app/`**: Katalog z logiką aplikacji (modele, kontrolery, widoki itp.)
   - **`database/migrations/`**: Katalog z migracjami bazy danych
   - **`resources/views/`**: Katalog z widokami
   - **`routes/web.php`**: Plik z definicjami ścieżek aplikacji (routingu)
   - **`public/`**: Katalog publiczny, dostępny z poziomu przeglądarki
   - **`node_modules/`**: Zainstalowane zależności Node.js
   - **`package.json`**: Plik konfiguracyjny npm
   - **`composer.json`**: Plik konfiguracyjny Composer
   
# Struktura bazy danych

![image](https://github.com/user-attachments/assets/87c6a868-224e-42b0-b299-19d5c1dcc384)

Tabele niezaznaczone w czerwonej ramce, są tabelami domyślnie tworzonymi przez framework Laravel, natomiast 3 tabele zaznaczone w czerwonej ramce są tabelami utworzonymi poprzez napisane w kodzie migracje, 
znajdujące się w folderze `/database/migrations`

![image](https://github.com/user-attachments/assets/89e3f6b6-8930-422d-b82b-745bc48471f1)

## **Struktura oraz opis tabel**

### 1. Tabela **users**

![image](https://github.com/user-attachments/assets/9802595c-ab20-461e-aac5-ceaf03b58661)

Tabela **users** składa się z następujących kolumn:

- `id` - przechowuje id użytkowników, używana jako klucz główny tabeli (ang. primary key)
- `name` - przechowuje nazwy użytkowników
- `email` - przechowuje emaile użytkowników
- `password` - przechowuje hasła użytkowników w formie hashy
- `created_at` - kolumna tworzona automatycznie przez framework Laravel
- `updated_at` - kolumna tworzona automatycznie przez framework Laravel

### 2. Tabela **categories**

![image](https://github.com/user-attachments/assets/3444b0cf-5a24-4007-b002-fb2699773080)

Tabela **categories** składa się z następujących kolumn:

- `id` - przechowuje id kategorii, używana jako klucz główny tabeli (ang. primary key)
- `name` - przechowuje nazwy kategorii
- `icon` - przechowuje ikonki kategorii
- `created_at` - kolumna tworzona automatycznie przez framework Laravel
- `updated_at` - kolumna tworzona automatycznie przez framework Laravel

### 3. Tabela **events**

![image](https://github.com/user-attachments/assets/aa0d5192-adf4-43d9-9caa-70ec93b21c72)

Tabela **events** składa się z następujących kolumn:

- `id` - przechowuje id wydarzeń, używana jako klucz główny tabeli (ang. primary key)
- `title` - przechowuje tytuły wydarzeń
- `description` - przechowuje opisy wydarzeń
- `start_date` - przechowuje daty początkowe wydarzeń
- `end_date` - przechowuje daty końcowe wydarzeń (dodana walidacja na to, aby data końcowa nie mogła być wcześniejsza niż data początkowa)
- `image` - przechowuje zdjęcia wydarzeń
- `category_name` - przechowuje nazwę kategorii przypisaną do danych wydarzeń
- `category_id` - przechowuje id kategorii przypisaną do danych wydarzeń, używana jako klucz obcy do kolumny `id` w tabeli **categories**
- `created_at` - kolumna tworzona automatycznie przez framework Laravel
- `updated_at` - kolumna tworzona automatycznie przez framework Laravel

Tabela **events** została zaprojektowana w taki sposób, aby kolumna `category_id` była kluczem obcym do kolumny `id` w tabeli **categories**.\
Dzięki temu, zachowana jest spójność w bazie danych, oraz zmiany w tabeli kategorii, widoczne są również w tabeli wydarzeń.


# Opis kodu źródłowego

## **Architektura aplikacji**

   
 Aplikacja została stworzona w oparciu o wzorzec architektoniczny MVC (ang. Model-View-Controller), co pozwala na wyraźne rozdzielenie logiki biznesowej, interfejsu użytkownika i logiki sterowania. Aplikacja umożliwia użytkownikom zarządzanie wydarzeniami oraz przypisywanie ich do odpowiednich kategorii. Oto struktura dokumentacji aplikacji:
    
**Model**: Odpowiada za logikę biznesową i dostęp do danych. Model zarządza danymi dotyczącymi wydarzeń (np. tytuł, opis, data) oraz kategorii (np. nazwa kategorii), a także obsługuje operacje CRUD (ang. Create, Read, Update, Delete) dla tych danych. Model komunikuje się z bazą danych i zapewnia spójność danych w aplikacji.

Modele znajdują się w folderze `app/Models` \
![image](https://github.com/user-attachments/assets/0adc88a5-5b63-4f6d-a452-15a0b641e899)

**View**: Przedstawia dane użytkownikowi i umożliwia interakcję z aplikacją. Widoki renderują interfejs użytkownika (UI) i wyświetlają dane z modelu, takie jak lista wydarzeń oraz szczegóły każdego z nich.

Widoki znajdują się w folderze `resources/views` \
![image](https://github.com/user-attachments/assets/fd6e0b6f-580f-45ee-9926-fe85f8bab28e)

W aplikacji do zarządzania wydarzeniami, do tworzenia widoków wykorzystano główny szablon o nazwie `layout.blade.php`, który stanowi podstawę interfejsu użytkownika i jest rozszerzany przez wszystkie inne widoki. Szablon ten zawiera wspólną strukturę dla całej aplikacji, taką jak nagłówek i nawigacja, co zapewnia spójny wygląd i ułatwia utrzymanie kodu.

W szablonie `layout.blade.php` zastosowano funkcję `@yield()`, która umożliwia definiowanie dynamicznych miejsc do wstawiania treści. Widoki rozszerzające `layout.blade.php` mogą wypełniać te miejsca treściami specyficznymi dla danego widoku, co pozwala na dostosowanie interfejsu do różnych funkcji aplikacji, takich jak wyświetlanie listy wydarzeń czy szczegółów wydarzenia.

Dzięki tej strukturze, każdy widok może zawierać tylko swoją unikalną zawartość, bez konieczności powielania wspólnych elementów, co zwiększa modularność, czytelność i ułatwia zarządzanie wyglądem aplikacji.

**Controller**: Steruje przepływem danych między modelem a widokiem. Kontroler odbiera akcje użytkownika (np. dodanie nowego wydarzenia, edycja, usuwanie) i odpowiednio aktualizuje model, a następnie aktualizuje widok. Kontroler pełni funkcję pośrednika, zarządzając logiką aplikacji i przepływem danych.

Kontrolery znajdują się w folderze `app/Http/Controllers` \
![image](https://github.com/user-attachments/assets/af9ae2cc-1653-4662-8bb9-a7cdfed0f7ff)

Kontrolery zostały zorganizowane w grupy w celu rozdzielenia odpowiedzialności i ułatwienia zarządzania kodem:

**Kontroler Autentykacji**: Odpowiadają za operacje związane z logowaniem, rejestracją i zarządzaniem sesjami użytkowników. Te kontrolery obsługują funkcje, takie jak logowanie i wylogowywanie użytkownika, a także resetowanie hasła, co zapewnia bezpieczny dostęp do aplikacji.

**Kontroler Kategorii**: Są odpowiedzialne za operacje na kategoriach wydarzeń. Te kontrolery obsługują procesy tworzenia, edycji, usuwania i wyświetlania kategorii, co umożliwia kategoryzowanie wydarzeń zgodnie z potrzebami użytkowników.

**Kontroler Wydarzeń**: Zarządzają logiką dotyczącą samych wydarzeń, w tym ich tworzeniem, edytowaniem, wyświetlaniem szczegółów oraz usuwaniem. Kontrolery te obsługują operacje CRUD i dbają o aktualizację danych w bazie.

Podział kontrolerów na grupy pozwala na lepsze zarządzanie kodem, zwiększa jego czytelność i modularność. Dzięki temu każdy kontroler ma jasno określoną odpowiedzialność, co ułatwia rozwój i konserwację aplikacji.

## **Routing Aplikacji**
Routing w aplikacji został zorganizowany w trzy główne grupy: **Routy Autentykacji**, **Routy Wydarzeń** oraz **Routy Kategorii**. Każda grupa obsługuje określone funkcje, co zapewnia lepszą czytelność i łatwiejszą nawigację.

### 1. **Ścieżki Autentykacji**

Ścieżki te obsługują procesy logowania, rejestracji, zarządzania kontem użytkownika oraz resetowania hasła. Wszystkie są przypisane do odpowiednich metod w kontrolerze `AuthController`.

| Metoda | Ścieżka           | Opis                                  | Nazwa Routy           |
|--------|--------------------|---------------------------------------|------------------------|
| `GET`  | `/login`          | Wyświetla formularz logowania         | `login-form`          |
| `POST` | `/login`          | Przetwarza logowanie użytkownika      | `login-user`          |
| `GET`  | `/register`       | Wyświetla formularz rejestracji       | `register-form`       |
| `POST` | `/register`       | Przetwarza rejestrację użytkownika    | `register-user`       |
| `GET`  | `/logout`         | Wylogowuje użytkownika                | `logout`              |
| `GET`  | `/my-account`     | Wyświetla profil użytkownika          | `my-account-form`     |
| `GET`  | `/reset-password` | Wyświetla formularz resetowania hasła | `reset-password-form` |
| `POST` | `/reset-password` | Przetwarza resetowanie hasła          | `reset-password`      |

### 2. **Ścieżki Wydarzeń**

Ścieżki te zarządzają operacjami CRUD dla wydarzeń, umożliwiając dodawanie, edytowanie, usuwanie oraz filtrowanie wydarzeń. Są przypisane do metod w `EventsController`.

| Metoda | Ścieżka                   | Opis                                     | Nazwa Routy          |
|--------|----------------------------|------------------------------------------|-----------------------|
| `GET`  | `/`                        | Wyświetla stronę główną (dashboard)      | `dashboard-page`     |
| `GET`  | `/events/add`              | Wyświetla formularz dodawania wydarzenia | `add-event-form`     |
| `POST` | `/events/add`              | Przetwarza dodanie wydarzenia            | `add-event`          |
| `GET`  | `/events/edit/{id}`        | Wyświetla formularz edycji wydarzenia    | -                    |
| `POST` | `/events/edit/{id}`        | Przetwarza edycję wydarzenia             | -                    |
| `GET`  | `/events/delete/{id}`      | Usuwa wydarzenie                         | -                    |
| `GET`  | `/events/filter/{categoryName}` | Filtruje wydarzenia według kategorii | -                    |

### 3. **Ścieżki Kategorii**

Ścieżki te odpowiadają za zarządzanie kategoriami, w tym ich tworzenie, edytowanie i usuwanie, a także wyświetlanie listy kategorii. Przypisane są do metod w `CategoriesController`.

| Metoda | Ścieżka                   | Opis                                 | Nazwa Routy         |
|--------|----------------------------|--------------------------------------|----------------------|
| `GET`  | `/categories/add`          | Wyświetla formularz dodawania kategorii | `add-category-form` |
| `POST` | `/categories/add`          | Przetwarza dodanie kategorii            | `add-category`      |
| `GET`  | `/categories`              | Wyświetla listę kategorii               | `categories-list`   |
| `GET`  | `/categories/edit/{id}`    | Wyświetla formularz edycji kategorii    | -                   |
| `POST` | `/categories/edit/{id}`    | Przetwarza edycję kategorii             | -                   |
| `GET`  | `/categories/delete/{id}`  | Usuwa kategorię                         | -                   |

Struktura routingu w aplikacji jest zoptymalizowana, aby zapewnić łatwy dostęp do wszystkich kluczowych funkcji związanych z autoryzacją, zarządzaniem wydarzeniami i kategoriami. Podział na grupy funkcjonalne poprawia modularność i czytelność kodu, ułatwiając dalszy rozwój i utrzymanie aplikacji.

## **Własne komendy do tworzenia bazy danych oraz uzupełniania jej domyślnymi wartościami**

Poniżej opisano niestandardowe komendy: `CreateDatabase`, `AddAdminUser` i `SeedDefaultData`.\
Każda z tych komend pełni konkretną rolę w procesie przygotowywania i zarządzania danymi w aplikacji.

### 1. **CreateDatabase.php**

```php
class CreateDatabase extends Command
{
    protected $signature = 'db:create';
    protected $description = 'Create the database if it does not exist';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $database = config('database.connections.mysql.database');

        config(['database.connections.mysql.database' => null]);

        $query = "CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";

        DB::statement($query);

        config(['database.connections.mysql.database' => $database]);

        $this->info("Database `$database` created or already exists.");
    }
}
```
Ta komenda jest odpowiedzialna za tworzenie bazy danych, która będzie używana przez aplikację.
Łączy się z serwerem bazy danych, wykorzystując dane uwierzytelniające zapisane w pliku .env (jak DB_HOST, DB_PORT, DB_USERNAME, DB_PASSWORD).
Sprawdza, czy baza danych o podanej nazwie (DB_DATABASE w pliku .env) już istnieje.
Jeśli baza danych nie istnieje, komenda tworzy nową bazę.

### 2. **AddAdminUser.php**

```php
class AddAdminUser extends Command
{
    protected $signature = 'db:add-admin-user';
    protected $description = 'Add an admin user to the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = 'admin';
        $email = 'admin@admin.com';
        $password = 'qweQWE123!@#';

        $adminUser = User::create([
            'id' => 1,
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->info("Admin user created successfully");
    }
}
```
Komenda ta automatycznie dodaje domyślnego użytkownika z rolą administratora do aplikacji, co ułatwia dostęp i zarządzanie aplikacją podczas testów.

### 3. **SeedDefaultData.php**

```php
class SeedDefaultData extends Command
{
    protected $signature = 'db:seed-default';
    protected $description = 'Seed default categories and events';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $categories = [
            ['id' => 1, 'name' => 'Category 1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Category 2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Category 3', 'created_at' => now(), 'updated_at' => now()],
        ];

        $events = [
            [
                'id' => 1,
                'title' => 'Event 1',
                'description' => 'Event 1 description',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(1),
                'category_name' => 'Category 1',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'title' => 'Event 2',
                'description' => 'Event 2 description',
                'start_date' => Carbon::now()->addDays(2),
                'end_date' => Carbon::now()->addDays(3),
                'category_name' => 'Category 2',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'title' => 'Event 3',
                'description' => 'Event 3 description',
                'start_date' => Carbon::now()->addDays(4),
                'end_date' => Carbon::now()->addDays(5),
                'category_name' => 'Category 3',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('categories')->insertOrIgnore($categories);
        DB::table('events')->insertOrIgnore($events);

        $this->info('Default categories and events seeded successfully.');
    }
}
```
Komenda zasila bazę danych domyślnymi wartościami, które są użyteczne do wstępnego wypełnienia tabel z danymi, takimi jak wydarzenia i kategorie.


## **Skrypty budujące oraz uruchamiające aplikację znajdujące się w pliku package.json**

### 1. Skrypt `serve`
Skrypt `serve` uruchamia lokalny serwer PHP Laravel:

- **`php artisan serve`** – Uruchamia serwer developerski Laravel na domyślnym porcie `8000`. Serwer ten pozwala na testowanie aplikacji lokalnie podczas procesu tworzenia.

### 2. Skrypt `build`
Skrypt `build` zawiera pełen zestaw komend potrzebnych do przygotowania i uruchomienia aplikacji od podstaw. Poniżej opis poszczególnych komend:

- **`cp .env.example .env`** – Kopiuje przykładowy plik konfiguracyjny `.env.example` i tworzy plik `.env` z podstawową konfiguracją środowiska.
- **`npm install`** – Instaluje wszystkie zależności front-endowe zdefiniowane w `package.json`.
- **`composer install`** – Instaluje wszystkie zależności backendowe zdefiniowane w `composer.json`.
- **`composer dump-autoload`** – Optymalizuje ładowanie klas w Laravel, co skraca czas ładowania plików klas.
- **`php artisan key:generate`** – Generuje klucz aplikacji, niezbędny do bezpiecznego szyfrowania danych w Laravel.
- **`php artisan db:create`** – Tworzy nową bazę danych na podstawie konfiguracji w `.env` (wymaga, aby komenda `db:create` była zdefiniowana w aplikacji).
- **`php artisan migrate`** – Przeprowadza migracje, tworząc struktury tabel i relacje w bazie danych.
- **`php artisan db:add-admin-user`** – Dodaje domyślnego administratora do aplikacji (komenda wymaga zdefiniowania w kodzie).
- **`php artisan db:seed-default`** – Zasila bazę danych domyślnymi danymi (również wymaga niestandardowego seeda).
- **`php artisan storage:link`** – Tworzy symboliczne linki do katalogu `storage`, aby pliki były dostępne publicznie.
- **`php artisan serve`** – Ponownie uruchamia lokalny serwer developerski Laravel na porcie `8000`.

### **Opis**
- Skrypt `serve` nadaje się do codziennego uruchamiania aplikacji na lokalnym serwerze.
- Skrypt `build` przygotowuje aplikację do działania od zera, wykonując wszystkie konieczne kroki, od instalacji zależności po przygotowanie bazy danych.


## **Migracje**

Poniżej znajduje się opis migracji użytych do stworzenia tabel: `users`, `categories`, i `events` w bazie danych aplikacji.

### Migracja `users`
Tworzy tabelę użytkowników z informacjami o nazwie, e-mailu oraz haśle.

```php
public function up(): void
{
    Schema::create('users', function (Blueprint $table) {
        $table->id()->autoIncrement();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->timestamps();
    });
}
```
Opis Kolumn:

- `id` – Klucz główny, automatycznie inkrementowany.
- `name` – Nazwa użytkownika, przechowywana jako string.
- `email` – Unikalny adres e-mail użytkownika.
- `password` – Hasło użytkownika.
- `timestamps` – Automatycznie dodane znaczniki czasu (created_at i updated_at).


### Migracja `categories`
Tworzy tabelę kategorii, z których każda może posiadać nazwę i opcjonalną ikonę.

```php
public function up(): void
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id()->autoIncrement();
        $table->string('name');
        $table->string('icon')->nullable();
        $table->timestamps();
    });
}
```
Opis Kolumn:

- `id` – Klucz główny, automatycznie inkrementowany.
- `name` – Nazwa kategorii.
- `icon` – Opcjonalna ikona kategorii.
- `timestamps` – Automatycznie dodane znaczniki czasu (created_at i updated_at).


### Migracja `events`
Tworzy tabelę wydarzeń z powiązanymi kategoriami oraz szczegółowymi informacjami o każdym wydarzeniu.

```php
public function up(): void
{
    Schema::create('events', function (Blueprint $table) {
        $table->id()->autoIncrement();
        $table->string('title');
        $table->text('description');
        $table->date('start_date');
        $table->date('end_date');
        $table->string('image')->nullable();
        $table->string('category_name');
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}
```
Opis Kolumn:

- `id` – Klucz główny, automatycznie inkrementowany.
- `title` – Tytuł wydarzenia.
- `description` – Opis wydarzenia.
- `start_date` – Data rozpoczęcia wydarzenia.
- `end_date` – Data zakończenia wydarzenia.
- `image` – Opcjonalne zdjęcie wydarzenia.
- `category_name` – Nazwa powiązanej kategorii.
- `category_id` – Klucz obcy odnoszący się do tabeli categories.
- `timestamps` – Automatycznie dodane znaczniki czasu (created_at i updated_at).


## **Kontrolery (ang. Controllers)**
### Kontroler `AuthController`

Poniżej znajduje się lista funkcji w `AuthController` wraz z krótkimi opisami ich działania.

- **`loginForm()`** – Wyświetla formularz logowania dla użytkownika.
- **`loginUser(Request $request)`** – Obsługuje proces logowania użytkownika, weryfikując dane logowania i zapisując sesję po pomyślnym logowaniu.
- **`registerForm()`** – Wyświetla formularz rejestracji dla nowego użytkownika.
- **`registerUser(Request $request)`** – Obsługuje rejestrację użytkownika, walidując dane i tworząc nowego użytkownika w bazie danych.
- **`logout()`** – Wylogowuje użytkownika i usuwa wszystkie dane sesji.
- **`myAccountForm()`** – Wyświetla formularz szczegółów konta użytkownika.
- **`resetPasswordForm()`** – Wyświetla formularz zmiany hasła.
- **`resetPassword(Request $request)`** – Obsługuje zmianę hasła, walidując stare hasło i aktualizując hasło użytkownika na nowe.

---

### Kontroler `CategoriesController`

Poniżej znajduje się lista funkcji w `CategoriesController` wraz z krótkimi opisami ich działania.

- **`addCategoryForm()`** – Wyświetla formularz dodawania nowej kategorii.
- **`addCategory(Request $request)`** – Obsługuje dodawanie nowej kategorii, walidując dane i zapisując kategorię w bazie.
- **`categoriesList()`** – Wyświetla listę wszystkich kategorii.
- **`editCategoryForm(int $id)`** – Wyświetla formularz edycji wybranej kategorii.
- **`editCategory(Request $request, int $id)`** – Obsługuje edycję kategorii, aktualizując nazwę lub ikonę.
- **`deleteCategory(int $id)`** – Usuwa wybraną kategorię po upewnieniu się, że nie jest powiązana z żadnymi wydarzeniami.

---

### Kontroler `EventsController`

Poniżej znajduje się lista funkcji w `EventsController` wraz z krótkimi opisami ich działania.

- **`dashboardPage()`** – Wyświetla stronę główną z listą wydarzeń i kategorii.
- **`addEventForm()`** – Wyświetla formularz dodawania nowego wydarzenia.
- **`addEvent(Request $request)`** – Obsługuje dodawanie nowego wydarzenia, walidując dane i zapisując wydarzenie w bazie.
- **`editEventForm(int $id)`** – Wyświetla formularz edycji wybranego wydarzenia.
- **`editEvent(Request $request, int $id)`** – Obsługuje edycję wydarzenia, aktualizując dane, takie jak tytuł, opis, daty i kategoria.
- **`deleteEvent(int $id)`** – Usuwa wybrane wydarzenie z bazy danych.
- **`filterEvents(string $category_name)`** – Filtruje listę wydarzeń według wybranej kategorii lub wyświetla wszystkie wydarzenia.

# Zrzuty ekranu

## Autentykacja

---

### Logowanie
![image](https://github.com/user-attachments/assets/15318ec9-9fb6-4478-8968-16cdb153884f)
![image](https://github.com/user-attachments/assets/5d7e96c5-f56e-4555-88b7-ba4390ae51ac)

### Rejestracja
![image](https://github.com/user-attachments/assets/610319d3-d2dd-4a18-9c02-932d12bac37f)

### Resetowanie hasła
![image](https://github.com/user-attachments/assets/5219540f-9dc1-4118-973e-c2c4b53bf2bf)
![image](https://github.com/user-attachments/assets/ae675381-7806-4678-8e2e-1feb5bb87f49)
![image](https://github.com/user-attachments/assets/0934851c-b088-404f-aa69-97fe905d5b0f)
![image](https://github.com/user-attachments/assets/6bfd9060-ef26-47d5-8414-8a49fad27e66)

### Operacje Edycji/Usuwania wydarzeń/kategorii tylko dla zalogowanych użytkowników
| Użytkownik niezalogowany | Użytkownik zalogowany |
|-----------------------|----------------------------------------------------------------------------------|
| ![image](https://github.com/user-attachments/assets/411dd080-5ef8-4d85-8236-f65de7f18416) | ![image](https://github.com/user-attachments/assets/58b9fd15-79f2-4d9a-9921-00189346b553) |
| ![image](https://github.com/user-attachments/assets/b4016889-a1bb-4e7a-abdb-21d4ad2b3a20) | ![image](https://github.com/user-attachments/assets/2a996287-c6eb-43a5-9127-0347c71b604a) ![image](https://github.com/user-attachments/assets/b1e2a821-5877-4263-bcbd-9dd55788a80e) |


## Wydarzenia

---

### Lista Wydarzeń
![image](https://github.com/user-attachments/assets/b5618640-f741-4afe-824a-42f645f2e9cb)

### Dodawanie Wydarzenia
![image](https://github.com/user-attachments/assets/ae580878-98cf-4945-aa72-d061d36329a9)
![image](https://github.com/user-attachments/assets/3972c517-f610-47e2-b152-1453db5062c4)

### Edycja Wydarzenia
![image](https://github.com/user-attachments/assets/e52e649b-caa8-4ccc-8b4f-9985779b35b7)
![image](https://github.com/user-attachments/assets/b67bb429-6cb9-48b4-95f8-b806435cf56c)

### Usuwanie Wydarzenia
![image](https://github.com/user-attachments/assets/a456ffac-7956-4b03-8753-6ab8a77732da)
![image](https://github.com/user-attachments/assets/8e4790e4-a747-42f9-ac28-98ee49f4844f)
![image](https://github.com/user-attachments/assets/eb2a9a81-aaa1-446b-b3a2-fef1600a9d05)

## Kategorie

---

### Lista Kategorii
![image](https://github.com/user-attachments/assets/6ec76f4c-5858-431c-9fa3-b1b6d1777229)
![image](https://github.com/user-attachments/assets/ff7ee95c-4e11-471d-be6c-70e3775c36e6)

### Dodawanie Kategorii
![image](https://github.com/user-attachments/assets/c629701e-d15f-4efa-8c25-0ef2a08f693d)
![image](https://github.com/user-attachments/assets/f6056c9b-5bac-4d5f-adc3-ee2e877d30f3)
![image](https://github.com/user-attachments/assets/1b5a872d-6a7e-411e-9cce-def98606659a)

### Edycja Kategorii
![image](https://github.com/user-attachments/assets/2d431b64-eeed-4a52-ab8e-a065cbe5e280)
![image](https://github.com/user-attachments/assets/329ff1d7-8a98-4712-89a1-56ddcb2d84d5)

### Usuwanie Kategorii
![image](https://github.com/user-attachments/assets/4c1cd78f-fa58-4b1f-8af1-1af5c8e0c8ce)

### Filtrowanie wydarzeń po danej kategorii
![image](https://github.com/user-attachments/assets/0d254a5b-e773-4eda-b11f-754a3039e60a)
![image](https://github.com/user-attachments/assets/24ea2898-592f-4568-9ecb-58ce85b57e3f)
![image](https://github.com/user-attachments/assets/84c3987a-c337-4457-a431-7cada14c7602)
![image](https://github.com/user-attachments/assets/d463cd40-0595-4b7c-b643-dc888ebdb3d2)

## Walidacje w aplikacji

---

![image](https://github.com/user-attachments/assets/3194ce67-7191-4343-ad39-68b23640c2d6)
![image](https://github.com/user-attachments/assets/3afdc757-9807-4b77-be62-dbd0bdc433fd)
![image](https://github.com/user-attachments/assets/7ac3dc38-3ca4-4506-9e22-34f43c511107)
![image](https://github.com/user-attachments/assets/b99a49ef-a512-4b25-a5cb-9e863d39ce92)
![image](https://github.com/user-attachments/assets/0a03ab9a-7f0a-4635-bebb-acb0385da52c)
![image](https://github.com/user-attachments/assets/3d7179c7-e594-4277-bdc9-239dcd5530e8)
![image](https://github.com/user-attachments/assets/b12d29f1-fea1-4874-ac80-e82f6d188931)

# Drukowanie zawartości pamiętnika

### Plik .pdf wydruku zawartości pamiętnika
![image](https://github.com/user-attachments/assets/39bb8f8c-0890-459a-9dce-4f0abdd09d46)

Wydruk pozbawiony kontrolek sterujących aplikacji (nagłówek, nawigacja, filtrowanie itp.) udało się uzyskać poprzez dodanie do elementów html odpowiedniej klasy css w Bootstrap `d-print-none`

![image](https://github.com/user-attachments/assets/af9c5e34-c8fc-41a2-a476-20046864c80d)

