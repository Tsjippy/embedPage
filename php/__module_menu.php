<?php
namespace SIM\EMBEDPAGE;
use SIM;

const MODULE_VERSION		= '8.0.6';

DEFINE(__NAMESPACE__.'\MODULE_PATH', plugin_dir_path(__DIR__));

//module slug is the same as grandparent folder name
DEFINE(__NAMESPACE__.'\MODULE_SLUG', strtolower(basename(dirname(__DIR__))));