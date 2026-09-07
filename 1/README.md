# Wyszukiwarka PHP + MySQL

Prosta aplikacja webowa do wyszukiwania fraz w bazie danych MySQL za pomocą zapytania `LIKE`.

## Wymagania
- Serwer WWW z obsługą PHP (np. XAMPP)
- Baza danych MySQL / MariaDB

## Instrukcja uruchomienia

1. **Import bazy danych:**
   - Otwórz **phpMyAdmin** (`http://localhost/phpmyadmin`).
   - Zaimportuj plik `5b_1.sql` (baza `5b1` z tabelą `dane` i przykładowymi danymi).

2. **Połączenie z bazą:**
   - Domyślna konfiguracja w `index.php`:
     - **Host:** `localhost`
     - **Użytkownik:** `root`
     - **Hasło:** *(brak)*
     - **Baza danych:** `5b1`

3. **Uruchomienie:**
   - Umieść pliki w folderze serwera (np. `htdocs`).
   - Otwórz stronę w przeglądarce pod adresem: `http://localhost/.../index.php`.

