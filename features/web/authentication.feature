Feature: Authentication
  In order to gain access to the site management area
  As an admin
  I need to be able to login and logout

  Scenario: Logging in
    Given there is an admin user "admin1000" with password "admin1000"
    And I am on "/"
    When I follow "Login"
    And I fill in "Username" with "admin1000"
    And I fill in "Password" with "admin1000"
    And I press "Login"
    # And print last response
    Then I should see "Logout"