--TEST--
config-get command
--SKIPIF--
<?php
if (!getenv('PHP_PEAR_RUNTESTS')) {
    echo 'skip';
}
?>
--FILE--
<?php
error_reporting(1803);
require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'setup.php.inc';

$config->set('verbose', 34, 'user');
$config->set('verbose', 45, 'system');
$config->set('verbose', 56, 'user', '__uri');
$config->set('verbose', 67, 'system', '__uri');

$e = $command->run('config-get', array(), array('verbose'));
$phpunit->assertEquals(array (
  0 =>
  array (
    'info' => 34,
    'cmd' => 'config-get',
  ),
), $fakelog->getLog(), 'verbose');

$e = $command->run('config-get', array(), array('verbose', 'user'));
$phpunit->assertEquals(array (
  0 =>
  array (
    'info' => 34,
    'cmd' => 'config-get',
  ),
), $fakelog->getLog(), 'verbose user');

$e = $command->run('config-get', array(), array('verbose', 'system'));
$phpunit->assertEquals(array (
  0 =>
  array (
    'info' => 45,
    'cmd' => 'config-get',
  ),
), $fakelog->getLog(), 'verbose system');

echo 'tests done';
?>
--CLEAN--
<?php
require_once dirname(dirname(__FILE__)) . '/teardown.php.inc';
?>
--EXPECT--
tests done
