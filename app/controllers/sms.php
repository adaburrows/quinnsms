<?php
/*
 * SMS class
 * ----------
 * Demo of a standard dynamis controller
 * =============================================================================
 */
class sms extends controller {

	public function initialize() {
		router::setReqType('json');
		parent::initialize();
	}

	// Class properties.
	protected $timeStamp;
	protected $destinationAddress;
	protected $message;
	protected $messageId;
	protected $senderAddress;

	private function getTimeStamp() {
		return $this->timeStamp;
	}
	
	private function getDestinationAddress() {
		return $this->destinationAddress;
	}
	
	private function getMessage() {
		return $this->message;
	}
	
	private function getMessageId() {
		return $this->messageId;
	}
	
	private function getSenderAddress() {
		return $this->senderAddress;
	}
	
	
	private function parseIncoming() {
		$json = file_get_contents('php://input');

		$notification = json_decode($json);
		if($notification) {
			$this->timeStamp = $notification->inboundSMSMessageNotification->inboundSMSMessage->dateTime;
			$this->destinationAddress = $notification->inboundSMSMessageNotification->inboundSMSMessage->destinationAddress;
			$this->message = $notification->inboundSMSMessageNotification->inboundSMSMessage->message;
			$this->messageId = $notification->inboundSMSMessageNotification->inboundSMSMessage->messageId;
			$this->senderAddress = $notification->inboundSMSMessageNotification->inboundSMSMessage->senderAddress;
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function test() {
		# $groupNumber = $this->SMS->provisionNewNumber(app::$config['smsified_appid'], '503');
		
		$groupNumber = '15038479368';
		$this->senderAddress = '17653141599';
		$this->message = "Aaron's 3rd Grade Class";

		// Look up user from the senderAddress, create if not exists
		$user = $this->User->get_or_create($this->senderAddress);

		// Create the new group with the given name in the "message" input
		$passcode = rand(100000, 999999);
		$this->Group->set(array(
			'user_id' => (int)$user['id'],
			'name' => $this->message,
			'sms_number' => $groupNumber,
			'passcode' => $passcode
		));
		
		$message = 'Your new group has been created! The phone number is ' . formatPhoneNumber(normalizePhoneNumber($groupNumber)) 
			. '. Your group passcode is: ' . $passcode;
		$this->SMS->sendMessage($groupNumber, $this->senderAddress, $message);
		
		
		return array('number'=>$groupNumber);
	}

    /*
     * master()
     * -------
     * Incoming SMSs from the app's master "setup" phone number are sent here.
     * =========================================================================
     */
    public function master() {
		$result = $this->parseIncoming();

		if(!$result) {
			irc_debug('json error!');
			return array('error'=>'Could not parse input');
		}
		
		// Look up user from the senderAddress, create if not exists
		$user = $this->User->get_or_create($this->senderAddress);
		
		// Provision a new phone number
		$groupNumber = $this->SMS->provisionNewNumber(app::$config['smsified_appid'], '503');
		
		// Create the new group with the given name in the "message" input
		$passcode = rand(100000, 999999);
		$this->Group->set(array(
			'user_id' => (int)$user['id'],
			'name' => $this->message,
			'sms_number' => $groupNumber,
			'passcode' => $passcode
		));
		
		// Reply with the new group phone number and passcode
		$message = 'Your new group has been created! The phone number is ' . formatPhoneNumber(normalizePhoneNumber($groupNumber)) 
			. '. Your group passcode is: ' . $passcode;
		$this->SMS->sendMessage($groupNumber, $this->senderAddress, $message);
		
        $data = array();
		
        return $data;
    }
}
