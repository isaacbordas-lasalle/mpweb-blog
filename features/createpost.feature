Feature: Create a new post
  In order to create a new post
  As admin
  I need to provide valid title and a valid body

  Scenario: Create a new valid post
    Given I have a valid title a valid body and a valid user
    Then I should get a new post