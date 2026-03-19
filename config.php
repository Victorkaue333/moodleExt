<?php
unset($CFG);
global $CFG;
$CFG = new stdClass();

//=========================================================================
// 1. DATABASE SETUP
//=========================================================================
$CFG->dbtype    = 'mariadb';                // XAMPP usa MariaDB
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodleext';              // Nome do banco que você criou no phpMyAdmin
$CFG->dbuser    = 'root';                   // Usuário padrão do XAMPP
$CFG->dbpass    = '';                        // Senha padrão do XAMPP (vazia)
$CFG->prefix    = 'mdl_';
$CFG->dboptions = [
    'dbpersist' => false,
    'dbsocket'  => false,
    'dbport'    => '',
    'dbcollation' => 'utf8mb4_unicode_ci',
];

//=========================================================================
// 2. WEB SITE LOCATION
//=========================================================================
$CFG->wwwroot   = 'http://localhost/moodleExt';

//=========================================================================
// 3. DATA FILES LOCATION
//=========================================================================
$CFG->dataroot  = 'C:\\moodledata';

//=========================================================================
// 4. ROUTER
//=========================================================================
$CFG->routerconfigured = false;

//=========================================================================
// 6. DATA FILES PERMISSIONS
//=========================================================================
$CFG->directorypermissions = 02777;

$CFG->admin = 'admin';

require_once(__DIR__ . '/lib/setup.php');
