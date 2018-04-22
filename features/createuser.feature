Feature: Create a new user
  In order to create a new user
  As admin
  I need to provide valid email and a valid password

Scenario: Create a new valid user
  Given I have a valid email and a valid password
  Then I should get a new user