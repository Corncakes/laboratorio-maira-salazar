<?php

namespace Drupal\ms_user_assign\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for MS User Assign routes.
 */
class MsUserAssignController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $config = \Drupal::config('ms_user_assign.settings');
    $value = $config->get('content_types');

    var_dump($value);

    $build['content'] = [
      '#type' => 'item',
      '#markup' => implode(', ', $value),
    ];

    return $build;
  }

}
