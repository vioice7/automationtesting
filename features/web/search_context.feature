Feature: Search
  In order to find products dinosaurs love
  As a website user
  I need to be able to search for products
  
  Background: 
    Given I am on "/"

  Scenario Outline: 
    When I fill in the search box with "<term>"
    And I press the search button
    Then I should see "<result>"
    Examples:
    | term    | result            |
    | Samsung | Samsung Galaxy    |
    | Galaxy  | Samsung           |
    | Xbox    | No products found |
    | Slim    | Samsung           |
    | Fat     | No products found |
    | Kindle  | HD 7              |
