<?php
class user extends db {

  public function __construct() {
    $this->aspects = array(
      'users' => array(
        'id',
        'name',
        'sms_number'
      ),
      'subscribers' => array(
        'user_id',
        'group_id'
      )
    );

    $this->join_on = array(
      'users' => array(
        'subscribers' => '`users`.`id` = `subscribers`.`user_id`'
      )
    );
    parent::__construct();
  }

  public function get_by_id($id) {
    $select = $this->build_select($this->primary_aspect);
    return self::query_item("$select WHERE `id` = $id;");
  }

  public function get_by_phone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    $select = $this->build_select('users');
    return db::query_item("$select WHERE `sms_number` = '$phone'");
  }

  public function get_by_group_id($group_id) {
    $select = $this->build_select();
    return db::query_array("$select WHERE `subscribers`.`group_id` = $group_id");
  }

  public function get_or_create($phone) {
    $data = $this->get_by_phone($phone);
    if($data) {
      // yay it worked!
      return $data;
    } else {
      // create a use by number
      $this->set(array('sms_number' => $phone));
      $id = mysql_insert_id();
      return $this->get_by_id($id);
    }
  }

}