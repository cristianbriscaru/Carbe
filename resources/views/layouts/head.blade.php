<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('media/app/icon.png') }}" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Carbe: @yield('title')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('top-scripts')
</head>