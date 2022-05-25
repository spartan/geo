<?php

namespace Spartan\Geo;

class Geo
{
    const WORLD                = 0;
    const WORLD_DIVISION       = 1;
    const WORLD_SUBDIVISION    = 2;
    const COUNTRY              = 3;
    const COUNTRY_DIVISION     = 4;
    const COUNTRY_SUBDIVISION  = 5;
    const LOCALITY             = 6;
    const LOCALITY_DIVISION    = 7;
    const LOCALITY_SUBDIVISION = 8;
    const PLACE                = 9;

    public static function country($name): Country
    {
        return new Country($name);
    }

    public static function countryMap($key, $value, $valueFallback = null): array
    {
        $map = [];
        foreach (glob(__DIR__ . '/../data/country/*.json') as $file) {
            $datum = json_decode(file_get_contents($file), true);
            $map[$datum[$key]] = $datum[$value] ?? $datum[$valueFallback];
        }

        ksort($map);

        return $map;
    }
}
