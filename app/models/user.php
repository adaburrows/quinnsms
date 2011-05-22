<?php
class user extends db {

  public function __construct() {
    parent::__construct();
    $this->aspects = array(
      'users' => array(
        'sms_number'
      )
    );
  }

  public function get_by_id($id) {
    $select = $this->build_select('users');
    return db::query_item("$select WHERE `id` = $id;");
  }

  public function get_by_phone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    $select = $this->build_select('users');
    return db::query_item("$select WHERE `sms_number` = '$phone';");
  }

  public function get_all() {
    $select = $this->build_select().';';
    return db::query_array($select);
  }

  public function set($data) {
    if (isset($data['id']) && $this->get_by_id($data['id'])) {
      $query = $this->build_update($data, 'users');
    } else {
      $query = $this->build_insert($data, 'users');
    }
    $result = db::query_ins($query);
    return $result;
  }

  function delete($id) {
    return db::query_ins("DELETE FROM `users` WHERE `id` = $id;");
  }

}