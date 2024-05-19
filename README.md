# ElecticaItinerary

## Description
This API sorts travel tickets to reconstruct the complete itinerary for a journey.

### Running the Project

1. **Install PHP**: Make sure you have PHP installed on your machine. - PHP 7.4 or higher

2. **Install Composer**: Download and install Composer from [here](https://getcomposer.org/). - Composer for dependency management

3. **Install Dependencies**:
   ```bash
   composer install

4. php -S localhost:8000 -t src

### Tests
- To run tests run the following command in the root project directory 
  ```bash
  ./vendor/bin/phpunit tests

# Assumptions

- Each ticket has a unique departure and arrival combination.
- There are no circular routes in the provided tickets.
- The tickets provided will form a continuous journey from a start point to an endpoint.
- The JSON input format for tickets is fixed and should include `type`, `departure`, `arrival`, and `details` fields.

# Adding New Types of Transit

To add new types of transit, you simply need to create new instances of the `Ticket` class with the appropriate details. The `Ticket` class is flexible enough to handle different types of transit as long as the `type`, `departure`, `arrival`, and `details` fields are provided.

### Example

To add a new transit type like a "ferry", you would create a `Ticket` instance as follows:

```php
$newTicket = new Ticket("ferry", "Departure Location", "Arrival Location", "Additional details here.");


### Add new types of transit with different characteristics

Factory Method Pattern: Utilize the factory method pattern to create instances of transit types based on input parameters or configuration. This abstracts the instantiation process and facilitates the addition of new transit types.






