<?php

// Set up the timezone
$timezone = $_ENV['TZ'] ?? 'Europe/Berlin';
ini_set('date.timezone', $timezone);
date_default_timezone_set($timezone);

include __DIR__ . '/vendor/autoload.php';

use SunflowerFuchs\DiscordBot\Bot;
use SunflowerFuchs\DiscordBot\TiktokPlugin\TiktokPlugin;
use SunflowerFuchs\DiscordBot\GiveawayPlugin\GiveawayPlugin;

$bot = new Bot([
    'token' => $_ENV['TOKEN'],
    'loglevel' => 'info',
    'prefix' => '!fuchs ',
    'dataDir' => '/data'
]);
$bot->registerPlugin(new TiktokPlugin());
$bot->registerPlugin(new GiveawayPlugin());
$bot->run();