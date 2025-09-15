# Quiz-Update

## Inhoud
* Installatie


## Installatie
### Vereisten:
*Hier staan de vereisten die je nodig hebt voor het installeren van onze webapplicatie.* 
* Zorg er voor dat je versie 8.4 of hoger van [PHP](https://www.php.net/downloads.php) geïnstalleerd hebt.
* Zorg er voor dat je de laatste versie van [Laravel](https://laravel.com/docs/12.x/installation) geïnstalleerd hebt.
* Zorg er voor dat je de laatste versie van [Herd](https://herd.laravel.com/windows) geïnstalleerd hebt.

Als je deze vereisten hebt voltooid kun je doorgaan met de volgende stappen:
1. Clone de github repository op een zelf bepaalde locatie op je pc (bijvoorbeeld C:\Development) en voer het volgende command uit in je cmd:
```
git clone https://github.com/TVW23/Quiz-update/
```
2. Ga in Laravel Herd naar Sites -> Add site -> Link existing project -> Selecteer het project en zorg dat je https aan hebt staan.
3. Als Herd klaar is kan je als het goed is de webapplicatie openen in je browser door op URL te klikken, maar er zitten errors
4. Zorg er voor dat je het .env bestand in je project stopt (het .env bestand kan je krijgen door dit op te vragen bij een van de beheerders)
5. Als je al deze stappen hebt gedaan kan je de volgende commands runnen in je cmd:
```
npm install
npm fund
php artisan migrate
npm run build
```
Als al deze stappen correct zijn gevolgd, zou de webapplicatie volledig moeten werken.
