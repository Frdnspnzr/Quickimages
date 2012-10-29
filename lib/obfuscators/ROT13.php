<?php

class ROT13 extends NameObfuscator {

	public function obfuscate($filename) {
		return str_rot13($filename);
	}
	public function unobfuscate($filename) {
		return str_rot13($filename);
	}

}