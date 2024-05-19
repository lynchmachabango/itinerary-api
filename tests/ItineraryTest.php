<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Ticket.php';
require_once 'src/Itinerary.php';

class ItineraryTest extends TestCase {
    public function testSortTickets() {
        $tickets = [
            new Ticket("train RJX 765", "St. Anton am Arlberg Bahnhof", "Innsbruck Hbf", "Platform 3. Seat number 17C."),
            new Ticket("Tram S5", "Innsbruck Hbf", "Innsbruck Airport", ""),
            new Ticket("flight AA904", "Innsbruck Airport", "Venice Airport", "Gate 10, seat 18B. Self-check-in luggage at counter."),
            new Ticket("train ICN 35780", "Gara Venetia Santa Lucia", "Bologna San Ruffillo", "Platform 1. Seat number 13F."),
            new Ticket("airport bus", "Bologna San Ruffillo", "Bologna Guglielmo Marconi Airport", "No seat assignment."),
            new Ticket("flight AF1229", "Bologna Guglielmo Marconi Airport", "Paris CDG Airport", "Gate 22, seat 10A. Self-check-in luggage at counter."),
            new Ticket("flight AF136", "Paris CDG Airport", "Chicago O'Hare", "Gate 32, seat 10A. Luggage will transfer automatically from the last flight.")
        ];

        $itinerary = new Itinerary($tickets);
        $sortedTickets = $itinerary->sortTickets();

        $this->assertEquals("St. Anton am Arlberg Bahnhof", $sortedTickets[0]->departure);
        $this->assertEquals("Innsbruck Hbf", $sortedTickets[0]->arrival);
        $this->assertEquals("Venice Airport", end($sortedTickets)->arrival);
        
    }

    public function testGetItinerary() {
        $tickets = [
            new Ticket("train RJX 765", "St. Anton am Arlberg Bahnhof", "Innsbruck Hbf", "Platform 3. Seat number 17C."),
            new Ticket("Tram S5", "Innsbruck Hbf", "Innsbruck Airport", ""),
            new Ticket("flight AA904", "Innsbruck Airport", "Venice Airport", "Gate 10, seat 18B. Self-check-in luggage at counter."),
            new Ticket("train ICN 35780", "Gara Venetia Santa Lucia", "Bologna San Ruffillo", "Platform 1. Seat number 13F."),
            new Ticket("airport bus", "Bologna San Ruffillo", "Bologna Guglielmo Marconi Airport", "No seat assignment."),
            new Ticket("flight AF1229", "Bologna Guglielmo Marconi Airport", "Paris CDG Airport", "Gate 22, seat 10A. Self-check-in luggage at counter."),
            new Ticket("flight AF136", "Paris CDG Airport", "Chicago O'Hare", "Gate 32, seat 10A. Luggage will transfer automatically from the last flight.")
        ];

        $itinerary = new Itinerary($tickets);
        $sortedItinerary = $itinerary->getItinerary();

        $expectedItinerary = [
            "0. Start.",
            "1. Board train RJX 765 from St. Anton am Arlberg Bahnhof to Innsbruck Hbf. Platform 3. Seat number 17C.",
            "2. Board Tram S5 from Innsbruck Hbf to Innsbruck Airport. ",
            "3. Board flight AA904 from Innsbruck Airport to Venice Airport. Gate 10, seat 18B. Self-check-in luggage at counter.",
            "4. Last destination reached."
        ];

        $this->assertEquals($expectedItinerary, $sortedItinerary);
    }
}
