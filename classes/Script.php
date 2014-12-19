<?php
class Script {
	private $_db,
			$_data;

	public function __construct($id = null) {
		$this->_db = DB::getInstance();
		if ($id) {
			$this->target($id);
		}
	}

	public function target($id = null) {
		if ($id) {
			$data = $this->_db->get('scripts', array('id', '=', $id));
			if ($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}

	public function create($fields) {
		if (!$this->_db->insert('scripts', $fields)) {
			throw new Exception('There was a problem creating a post.');
		}
	}

	public function find($author = null) {
		if ($author) {
			$this->_data = $this->_db->script_get($author);
			return true;
		}
		return false;
	}

	public function find_all() {
		$this->_data = $this->_db->get_all('scripts');
		return true;
	}

	public function delete($field = null) {
		$this->_db->delete('scripts', $field);
	}

	public function data() {
		return $this->_data;
	}

	public function exists() {
		return (!empty($this->_data)) ? true: false;
	}
}