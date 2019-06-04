<?php declare(strict_types=1);
namespace TravelSorter\Base;
/**
 * Class BoardingPassAbstract
 * @package travelSorter
 * Utility: Prototype class of Boarding passes
 * Developer(s): Hamida MEKNESSI
 */
abstract class BoardingPassAbstract
{
    /**
     * @var string
     */
    protected $departure;
    /**
     * @var string
     */
    protected $arrival;
    /**
     * @var string
     */
    protected $designation;

    /**
     * BoardingPassAbstract constructor.
     * @param $departure
     * @param $arrival
     * @param $designation
     */
    public function __construct(string $departure, string $arrival,string $designation)
    {
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->designation = $designation;
    }


    /**
     * Display the boarding pass informations.
     */
    protected abstract function display():void;

}