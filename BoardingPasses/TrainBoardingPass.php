<?php declare(strict_types=1);

namespace TravelSorter\BoardingPasses;



require_once __DIR__."/../Base/BoardingPassAbstract.php";
use TravelSorter\Base\BoardingPassAbstract;
/**
 * Class TrainBoardingPass
 * @package travelSorter
 * Utility: Base class for Train Boarding passes
 * Developer(s): Hamida MEKNESSI
 */
class TrainBoardingPass extends BoardingPassAbstract
{
    /**
     * @var string
     */
    private $seating;

    /**
     * TrainBoardingPass constructor.
     * @param string $seating
     */
    public function __construct(string $departure,string $arrival,string $designation,string $seating)
    {
        parent::__construct($departure,$arrival,$designation);
        $this->seating = $seating;
    }

    /*
     * Display the train borading pass information
     */
    public function display():void
    {
        echo "Take train ".$this->getDesignation()." from ".ucfirst($this->getDeparture())." to ".ucfirst($this->getArrival())
        .". Sit in seat".$this->seating.".";
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
     * @return $this
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
     * @return $this
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
     * @return $this
     */
    public function setDesignation(string $designation)
    {
        $this->designation = $designation;
        return $this;
    }


    /**
     * @return string
     */
    public function getSeating():string
    {
        return $this->seating;
    }


    /**
     * @param string $seating
     * @return $this
     */
    public function setSeating(string $seating)
    {
        $this->seating = $seating;
        return $this;
    }

}