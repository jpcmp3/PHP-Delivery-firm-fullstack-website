<?php
function calculateDeliveryPrice($weight, $length, $width, $height)
{
    // Calculate price based on weight, dimensions, and other factors
    $basePricePerKg = 4;
    $basePricePerUnitVolume = 0.00005;
    $largePackageFee = 5;

    $weightPrice = $weight * $basePricePerKg;
    $volume = $length * $width * $height;
    $volumePrice = $volume * $basePricePerUnitVolume;

    $isLargePackage = ($length > 100 || $width > 100 || $height > 100);

    if ($isLargePackage) {
        $volumePrice += $largePackageFee;
    }

    $totalPrice = $weightPrice + $volumePrice;
    return number_format($totalPrice, 2);
}