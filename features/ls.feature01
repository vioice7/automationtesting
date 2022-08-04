Feature: ls
  In order to see the directory structure
  As a UNIX user
  I need to be able to list the current directory's contents

  Background:
    Given I have a file named "aim"

  Scenario: List 2 files in a directory
    And I have a file named "aime"
    When I run "ls"
    Then I should see "aim" in the output
    And I should see "aime" in the output

  Scenario: List 1 file and 1 directory
    And I have a dir named "aime0"
    When I run "ls"
    Then I should see "aim" in the output
    And I should see "aime0" in the output
  