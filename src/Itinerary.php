<?php
class Itinerary {
    private $tickets;

    public function __construct($tickets) {
        $this->tickets = $tickets;
    }

    public function sortTickets() {
        $departureMap = [];
        $arrivalMap = [];
        $start = null;

        foreach ($this->tickets as $ticket) {
            $departureMap[$ticket->departure] = $ticket;
            $arrivalMap[$ticket->arrival] = $ticket;
        }

        foreach ($departureMap as $departure => $ticket) {
            if (!isset($arrivalMap[$departure])) {
                $start = $departure;
                break;
            }
        }

        $sortedTickets = [];
        while (isset($departureMap[$start])) {
            $ticket = $departureMap[$start];
            $sortedTickets[] = $ticket;
            $start = $ticket->arrival;
        }

        return $sortedTickets;
    }

    public function getItinerary() {
        $sortedTickets = $this->sortTickets();
        $itinerary = ["0. Start."];
        $step = 1;

        foreach ($sortedTickets as $ticket) {
            $itinerary[] = "{$step}. Board " . $ticket->__toString();
            $step++;
        }

        $itinerary[] = "{$step}. Last destination reached.";
        return $itinerary;
    }
}
