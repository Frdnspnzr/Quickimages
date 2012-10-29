<?php

	Class Config {

		private static $instance;

		public static function get() {
			if (is_null(self::$instance))
				self::$instance = new Config();
			return self::$instance;
		}

		private $config = array();

		function __construct() {
			$this->loadConfig();
		}

		private function loadConfig() {
			require_once('./config.php');
			$this->config = $config;
		}

		public function read($name) {
			return $this->config[$name];
		}

	}