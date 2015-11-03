<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://localhost:8000/cdp/public/project/new");
  }

  public function testMyTestCase()
  {
    $this->open("/cdp/public/auth/login");
    $this->click("link=Register");
    $this->waitForPageToLoad("30000");
    $this->type("name=FirstName", "heyThereI'mMisterTest154674687654657564567465");
    $this->type("name=FamilyName", "dgqlsgidisqgdldflqsgfdqsfs4d3qs4dqs4dqs5d4qsd5qsd4qss");
    $this->type("name=email", "qkgsdkjgqsdkgqskdgqksdqsdqh");
    $this->type("name=password", "atchoum");
    $this->type("name=password_confirmation", "atchoum");
    $this->click("css=button.btn.btn-primary");
    $this->type("name=email", "qkgsdkjgqsdkgqskdgqksdqsdqh@dlskdsjdklsjd");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("The email must be a valid email address.", $this->getText("css=div.alert.alert-danger > ul > li"));
    $this->type("name=email", "monsieurDupont@laposte.net");
    $this->type("name=password", "prout");
    $this->type("name=password_confirmation", "prout");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("The password must be at least 6 characters.", $this->getText("css=div.alert.alert-danger"));
    $this->type("name=password", "prouty");
    $this->type("name=password_confirmation", "proutya");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("The password confirmation does not match.", $this->getText("css=div.alert.alert-danger > ul > li"));
    $this->type("name=password", "alakazam");
    $this->type("name=password_confirmation", "alakazam");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->click("link=heyThereI'mMisterTest154674687654657564567465");
    $this->click("link=Logout");
    $this->waitForPageToLoad("30000");
    $this->type("name=email", "monsieurDupont@laposte.net");
    $this->type("name=password", "alakabroumbroum");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("You are logged in!", $this->getText("css=div.panel-body"));
    $this->click("link=heyThereI'mMisterTest154674687654657564567465");
    $this->click("link=Logout");
    $this->waitForPageToLoad("30000");
    $this->type("name=email", "monsieurDupont@laposte.net");
    $this->type("name=password", "kqjsghdkjqghd");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("These credentials do not match our records.", $this->getText("css=div.alert.alert-danger > ul > li"));
    $this->type("name=password", "alakazam");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("You are logged in!", $this->getText("css=div.panel-body"));
    $this->click("link=heyThereI'mMisterTest154674687654657564567465");
    $this->click("link=Logout");
    $this->waitForPageToLoad("30000");
  }
}
?>