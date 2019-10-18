<?php
$xpdo_meta_map['coolTagsXRate']= array (
  'package' => 'cooltagsx',
  'version' => '1.1',
  'table' => 'cooltagsx_rate',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'text' => '',
    'rate' => 0.0,
  ),
  'fieldMeta' => 
  array (
    'text' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '64',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'rate' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '12,2',
      'phptype' => 'float',
      'null' => true,
      'default' => 0.0,
    ),
  ),
);
