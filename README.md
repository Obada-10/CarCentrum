## Installatie-instructies

Volg deze stappen om het project te klonen en lokaal op te zetten:

1. **Kloon het project vanaf GitHub:**
   ```
   git clone <repository-url>
   cd <repository-name>
   ```

3. **Installeer vereiste pakketten met Composer:**
   ```
   composer install
   ```

4. **Maak een `.env` bestand:**
   - Dupliceer het `.env.example` bestand naar `.env`:
     copy .env.example .env
   - Pas de `.env` instellingen aan, zoals databaseconfiguratie, en vul een `APP_KEY` in.

5. **Genereer een app-sleutel:**
   ```
   php artisan key:generate
   ```

6. **Voer de migraties en seeder uit:**
   ```
     php artisan migrate
     php artisan db:seed
   ```

7. **Start de Laravel server:**
   ```
   php artisan serve
   ```
   
8. **Open het project in je browser:**
   - Ga naar `http://localhost:8000` om de applicatie te bekijken.

Nu ben je klaar om te beginnen met het gebruik van de applicatie en het implementeren van de vereiste functionaliteiten.

## Breeze Installatie-instructies

   ```
    composer require laravel/breeze --dev
   ```
   ```
    php artisan breeze:install
   ```

## Handig codes

laravel new project naam

php artisan serve

php artisan make:controller pagesController

php artisan make:migration createCoursesTable

php artisan make:seeder EventsTableSeeder

php artisan migrate

php artisan migrate --seed

php artisan migrate:fresh

php artisan migrate:fresh --seed

composer require livewire/livewire
php artisan make:livewire TestComponent

php artisan tinker

git status

git add .

git commit -m “”

git push 

git pull

git checkout . 



## User Story voorbeeld

User Story 1: Moderatorpaneel

Als een moderator wil ik producten en gebruikers kunnen controleren, zodat de kwaliteit en veiligheid van het platform gewaarborgd blijft.


Deel Taken:


•Moderators kunnen producten goedkeuren of verwijderen.

•Moderators kunnen accounts van gebruikers bekijken en eventueel blokkeren.

•Moderators kunnen automatisch gemarkeerde berichten controleren op ongepaste inhoud.


Acceptatiecriteria:


•Moderators kunnen zoeken naar producten met ongepaste inhoud.

•Producten met externe links worden automatisch gemarkeerd.

•Moderators kunnen statistieken inzien zoals gemiddelde waardering per maker.


Definition of Done (DOD)


-Code is geschreven en gedocumenteerd volgens best practices.

-De functionaliteit werkt zoals beschreven in de user story.

-Alle acceptatiecriteria uit de user story zijn volledig vervuld.

-Code is getest op fouten en edge cases.

-Performance is geoptimaliseerd (bijv. laadtijden, database queries).
