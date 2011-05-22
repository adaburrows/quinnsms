<?php
class group extends db {

  public function __construct() {
    parent::__construct();
    $this->aspects = array(
      'users' => array(
        'id',
        'name',
        'sms_number',
        'passcode'
      )
    );
  }

  public function get_by_id($id) {
    $select = $this->build_select($this->primary_aspect);
    return db::query_item("$select WHERE `id` = $id;");
  }

  public function get_by_phone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    $select = $this->build_select($this->primary_aspect);
    return db::query_item("$select WHERE `sms_number` = '$phone';");
  }

}