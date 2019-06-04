<?php declare(strict_types=1);

namespace TravelSorter\Base;
/**
 * Interface TravelSorterInterface
 * @package travelSorter
 * Utility: Prototype of the Travel Sorter
 * Developer(s): Hamida MEKNESSI
 */
interface TravelSorterInterface
{
    /**
     * @param array $boardingPasses
     * @return array
     */
    public static function sortPassesTrajectory(array $boardingPasses): array;


    /**
     * @param array $boardingPasses
     */
    public static function displayTrip(array $boardingPasses):void ;
}