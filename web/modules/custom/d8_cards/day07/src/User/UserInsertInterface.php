<?php

namespace Drupal\d8_cards\day07\User;

use Drupal\Core\Session\AccountProxy;

/**
 * Interface UserInsertInterface.
 *
 * @package Drupal\d8_cards\day07\User
 */
interface UserInsertInterface {

  /**
   * Hook hook_ENTITY_TYPE_insert as a service.
   *
   * @param AccountProxy $user
   *   The user account being created.
   *
   * @see hook_ENTITY_TYPE_insert()
   */
  public function userInsert(AccountProxy $user);

}
