<?php
namespace Drupal\idMyGadget;

/**
 * Tests the jmws_idMyGadget_for_drupal module functionality.
 */
class IdMyGadgetTestCase extends DrupalWebTestCase {
  public static function getInfo() {
    return array(
      'name' => 'IdMyGadget functionality',
      'description' => 'Test idMyGadget settings.',
      'group' => 'IdMyGadget'
    );
  }

  function setUp() {
    parent::setUp('jmws_idMyGadget_for_drupal');
  }

  /**
   * Tests the jmws_idMyGadget_for_drupal settings page.
   */
  function testSettings() {
    $admin_user = $this->drupalCreateUser(array('administer site configuration'));
    $this->drupalLogin($admin_user);

    $edit = array();
    // Sorry, no tests yet, this is just a placeholder for now
  }
}
