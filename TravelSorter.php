<?php declare(strict_types=1);
namespace TravelSorter;



require_once "Base/BoardingPassAbstract.php";
require_once "Base/TravelSorterInterface.php";

use TravelSorter\Base\BoardingPassAbstract;
use TravelSorter\Base\TravelSorterInterface;
/**
 * Class TravelSorter
 * @package travelSorter
 * Utility: Display a traveler's trip based on a list of random boarding passes
 */
class TravelSorter implements TravelSorterInterface
{
    //End of trip message
    private const ARRIVAL_MSG="You have arrived at your final destination.";

    /**
     * @param array $boardingPasses
     * @return array
     * Utility: Sort a random collection of boarding Passes
     */
    public static function sortPassesTrajectory(array $boardingPasses): array
    {
        //No need to sort if there's just one boarding pass
        if (count($boardingPasses) == 1)
            return $boardingPasses;

        $sortedArray = [];

        //Create two arrays indexed on Arrivals and Departures
        $departures = self::getDeparturesList($boardingPasses);
        $arrivals = self::getArrivalsList($boardingPasses);

        $startingLocation = self::findStartingLocation($boardingPasses, $arrivals);

        //Put the first element in the sortedArray
        array_push($sortedArray, $startingLocation);

        //Use the current Location arrival to locate the next location
        $currentLocationArrival = $startingLocation->getArrival();

        //Loop through the passes until we reach the destination
        while (isset($departures[$currentLocationArrival])) {

            if (array_key_exists($currentLocationArrival, $departures))
                array_push($sortedArray, $departures[$currentLocationArrival]);

            //If there is no departure for the current location, there will be no index
            $currentLocationArrival = isset($departures[$currentLocationArrival]) ? $departures[$currentLocationArrival]->getArrival() : null;
        }

        return $sortedArray;
    }

    /**
     * @param array $boardingPasses
     * @return array
     * Utility: Create an array indexed by formatted (lowercased) departures
     */
    public static function getDeparturesList(array $boardingPasses): array
    {

        $departuresArray = array();

        foreach ($boardingPasses as $boardingPass) {

            $boardingPass->setDeparture(strtolower($boardingPass->getDeparture()));
            $departuresArray[$boardingPass->getDeparture()] = $boardingPass;

        }

        return $departuresArray;
    }

    /**
     * @param array $boardingPasses
     * @return array
     * Utility: Create an array indexed by formatted (lowercased) Arrivals
     */
    public static function getArrivalsList(array $boardingPasses): array
    {

        $arrivalsList = array();

        foreach ($boardingPasses as $boardingPass) {

            $boardingPass->setArrival(strtolower($boardingPass->getArrival()));
            $arrivalsList[$boardingPass->getArrival()] = $boardingPass;
        }

        return $arrivalsList;
    }

    /**
     * @param array $boradingPasses
     * @param array $arrivals
     * @return BoardingPassAbstract
     * Utility: Find the starting Location from a random collection of Boarding Passes
     */
    public static function findStartingLocation(array $boradingPasses, array $arrivals): BoardingPassAbstract
    {
        foreach ($boradingPasses as $boradingPass) {
            //The starting location departure is not an arrival location
            if (!array_key_exists(strtolower($boradingPass->getDeparture()), $arrivals)) {

                return $boradingPass;
            }
        }

        return null;
    }

    /**
     * @param array $boardingPasses
     * Utility: Display a traveler's sorted journey based on the given Borading Passes
     */
    public static function displayTrip(array $boardingPasses) :void
    {
        // An empty collection of Boarding passes is given
        if (count($boardingPasses) == 0) {

            echo "No Boarding Passes given.";
            return;
        }

        $sorted = self::sortPassesTrajectory($boardingPasses);

        // non continuous trip : missing trip legs
        if (count($sorted) != count($boardingPasses)) {

            echo "The boarding passes dosen't form a continous trip.";
            return;
        }

        foreach ($sorted as $key => $pass) {

            $sorted[$key]->display();

            //Check if its an airplane BoardingPass to
            // Display the traveler's baggage info taking in consideration the between flights baggage transfer
            if (method_exists($sorted[$key], "baggageInfoDisplay"))
                $sorted[$key]->baggageInfoDisplay($sorted[$key - 1]);

            echo "<br>";
        }
        echo self::ARRIVAL_MSG;

    }

}