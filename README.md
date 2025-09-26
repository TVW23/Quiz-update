# Quiz-Update
<img width="200" height="200" alt="image" src="https://github.com/user-attachments/assets/d25e270e-58c1-4d66-9883-2e970bcba583" />

## Inhoud
* Over dit project
* Installatie
* Credits

## Over dit project
(Moet nog ingevuld worden)
## Installatie
### Vereisten:
*Hier staan de vereisten die je nodig hebt voor het installeren van onze webapplicatie.* 
* Zorg er voor dat je versie 8.4 of hoger van [PHP](https://www.php.net/downloads.php) geïnstalleerd hebt.
* Zorg er voor dat je de laatste versie van [Laravel](https://laravel.com/docs/12.x/installation) geïnstalleerd hebt.
* Zorg er voor dat je de laatste versie van [Herd](https://herd.laravel.com/windows) geïnstalleerd hebt.
* Zorg er voor dat je de laatste versie van [Composer](https://getcomposer.org/download/) geïnstalleerd hebt.
* Zorg er voor dat je de laatste versie van [NodeJS](https://nodejs.org/en/download/) geïnstalleerd hebt.
* Zorg er voor dat je [Visual Studio Code](https://code.visualstudio.com/download) geïnstalleerd hebt.

Als je deze vereisten hebt voltooid kun je doorgaan met de volgende stappen:
1. Clone de github repository op een zelf bepaalde locatie op je pc (bijvoorbeeld C:\Development) en voer het volgende command uit in je cmd (Hier kom je door te zoeken naar 'cmd' of 'command prompt' in je windows zoekbalk:
```
git clone https://github.com/TVW23/Quiz-update/
```
2. Ga in Laravel Herd naar Sites -> Add site -> Link existing project -> Selecteer het project en zorg dat je https aan hebt staan.
3. Als Herd klaar is kan je als het goed is de webapplicatie openen in je browser door op URL te klikken, maar er zitten errors
4. Zorg er voor dat je het .env bestand in je project stopt (het .env bestand kan je krijgen door dit op te vragen bij een van de beheerders)
5. Als je al deze stappen hebt gedaan kan je de volgende commands runnen in je cmd in Visual Studio Code (open je cmd in visual studio code met ctrl + j):
```
composer install
npm install
npm fund
php artisan migrate
npm run build
```
Als al deze stappen correct zijn gevolgd, zou de webapplicatie volledig moeten werken.

## Credits
Dit project is gemaakt door: 
- Merijn
- Julian
- Thijs
- Hessel
