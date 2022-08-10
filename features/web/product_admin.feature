Feature: Product Admin Area
  In order to mainain the products on the site
  As and admin user
  I need to be able to add/edit/delete products

  Background: 
    Given I am logged in as an admin

  Scenario: Products show author
    Given I author 5 products
    When I go to "/admin/products"
    Then I should not see "Anonymous"

  Scenario: List available products
    Given there are 5 products
    And there is 1 product
    And I am on "/admin"
    When I click "Products"
    Then I should see 6 products

  Scenario: Show publish/unpublished
    Given the following products exist:
      | name | is published |
      | Test0  | yes |
      | Test1  | yes |
      | Test10 | no  |
      | Test11 | no  |
    When I go to "/admin/products"
    Then the "Test0" row should have a check mark

  @javascript
  Scenario: Add a new product
    Given I am on "/admin/products"
    When I click "New Product"
    # And I break
    # And I save a screenshot to 'test.png'
    And I wait for the modal to load
    And I fill in "Name" with "Veloci-chew toy"
    And I fill in "Price" with "20"
    And I fill in "Description" with "Have your velociraptor chew on this instead!"
    And I press "Save"
    Then I should see "Product created FTW!"
    And I should see "Veloci-chew toy"
    And I should not see "Anonymous"

  Scenario: Deleting a product
    Given the following products exist:
      | name |
      | Bar  |
      | Foo1 |
    When I go to "/admin/products"
    And I press "Delete" in the "Foo1" row
    Then I should see "The product was deleted"
    And I should not see "Foo1"
    But I should see "Bar"