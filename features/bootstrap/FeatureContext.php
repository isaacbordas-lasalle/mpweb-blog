<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */

    private $user;

    public function __construct()
    {
    }

    /**
     * @Given /^I have a valid email and a valid password$/
     */
    public function iHaveTheEmailAndThePassword($email, $password) {
        $this->user = new \Blog\Domain\User($email, $password);
    }

}
