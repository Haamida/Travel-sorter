<?php declare(strict_types=1);
namespace TravelSorter\BoardingPasses;

require_once __DIR__."/../Base/BoardingPassAbstract.php";
use TravelSorter\Base\BoardingPassAbstract;
/**
 * Class AirplaneBoardingPass
 * @package travelSorter
 * Utility: Base class for Airplane Boarding passes
 * Developer(s): Hamida MEKNESSI
 */
class AirplaneBoardingPass extends BoardingPassAbstract
{
    /**
     * @var bool
     */
    private $haveBaggage;
    /**
     * @var string
     */
    private $gate;
    /**
     * @var int
     */
    private $baggagecounter;
    /**
     * @var string
     */
    private $seating;


    /**
     * AirplaneBoardingPass constructor.
     * @param string $departure
     * @param string $arrival
     * @param string $designation
     * @param bool $haveBaggage
     * @param string $gate
     * @param int $baggagecounter
     * @param string $seating
     */
    public function __construct(string $departure, string $arrival, string $designation, bool $haveBaggage, string $gate, string $seating,int $baggagecounter=null)
    {
        parent::__construct($departure,$arrival,$designation);
        $this->haveBaggage = $haveBaggage;
        $this->gate = $gate;
        $this->baggagecounter = $baggagecounter;
        $this->seating = $seating;
    }

    /*
     * Display the common airplane Boarding Pass Information
     */
    public function display():void
    {
        echo "From " . ucfirst($this->getDeparture()) . ", take flight " . $this->getDesignation() . " to ".ucfirst($this->getArrival()) . ". Gate " . $this->gate . ", seat " . $this->seating."." ;
    }
    /*
     * Display the boarding pass baggage information based on the following cases:
     * 1. Flight to flight automatic transfer
     * 2. Boarding pass with the ticket counter to drop baggage information
     * 3. Absence of baggage
     * 4. Ticket Counter to drop baggage announcement at the airport
     */
    public function baggageInfoDisplay(BoardingPassAbstract $previousPass){

        if($previousPass instanceof AirplaneBoardingPass)
        {
            echo " Baggage will be automatically transferred from your last leg.";
        }
        else {
            if ($this->haveBaggage) {
                if(isset($this->baggagecounter)){

                    echo " Baggage drop at ticket counter " . $this->baggagecounter . ".";
                }
                else{
                    echo "The ticket counter for the baggage drop would be announced at the airport.";
                }
            }
            else{
                echo " No baggage.";
            }
        }
    }

    /**
     * @return bool
     */
    public function getHaveBaggage(): bool
    {
        return $this->haveBaggage;
    }


    /**
     * @param bool $haveBaggage
     * @return $this
     */
    public function setHaveBaggage(bool $haveBaggage)
    {
        $this->haveBaggage = $haveBaggage;
        return $this;
    }


    /**
     * @return string
     */
    public function getGate(): string
    {
        return $this->gate;
    }


    /**
     * @param string $gate
     * @return $this
     */
    public function setGate(string $gate)
    {
        $this->gate = $gate;
        return $this;
    }


    /**
     * @return int
     */
    public function getBaggagecounter(): int
    {
        return $this->baggagecounter;
    }


    /**
     * @param int $baggagecounter
     * @return $this
     */
    public function setBaggagecounter(int $baggagecounter)
    {
        $this->baggagecounter = $baggagecounter;
        return $this;
    }


    /**
     * @return string
     */
    public function getSeating(): string
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


    /**
     * @return string
     */
    public function getDeparture(): string
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
    public function getArrival(): string
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
    public function getDesignation(): string
    {
        return $this->designation;
    }


    /**
     * @param string $designation
     * @return $this
     */
    public function setDesignation(string $designation)
    {
        $this->designation = $designation;
        return $this;
    }

}