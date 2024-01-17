Location Calculator
===================

[![Latest Stable Version](http://poser.pugx.org/roslov/location/v)](https://packagist.org/packages/roslov/location)
[![Total Downloads](http://poser.pugx.org/roslov/location/downloads)](https://packagist.org/packages/roslov/location)
[![Latest Unstable Version](http://poser.pugx.org/roslov/location/v/unstable)](https://packagist.org/packages/roslov/location)
[![License](http://poser.pugx.org/roslov/location/license)](https://packagist.org/packages/roslov/location)
[![PHP Version Require](http://poser.pugx.org/roslov/location/require/php)](https://packagist.org/packages/roslov/location)

This package provides calculations based on longitude and latitude.


## Features

It calculates distance between two locations.

It uses the “haversine” formula to calculate the great-circle distance between two points — that is, the shortest
distance over the earth’s surface — giving an “as-the-crow-flies” distance between the points.

Formula:
```
a = sin²( Δφ / 2 ) + cos φ1 × cos φ2 × sin²( Δλ / 2 )
c = 2 × atan2( √a, √( 1 − a ) )
d = R × c
```
where
`φ` is latitude,
`λ` is longitude,
`R` is the earth’s radius (mean radius = 6371 km).

## Requirements

- PHP 7.2 or higher.

## Installation

The package could be installed with composer:

```shell
composer require roslov/location
```

## General usage

Validator allows to check data in any format. For example, when data is an object:

```php
use Roslov\Location\LocationCalculator;

$locationCalculator = new LocationCalculator();
$distance = $locationCalculator->getDistance(49.841905, 24.031511, 50.450885, 30.522798);
echo $distance; // 467.32327173219
```
