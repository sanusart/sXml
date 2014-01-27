# sXml - Simplest, basic XML document creation

---

This class will assist in very basic XML document creation.

## Methods

### Constructor()
If `$safe` is set to true - values of XML nodes will be enclosed inside CDATA
```
Constructor __construct
sXml __construct ([bool $safe = false])
```

### doctype()
_access: public_

Ommiting method attributes for `$version` and/or `$encoding` will use default values.
```
void doctype ([string $version = '1.0'], [string $encoding = 'utf=8'])
string $version (optional)
string $encoding (optional)
```

### open()
_access: public_
```
void open ([string $tag], [array $attr = array()])
string $tag
array $attr (optional)
```

### close()
_access: public_
```
void close ([string $tag])
string $tag
```

### node()
_access: public_

If `$value` is set - regular node with closing tag will be created e.g. `<node></node>`. To create a self closed tag `<node />` set `$value` to `null`.
```
void node ([string $tag], [mixed $value], [array $attr = array()])
string $tag
mixed $value | null
array $attr (optional)
```

### EXAMPLE

if you have PHP > 5.4.0 and `php-cli` - you can run `php -s localhost:8080` inside *example* directory.

### Basic usage

```
<?php
include_once '../sXml.php';

$xml = new sXml(true);

$xml->doctype();
$xml->open('users', array('type' => 'meta'));

$xml->open('user');
$xml->node('name', 'Sasha');
$xml->node('last_name', 'Khamkov');
$xml->node('alias', 'sanusart');
$xml->node('twitter', '@sanusart');
$xml->node('website', 'http://www.sanusart.com');
$xml->close('user');

$xml->close('users');
```
will result in:

```
<?xml version="1.0" encoding="utf-8"?>
<users type="meta">
<user>
    <name><![CDATA[Sasha]]></name>
	<last_name><![CDATA[Khamkov]]></last_name>
	<alias><![CDATA[sanusart]]></alias>
	<twitter><![CDATA[@sanusart]]></twitter>
	<website><![CDATA[http://www.sanusart.com]]></website>
</user>
</users>
```