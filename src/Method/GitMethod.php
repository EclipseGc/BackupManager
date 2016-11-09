<?php

/**
 * @file
 * Contains \Worx\BackupManager\Method\AmazonGitMethod.
 */

namespace Worx\BackupManager\Method;

use Worx\BackupManager\Environment\EnvironmentInterface;

class GitMethod implements BackupMethodInterface {

  /**
   * @var string
   */
  protected $workingDirectory;

  /**
   * @var string
   */
  protected $repository;

  /**
   * GitMethod constructor.
   *
   * @param string $workingDirectory
   *   The directory against which to perform a backup.
   * @param string $repository
   *   The repository to store a backup.
   *
   * @throws \Exception
   */
  public function __construct($workingDirectory, $repository) {
    if (!is_dir($workingDirectory)) {
      throw new \Exception("The specified working directory does not exist.");
    }
    if (!is_dir($this->repository)) {
      throw new \Exception("The specified repository directory does not exist.");
    }
    $this->workingDirectory = $workingDirectory;
    $this->repository = $repository;
  }

  /**
   * {@inheritdoc}
   */
  public function initialize(EnvironmentInterface $environment) {
    $exclude_file = implode(DIRECTORY_SEPARATOR , [$this->repository, 'info', 'exclude']);
    if (!file_exists($exclude_file)) {
      $commands = [];
      $commands[] = "EXPORT GIT_DIR={$this->repository}";
      $commands[] = "EXPORT GIT_WORK_TREE={$this->workingDirectory}";
      $commands[] = "git init";
      shell_exec(implode('; ', $commands));
      $contents = '';
      foreach ($environment->exclude() as $exclude) {
        $exclude = substr($exclude, 0, -1) == '*' ? $exclude . '*' : $exclude;
        $contents .= "**/$exclude\n";
      }
      foreach ($environment->include() as $include) {
        $include = substr($include, 0, -1) == '*' ? $include . '*' : $include;
        $contents .= "!$include\n";
      }
      file_put_contents($exclude_file, $contents, FILE_APPEND);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function process() {
    $date = date('D, d M Y H:i:s');
    $commands[] = "EXPORT GIT_DIR={$this->repository}";
    $commands[] = "EXPORT GIT_WORK_TREE={$this->workingDirectory}";
    $commands[] = "git add -A .";
    $commands[] = "git commit --author='Technical Support <techsupport@meridian-ds.com> -m '{$date} Backup'";
    $commands[] = "git push --all";
    shell_exec(implode('; ', $commands));
  }

}