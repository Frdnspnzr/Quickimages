<?php

class NoObfuscation extends NameObfuscator {

	public function obfuscate($filename) {
		return $filename;
	}
	public function unobfuscate($filename) {
		return $filename;
	}

}