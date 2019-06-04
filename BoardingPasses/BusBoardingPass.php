<?php declare(strict_types=1);
namespace TravelSorter\BoardingPasses;



require_once __DIR__."/../Base/BoardingPassAbstract.php";
use TravelSorter\Base\BoardingPassAbstract;
/**
 * Class BusBoardingPass
 * @package travelSorter
 * Utility: Base class for Bus Boarding passes
 * Developer(s): Hamida MEKNESSI
 */
class BusBoardingPass extends BoardingPassAbstract
{

    /**
     * BusBoardingPass constructor.
     * @param string $departure
     * @param string $arrival
     * @param string $designation
     */
    public function __construct(string $departure,string $arrival,string $designation)
    {
        parent::__construct($departure,$arrival,$designation);

    }

    /**
     * Display the boarding Pass Information
     */
    public function display():void
    {
        //Check for digits in the bus designationto correctly format the bus name or number
        $busNumberMessage=preg_match('~[0-9]~', $this->designation)?"Take bus ".$this->designation:"Take the ".$this->designation;

        echo $busNumberMessage." from ".ucfirst($this->getDeparture())." to ".ucfirst($this->getArrival()).". No seat assignment.";
    }


    /**
     * @return string
     */
    public function getDeparture():string
    {
        return $this->departure;
    }


    /**
     * @param string $departure
     * @return BusBoardingPass
     */
    public function setDeparture(string $departure)
    {
        $this->departure = $departure;
        return $this;
    }


    /**
     * @return string
     */
    public function getArrival():string
    {
        return $this->arrival;
    }


    /**
     * @param string $arrival
     * @return BusBoardingPass
     */
    public function setArrival(string $arrival)
    {
        $this->arrival = $arrival;
        return $this;
    }


    /**
     * @return string
     */
    public function getDesignation():string
    {
        return $this->designation;
    }

    /**
     * @param string $number
     * @return BusBoardingPass
     */
    public function setDesignation(string $designation)
    {
        $this->designation = $designation;
        return $this;
    }

}