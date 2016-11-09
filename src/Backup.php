<?php

/**
 * @file
 * Contains \Worx\BackupManager\AlterExcludeFile.
 */

namespace Worx\BackupManager;

use Worx\BackupManager\Environment\EnvironmentInterface;
use Worx\BackupManager\Method\BackupMethodInterface;

class Backup {

  /**
   * The backup methodology.
   *
   * @var \Worx\BackupManager\Method\BackupMethodInterface
   */
  protected $method;

  /**
   * The environment to backup.
   *
   * @var \Worx\BackupManager\Environment\EnvironmentInterface
   */
  protected $environment;

  /**
   * AlterExcludeFile constructor.
   *
   * @param \Worx\BackupManager\Method\BackupMethodInterface $method
   *   The backup method.
   * @param \Worx\BackupManager\Environment\EnvironmentInterface $environment
   *   The environment on which to perform a backup.
   *
   * @internal param $
   */
  public function __construct(BackupMethodInterface $method, EnvironmentInterface $environment) {
    $method->initialize($environment);
    $this->method = $method;
    $this->environment = $environment;
  }

}
