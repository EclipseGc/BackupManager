<?php

/**
 * @file
 * Contains \Worx\BackupManager\Environment\Environment.
 */

namespace Worx\BackupManager\Environment;

abstract class Environment implements EnvironmentInterface {

  /**
   * The server on which this environment resides.
   *
   * @var string
   */
  protected $server;

  /**
   * The platform on which this environment resides.
   *
   * @var string
   */
  protected $platform;

  /**
   * Environment constructor.
   */
  public function __construct($server, $platform) {
    $this->server = $server;
    $this->platform = $platform;
  }

  public function getServer() {
    return $this->server;
  }

  public function getPlatform() {
    $this->platform;
  }

}
