<?php

namespace Leonardo\Swapi\Tests;

use PHPUnit\Framework\TestCase;
use Leonardo\Swapi\SwapiService;

class SwapiServiceTest extends TestCase
{
    public function testConvertConsumablesToHours()
    {
        $this->assertEquals(24, SwapiService::convertConsumablesToHours('1 day'));
        $this->assertEquals(168, SwapiService::convertConsumablesToHours('1 week'));
        $this->assertEquals(720, SwapiService::convertConsumablesToHours('1 month'));
        $this->assertEquals(0, SwapiService::convertConsumablesToHours('unknown'));
    }

    public function testCalculateStops()
    {
        $this->assertEquals(9, SwapiService::calculateStops(1000000, '75', '2 months'));
        $this->assertEquals(0, SwapiService::calculateStops(1000000, 'unknown', '1 week'));
        $this->assertEquals(0, SwapiService::calculateStops(1000000, '70', 'unknown'));
    }
}
