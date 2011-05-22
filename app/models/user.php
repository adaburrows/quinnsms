<?php
class user extends db {

  public function __construct() {
    parent::__construct();
    $this->aspects = array(
      'users' => array(
        'id',
        'name',
        'sms_number'
      )
    );
  }

  public function get_by_id($id) {
    $select = $this->build_select($this->primary_aspect);
    return self::query_item("$select WHERE `id` = $id;");
  }

  public function get_by_phone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    $select = $this->build_select('users');
    return db::query_item("$select WHERE `sms_number` = '$phone';");
  }

  public function get_or_create($num) {
    $data = $this->get_by_phone($phone);
    if($data) {
      // yay it worked!
    } else {
      // create a use by number
      $this->set(array('sms_number' => $num));
    }
  }

}