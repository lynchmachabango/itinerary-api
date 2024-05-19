<?php
class Ticket {
    public $type;
    public $departure;
    public $arrival;
    public $details;

    public function __construct($type, $departure, $arrival, $details) {
        $this->type = $type;
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->details = $details;
    }

    public function __toString() {
        return "{$this->type} from {$this->departure} to {$this->arrival}. {$this->details}";
    }
}