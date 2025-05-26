@echo off
echo ----------------------------------------------------
echo Laravel Start Script
echo ----------------------------------------------------

echo Provera da li je Composer instaliran
where composer >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo Composer nije pronadjen. Instalirajte Composer i probajte ponovo.
    pause
    exit /b
)

echo Instalacija PHP zavisnosti
echo Instalacija Composer paketa...
composer install

echo Kopiranje .env fajla ako ne postoji
if not exist ".env" (
    echo Pravi se .env fajl...
    copy .env.example .env
)

echo Generisanje application key-a
echo Generisanje application key-a...
php artisan key:generate

echo Pokretanje migracija (opciono sa --seed ako ima seedera)
echo Pokretanje migracija baze...
php artisan migrate

echo Seed baze
echo echo Seed baze...
php artisan db:seed

echo Pokretanje lokalnog servera
echo Pokretanje lokalnog servera...
php artisan serve

pause
