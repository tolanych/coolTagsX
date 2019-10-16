<?php
$xpdo_meta_map['coolTagsXTag']= array (
  'package' => 'cooltagsx',
  'version' => '1.1',
  'table' => 'cooltagsx_tag',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'class_key' => '',
    'text' => '',
    'internalKey' => 0,
    'pub_date' => 0,
  ),
  'fieldMeta' => 
  array (
    'class_key' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '64',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
      'index' => 'index',
    ),
    'text' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '64',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'internalKey' => 
    array (
      'dbtype' => 'int',
      'precision' => '9',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'index',
    ),
    'pub_date' => 
    array (
      'dbtype' => 'int',
      'precision' => '20',
      'phptype' => 'timestamp',
      'null' => false,
      'default' => 0,
    ),
  ),
  'indexes' => 
  array (
    'class_key' => 
    array (
      'alias' => 'class_key',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'class_key' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'text' => 
    array (
      'alias' => 'text',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'text' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
