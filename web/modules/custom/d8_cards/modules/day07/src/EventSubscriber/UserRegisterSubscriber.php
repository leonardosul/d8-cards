<?php

namespace Drupal\day07\EventSubscriber;

use Drupal\Core\Entity\EntityTypeEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class UserRegisterSubscriber.
 *
 * @package Drupal\day07\EventSubscriber
 */
class UserRegisterSubscriber implements EventSubscriberInterface {

  /**
   * Code that should be triggered on event specified
   *
   * @param \Symfony\Component\HttpKernel\Event\FilterResponseEvent $event
   */
  public function onRegister(FilterResponseEvent $event) {
    $stuff = $event;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[EntityTypeEvents::CREATE][] = ['onRespond'];
    return $events;
  }

}