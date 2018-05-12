<?php

use Behat\Behat\Context\Context;

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
    private $post;
    private $email;
    private $password;
    private $title;
    private $body;

    public function __construct($email, $password, $title, $body)
    {
        $this->email = $email;
        $this->password = $password;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * @Given /^I have a valid email and a valid password$/
     */
    public function iHaveTheEmailAndThePassword()
    {
        $this->user = new \Blog\Domain\User($this->email, $this->password);
    }

    /**
     * @Then /^I should get a new user$/
     */
    public function iShouldGetTheNewUser() {
        $user = $this->iHaveTheEmailAndThePassword();
        return $user;
    }

    /**
     * @Given /^I have a valid title a valid body and a valid user$/
     */
    public function iHaveTheTitleAndTheBody()
    {
        $this->post = new \Blog\Domain\Post($this->title, $this->body, false, new \Blog\Domain\User($this->email, $this->password));
    }

    /**
     * @Then /^I should get a new post$/
     */
    public function iShouldGetTheNewPost() {
        $post = $this->iHaveTheTitleAndTheBody();
        return $post;
    }

}
