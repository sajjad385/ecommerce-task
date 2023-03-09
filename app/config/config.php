<?php
namespace Sajjad\Ecommerce\Config;

class Config {
    private $dbHost = 'localhost';
    private $dbUser = 'root';
    private $dbPass = '';
    private $dbName = 'ecommerce-task';
    private $appRoot;
    private $urlRoot = 'http://localhost:8000/ecommerce-task';
    private $siteName = 'PHP Task-BS23';
    private $appVersion = '1.0.0';

    public function __construct() {
        $this->appRoot = dirname(dirname(__FILE__));
    }

    public function getDbHost() {
        return $this->dbHost;
    }

    public function getDbUser() {
        return $this->dbUser;
    }

    public function getDbPass() {
        return $this->dbPass;
    }

    public function getDbName() {
        return $this->dbName;
    }

    public function getAppRoot() {
        return $this->appRoot;
    }

    public function getUrlRoot() {
        return $this->urlRoot;
    }

    public function getSiteName() {
        return $this->siteName;
    }

    public function getAppVersion() {
        return $this->appVersion;
    }
}

