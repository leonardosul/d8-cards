<?php

namespace Drupal\day07\User;

use \Drupal\Core\Session\AccountInterface;

/**
 * Class UserInsert.
 *
 * @package Drupal\day07\User
 */
class UserInsert implements UserInsertInterface {

  /**
   * {@inheritdoc}
   */
  public function userCreate(AccountInterface $user) {

    $stuff = $user;

  }

}
