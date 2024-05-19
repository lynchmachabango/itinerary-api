<?php
require 'Ticket.php';
require 'Itinerary.php';

header('Content-Type: application/json');

try {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['tickets']) || !is_array($input['tickets'])) {
        throw new InvalidArgumentException('Invalid input. Please provide a list of tickets.');
    }

    $tickets = [];
    foreach ($input['tickets'] as $ticketData) {
        if (!isset($ticketData['type'], $ticketData['departure'], $ticketData['arrival'], $ticketData['details'])) {
            throw new InvalidArgumentException('Each ticket must have a type, departure, arrival, and details.');
        }

        $tickets[] = new Ticket($ticketData['type'], $ticketData['departure'], $ticketData['arrival'], $ticketData['details']);
    }

    $itinerary = new Itinerary($tickets);
    $sortedItinerary = $itinerary->getItinerary();

    echo json_encode(['itinerary' => $sortedItinerary]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
