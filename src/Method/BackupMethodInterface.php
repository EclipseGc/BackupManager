<?php

/**
 * @file
 * Contains \Worx\BackupManager\Method\BackupMethodInterface.
 */

namespace Worx\BackupManager\Method;

use Worx\BackupManager\Environment\EnvironmentInterface;

interface BackupMethodInterface {

  /**
   * Initializes the backup environment.
   *
   * @param \Worx\BackupManager\Environment\EnvironmentInterface $environment
   *   The environment to initialize against.
   *
   * @return \Worx\BackupManager\Exception\BackupMethodInitializeException
   *   If initialization were to fail, this exception would be thrown.
   */
  public function initialize(EnvironmentInterface $environment);

  /**
   * Determines if any backup is necessary and performs the backup.
   *
   * return bool
   *   True if backup was performed, false if it was not.
   *
   * @throws \Worx\BackupManager\Exception\BackupMethodProcessException
   *   If the process were to fail, this exception would be thrown.
   */
  public function process();

}
