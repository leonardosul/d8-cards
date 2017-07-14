<?php

namespace Drupal\day07\User;

use \Drupal\Core\Session\AccountInterface;
/**
 * Interface UserInsertInterface.
 *
 * @package Drupal\day07\User
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
  public function userCreate(AccountInterface $user);

}
