<?php

// Set up the timezone
$timezone = $_ENV['TZ'] ?? 'Europe/Berlin';
ini_set('date.timezone', $timezone);
date_default_timezone_set($timezone);

include __DIR__ . '/vendor/autoload.php';

use SunflowerFuchs\DiscordBot\Bot;
use SunflowerFuchs\DiscordBot\TiktokPlugin\TiktokPlugin;

$bot = new Bot([
    'token' => $_ENV['TOKEN'],
    'loglevel' => 'info',
    'defaultPlugins' => false
]);
$bot->registerPlugin(new TiktokPlugin());
$bot->run();