<?php

namespace App\Data;

class HelperData
{
    protected static $prefered_activity_enum = array(
        "any" => "Any",
        "welcoming" => "Welcoming",
        "way_directions" => "Showing the directions",
        "beaconing" => "Beaconing / Unbeaconing",
        "organisation" => "Organisation",
        "refreshment_booth" => "Refreshment booth & Food",
        "opener_closer" => "Opener / Closer",
    );

    protected static $prefered_sector_enum = array(
        "any" => "Any",
        "augirein" => "Augirein",
        "arbas" => "Arbas",
    );

    public static function getPreferedActivities()
    {
        return array_keys(self::$prefered_activity_enum);
    }

    public static function getPreferedActivity($activity)
    {
        return __(self::$prefered_activity_enum[$activity]);
    }

    public static function getPreferedSectors()
    {
        return array_keys(self::$prefered_sector_enum);
    }

    public static function getPreferedSector($sector)
    {
        return __(self::$prefered_sector_enum[$sector]);
    }
}
