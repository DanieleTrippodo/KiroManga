<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel Manga Reader') }}</title>
    <!-- Includi il file CSS compilato da Vite -->
    @vite('resources/js/app.js')
  </head>
  <body>
    <!-- Root element per l'app Vue -->
    <div id="app"></div>
  </body>
</html>
