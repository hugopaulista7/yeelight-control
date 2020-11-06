# YEELIGHT COLOR CHANGER #


This is a simple Laravel application to change your Yeelight color by a web request.

### INSTALLATION ###

```
$ composer install
$ php artisan migrate (the database must be declared on .env file)
$ php artisan db:seed
```
#####CAUTION - You have to put your Yeelight IP and Port on .env file too

Routes:
 - GET /                               - List all colors available
 - GET /api/colors/change/{color_name} - Changes the color of the led bulb
