<?php

declare(strict_types=1);

namespace Roslov\Location;

/**
 * Does different calculations based on longitude and latitude.
 */
final class LocationCalculator
{
    /**
     * Earth radius in kilometers
     */
    private const EARTH_RADIUS = 6371;

    /**
     * Calculates distance between two locations.
     *
     * This method uses the “haversine” formula to calculate the great-circle distance between two points —
     * that is, the shortest distance over the earth’s surface — giving an “as-the-crow-flies” distance
     * between the points.
     *
     * Formula:
     * ```
     * a = sin²( Δφ / 2 ) + cos φ1 × cos φ2 × sin²( Δλ / 2 )
     * c = 2 × atan2( √a, √( 1 − a ) )
     * d = R × c
     * ```
     * where
     * φ is latitude,
     * λ is longitude,
     * R is the earth’s radius (mean radius = 6371 km).
     *
     * Note that angles need to be in radians to pass to trig functions!
     *
     * Source: http://www.movable-type.co.uk/scripts/latlong.html
     *
     * @param float $latitude1 Latitude 1
     * @param float $longitude1 Longitude 1
     * @param float $latitude2 Latitude 2
     * @param float $longitude2 Longitude 2
     * @return float Distance in kilometers
     */
    public function getDistance(float $latitude1, float $longitude1, float $latitude2, float $longitude2): float
    {
        $lat1 = $latitude1 * M_PI / 180;
        $lon1 = $longitude1 * M_PI / 180;
        $lat2 = $latitude2 * M_PI / 180;
        $lon2 = $longitude2 * M_PI / 180;
        $dLat = $lat2 - $lat1;
        $dLon = $lon2 - $lon1;

        $a = sin($dLat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dLon / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return self::EARTH_RADIUS * $c;
    }
}
