<?php

use Behat\Behat\Context\BehatContext;
use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Session;

class PasswordGeneratorContext extends BehatContext
{
    /**
     * @When /^the user go\'s to the home page the "([^"]*)" on the page should be "([^"]*)"$/
     */
    public function theUserGoSToTheHomePageTheTitleOnThePageShouldBe($asset, $text)
    {
        if ($asset === 'author') {
            $driver = new GoutteDriver();
            $session = new Session($driver);
            $session->start();
            $session->visit('http://127.0.0.1:8000');
            $page = $session->getPage();
            $pageAuthor = $page->find('css', 'h4');
            $trimmedAuthor = str_replace('Created by ', "", $pageAuthor->getText());
            PHPUnit_Framework_Assert::assertEquals($text, $trimmedAuthor);
        }elseif ($asset === 'title') {
            $driver = new GoutteDriver();
            $session = new Session($driver);
            $session->start();
            $session->visit('http://127.0.0.1:8000');
            $page = $session->getPage();
            $pageTitle = $page->find('css', 'h1');
            PHPUnit_Framework_Assert::assertEquals($text, $pageTitle->getText());
        } else {
            PHPUnit_Framework_Assert::assertNotNull(null, "That element does not exist");
        }
    }
}