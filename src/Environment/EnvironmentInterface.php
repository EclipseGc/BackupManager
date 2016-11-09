<?php

/**
 * @file
 * Contains \Worx\BackupManager\Environment\EnvironmentInterface.
 */

namespace Worx\BackupManager\Environment;

interface EnvironmentInterface {

  public function exclude();

  public function include();

  public function getServer();

  public function getPlatform();

}