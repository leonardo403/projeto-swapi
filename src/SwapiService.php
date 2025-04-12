<?php

namespace Leonardo\Swapi;

class SwapiService
{
    public static function fetchAllStarships()
    {
        $url = "https://swapi.dev/api/starships/";
        $starships = [];

        do {
            $json = file_get_contents($url);
            $data = json_decode($json, true);
            $starships = array_merge($starships, $data['results']);
            $url = $data['next'];
        } while ($url);

        return $starships;
    }

    public static function convertConsumablesToHours($consumables)
    {
        if ($consumables === 'unknown') {
            return 0;
        }

        $time_units = [
            'day' => 24,
            'days' => 24,
            'week' => 24 * 7,
            'weeks' => 24 * 7,
            'month' => 24 * 30,
            'months' => 24 * 30,
            'year' => 24 * 365,
            'years' => 24 * 365,
        ];

        if (preg_match('/(\d+)\s(\w+)/', strtolower($consumables), $matches)) {
            $value = (int) $matches[1];
            $unit = $matches[2];
            return $value * ($time_units[$unit] ?? 0);
        }

        return 0;
    }

    public static function calculateStops($distance, $mglt, $consumables)
    {
        if ($mglt === 'unknown' || $consumables === 'unknown') {
            return 0;
        }

        $mglt = (int) $mglt;
        $hours = self::convertConsumablesToHours($consumables);
        if ($mglt === 0 || $hours === 0) {
            return 0;
        }

        $range = $mglt * $hours;
        return (int) floor($distance / $range);
    }
}
