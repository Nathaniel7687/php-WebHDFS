<?php

require_once __DIR__ . '/Curl.php';

class WebHDFS {

	public function __construct($host, $port, $user) {
		$this->host = $host;
		$this->port = $port;
		$this->user = $user;
	}

	// File and Directory Operations

	public function create($path, $filename) {
		if (!file_exists($filename)) {
			return false;
		}

		$url = $this->_buildUrl($path, array('op'=>'CREATE'));
		$redirectUrl = Curl::putLocation($url);
		return Curl::putFile($redirectUrl, $filename);
	}

	public function append($path, $string) {
		$url = $this->_buildUrl($path, array('op'=>'APPEND'));
		$redirectUrl = Curl::postLocation($url);
		return Curl::postString($redirectUrl, $string);
	}

	public function concat($path, $sources) {
		$url = $this->_buildUrl($path, array('op'=>'CONCAT', 'sources'=>$sources));
		return Curl::post($url);
	}

	public function open($path) {
		$url = $this->_buildUrl($path, array('op'=>'OPEN'));
		return Curl::getWithRedirect($url);
	}

	public function mkdirs($path) {
		$url = $this->_buildUrl($path, array('op'=>'MKDIRS'));
		return Curl::put($url);
	}

	public function createSymLink($path, $destination) {
		$url = $this->_buildUrl($destination, array('op'=>'CREATESYMLINK', 'destination'=>$path));
		return Curl::put($url);
	}

	public function rename($path, $destination) {
		$url = $this->_buildUrl($path, array('op'=>'RENAME', 'destination'=>$destination));
		return Curl::put($url);
	}

	public function delete($path) {
		$url = $this->_buildUrl($path, array('op'=>'DELETE'));
		return Curl::delete($url);
	}

	public function getFileStatus($path) {
		$url = $this->_buildUrl($path, array('op'=>'GETFILESTATUS'));
		return Curl::get($url);
	}

	public function listStatus($path) {
		$url = $this->_buildUrl($path, array('op'=>'LISTSTATUS'));
		return Curl::get($url);
	}

	// Other File System Operations

	public function getContentSummary($path) {
		$url = $this->_buildUrl($path, array('op'=>'GETCONTENTSUMMARY'));
		return Curl::get($url);
	}

	public function getFileChecksum($path) {
		$url = $this->_buildUrl($path, array('op'=>'GETFILECHECKSUM'));
		return Curl::getWithRedirect($url);
	}

	public function getHomeDirectory() {
		$url = $this->_buildUrl('', array('op'=>'GETHOMEDIRECTORY'));
		return Curl::get($url);
	}

	public function setPermission($path, $permission) {
		$url = $this->_buildUrl($path, array('op'=>'SETPERMISSION', 'permission'=>$permission));
		return Curl::put($url);
	}

	public function setOwner($path, $owner) {
		$url = $this->_buildUrl($path, array('op'=>'SETOWNER', 'owner'=>$owner));
		return Curl::put($url);
	}

	public function setTimes($path) {
		$url = $this->_buildUrl($path, array('op'=>'SETTIMES'));
		return Curl::put($url);
	}

	private function _buildUrl($path, $query_data) {
		if ($path[0] == '/') {
			$path = substr($path, 1);
		}

		$query_data['user.name'] = $this->user;
		return 'http://' . $this->host . ':' . $this->port . '/webhdfs/v1/' . $path . '?' . http_build_query($query_data);
	}

}
