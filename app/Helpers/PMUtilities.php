<?php

namespace App\Helpers;

class PMUtilities
{
    public const DESKTOP_LAPTOP_KEYWORDS = ['laptop', 'desktop'];
    public const PRINTER_SCANNER_KEYWORDS = ['printer', 'scanner', 'printer with scanner'];

    public static function isValidToPM(string $equipment_type)
    {
        // convert equipment_type to lower case
        $equipment_type = strtolower($equipment_type);
        if (in_array($equipment_type, array_merge(self::DESKTOP_LAPTOP_KEYWORDS, self::PRINTER_SCANNER_KEYWORDS))) {
            return true;

        }
        return false;
    }

    public static function isValidDesktopLaptopPM(string $equipment_type)
    {
        // convert equipment_type to lower case
        $equipment_type = strtolower($equipment_type);
        if (in_array($equipment_type, self::DESKTOP_LAPTOP_KEYWORDS)) {
            return true;

        }
        return false;
    }
    public static function isValidPrinterScannerPM(string $equipment_type)
    {
        // convert equipment_type to lower case
        $equipment_type = strtolower($equipment_type);
        if (in_array($equipment_type, self::PRINTER_SCANNER_KEYWORDS)) {
            return true;

        }
        return false;
    }
}