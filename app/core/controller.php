<?php
class controller {
  protected $User;
  protected $Group;
  protected $Subscriber;
  protected $SMS;

  public function initialize() {
    $this->User = app::getModel('user');
    $this->Group = app::getModel('group');
    $this->Subscriber = app::getModel('subscriber');
    $this->SMS = app::getModel('smsified');
    $this->SMS->auth(app::$config['smsified_user'], app::$config['smsified_pass']);

    // If the request is the default type, prepare to render everything.
    if(router::getReqType() === 'html'){

    }
  }

}
