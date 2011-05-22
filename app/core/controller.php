<?php
class controller {
  protected $User;
  protected $Group;
  protected $Subscription;

  public function initialize() {
    $this->User = app::getModel('user');
    $this->Group = app::getModel('group');
    $this->Subscription = app::getModel('subscription');
    $this->SMS = app::getModel('smsified');

    // If the request is the default type, prepare to render everything.
    if(router::getReqType() === 'html'){

    }
  }

}
