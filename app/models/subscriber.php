<?php
class subscriber extends db {

  public function __construct() {
    $this->aspects = array(
      'subscribers' => array(
        'id',
        'user_id',
        'model_id'
      )
    );
    parent::__construct();
  }

  public function get_by_id($id) {
    $select = $this->build_select($this->primary_aspect);
    return db::query_item("$select WHERE `id` = $id;");
  }

}