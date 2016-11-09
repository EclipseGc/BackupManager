<?php

/**
 * @file
 * Contains \Worx\BackupManager\Environment\Platform.
 */

namespace Worx\BackupManager\Environment;

class AegirPlatform implements EnvironmentInterface {

  /**
   * {@inheritdoc}
   */
  public function exclude() {
    return [
      'sites/*',
      'files/css',
      'files/css/*',
      'files/js',
      'files/js/*',
      'files/styles',
      'files/styles/*',
      'files/tmp',
      'files/tmp/*',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function include() {
    return [
      'sites/sites.php',
      'sites/all',
      'sites/all/*',
    ];
  }

}
