<?php

/**
 * @file
 * Contains \Worx\BackupManager\Method\AmazonCodeCommitMethod.
 */

namespace Worx\BackupManager\Method;

use Worx\BackupManager\Environment\EnvironmentInterface;

class AmazonCodeCommitMethod extends GitMethod {
  public function initialize(EnvironmentInterface $environment) {
    $exclude_file = implode(DIRECTORY_SEPARATOR , [$this->repository, 'info', 'exclude']);
    if (!file_exists($exclude_file)) {
      parent::initialize($environment);
      //$repo_name = 'wxbackup-' . $environment->getServer() . '-' . get_class($environment) .
    }
  }

}