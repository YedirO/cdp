<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://localhost:8000/cdp/public/backlog");
  }

  public function testMyTestCase()
  {
    $this->open("/cdp/public/backlog/userstory/create");
    $this->type("id=priority", "1");
    $this->type("id=priority", "2");
    $this->type("id=priority", "3");
    $this->type("id=priority", "4");
    $this->type("id=priority", "5");
    $this->type("id=priority", "4");
    $this->type("id=priority", "3");
    $this->type("id=priority", "4");
    $this->type("id=priority", "5");
    $this->type("id=priority", "6");
    $this->type("id=priority", "7");
    $this->type("id=priority", "8");
    $this->type("id=difficulty", "1");
    $this->type("id=difficulty", "2");
    $this->type("id=difficulty", "3");
    $this->type("id=difficulty", "4");
    $this->type("id=difficulty", "5");
    $this->type("id=difficulty", "4");
    $this->type("id=difficulty", "3");
    $this->type("id=difficulty", "2");
    $this->type("id=difficulty", "3");
    $this->type("id=difficulty", "4");
    $this->type("id=description", "Voici une userStory de test");
    $this->click("css=button.btn");
    $this->assertEquals("Voici une userStory de test", $this->getText("//tr[3]/td"));
    $this->open("/cdp/public/backlog/userstory/create");
    $this->type("id=priority", "1");
    $this->type("id=priority", "2");
    $this->type("id=priority", "3");
    $this->type("id=priority", "4");
    $this->type("id=priority", "5");
    $this->type("id=priority", "6");
    $this->type("id=priority", "7");
    $this->type("id=priority", "6");
    $this->type("id=priority", "5");
    $this->type("id=priority", "4");
    $this->type("id=priority", "3");
    $this->type("id=priority", "4");
    $this->type("id=priority", "5");
    $this->type("id=priority", "6");
    $this->type("id=priority", "7");
    $this->type("id=priority", "8");
    $this->type("id=difficulty", "0");
    $this->type("id=difficulty", "1");
    $this->type("id=difficulty", "2");
    $this->type("id=difficulty", "3");
    $this->type("id=difficulty", "4");
    $this->type("id=difficulty", "5");
    $this->type("id=description", "Et encore une autre");
    $this->click("css=button.btn");
    $this->assertEquals("Et encore une autre", $this->getText("//tr[4]/td"));
  }
}
?>