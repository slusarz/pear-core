--TEST--
shell-test command failure, rel gt
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
$reg = $config->getRegistry();
$pkg = &new PEAR_PackageFile($config);
$info = $pkg->fromPackageFile(dirname(__FILE__) . DIRECTORY_SEPARATOR .
    DIRECTORY_SEPARATOR . 'packagefiles' . DIRECTORY_SEPARATOR . 'package2.xml',
    PEAR_VALIDATE_NORMAL);
$reg->addPackage2($info);
$e = $command->run('shell-test', array(), array('PEAR', 'gt', '1.4.0a1'));
?>
--CLEAN--
<?php
require_once dirname(dirname(__FILE__)) . '/teardown.php.inc';
?>
--RETURNS--
1
--EXPECT--
