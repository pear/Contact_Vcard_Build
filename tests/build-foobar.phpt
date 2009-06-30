--TEST--
Create a vcard 2.1 with ORG and different 'phones'.
--SKIPIF--
<?php
if (!class_exists('Contact_Vcard_Build')) {
    die('SKIP This test requires Contact_Vcard_Build.');
}
--FILE--
<?php
$vcard = new Contact_Vcard_Build('2.1');

$vcard = new Contact_Vcard_Build();
$vcard->setFormattedName('Bar Foo');
$vcard->setName('Bar', '', 'Foo', '', '');
$vcard->setTitle('FOOBAR');
$vcard->addOrganization('OHAI');

$vcard->addEmail('foobar@example.org');

$vcard->addTelephone('0900-foobar', $type = 'work');
$vcard->addTelephone('0900-foobar-cell', $type = 'cell');
$vcard->addTelephone('0900-foobar-fax', $type = 'fax');
var_dump($vcard->fetch());
--EXPECT--
foo