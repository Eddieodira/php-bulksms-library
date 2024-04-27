<?php

namespace Eddieodira\Messager;

use Eddieodira\Messager\Constant\Constants;
use Eddieodira\Messager\Exception\MessagerException;

class Sender
{
    protected $apiEndPoint;
    protected $userId;
    protected $password;
    protected $apiKey;
    protected $senderId;
    protected $msgType;
    protected $message;
    protected $phone;
    protected $duplicateCheck;
    protected $scheduleTime;
    protected $output;
    protected $sendMethod;
    protected $response;
    protected $arrayPost;

    public function __construct($configData) {
        $data = (object) $configData;
        $this->apiEndPoint = $data->apiEndPoint;
        $this->userId = $data->userId;
        $this->password = $data->password;

        if($data->apiKey != ''){
            $this->apiKey = $data->apiKey;
        }
        
        $this->senderId = $data->senderId;
    }


    public function getResponse() {
        return $this->response;
    }
        
        
    public function setDuplicateCheck($duplicateCheck) {
        $this->duplicateCheck = $duplicateCheck;
    }   
        
        
    public function setMessage($message) {
        $this->message = $message;
    }
        
        
    public function setPhone($phone) {
        $this->phone = $phone;
    }
        
        
    public function setScheduleTime($scheduleTime) {
        $this->scheduleTime = $scheduleTime;
    }

    public function setOutputFormat($output) {
        $this->output = $output;
    }

    public function setSendMethod($sendMethod) {
        $this->sendMethod = $sendMethod;
    }

    public function setMessageType($msgType) {
        $this->msgType = $msgType;
    }

    public function sendMessage()
    {
        if (!empty($this->phone) && !empty($this->message)) {
            $this->arrayPost[Constants::SMS_MESSAGE] = $this->message;
            $this->arrayPost[Constants::SMS_SENDER_ID] = $this->senderId;

            $this->arrayPost[Constants::SMS_MESSAGE_TYPE] = $this->msgType == "" ? Constants::TYPE_TEXT_MESSAGE : $this->msgType;
            
            $this->arrayPost[Constants::SMS_SCHEDULE_TIME] = $this->scheduleTime;

            $this->arrayPost[Constants::SMS_CHECK_DUPLICATE] = $this->duplicateCheck == "" ? false : $this->duplicateCheck;

            $this->arrayPost[Constants::SMS_OUTPUT] = $this->output == "" ? Constants::OUTPUT_FORMAT_JSON : $this->output;

            $this->arrayPost[Constants::SMS_SEND_METHOD] = $this->sendMethod;

            if ($this->validPhone($this->phone)) {
                $this->arrayPost[Constants::SMS_PHONE] = $this->phone;
            }

            $this->baseAPIPost($this->apiEndPoint, $this->arrayPost);
        }
    }

    private function baseAPIPost($apiEndPoint, $arrayPost = array()) {
        $this->arrayPost[Constants::SMS_USER_ID] = $this->userId;
        $this->arrayPost[Constants::SMS_PASSWORD] = $this->password;
        return $this->response = $this->sendArrayPost($this->apiEndPoint, $this->arrayPost);
    }


    private function sendArrayPost($apiEndPoint ,$arrayPost) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiEndPoint);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $arrayPost);
        if($this->apiKey && $this->apiKey != ''){
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:','apikey:'.$this->apiKey));
        } else {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:'));
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        if ($this->sendMethod === Constants::METHOD_BULK_MESSAGE) {
            curl_setopt($curl, CURLOPT_SAFE_UPLOAD, 1);
        }
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        $curl_response = curl_exec($curl);
        $getHTTPCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $curlError = curl_error($curl);
        curl_close($curl);
        if ($curl_response === false) {
            throw new MessagerException('Unable to connect to Hostpinnacle SMS API: ' . $curlError);
        } elseif ($getHTTPCode != 200) {
            throw new MessagerException('Bad response from Hostpinnacle SMS API: HTTP code ' . $getHTTPCode);
        }
        return $curl_response;
    }

    private function validPhone($phone)
    {
        if (isset($phone)) {
            if (preg_match(Constants::PARAM_PATTERNS['PHONE_NUMBER'], $phone)) {
                return true;
            }
        }

        throw new MessagerException("The mobile phone: {$phone} is invalid. All phones must start with +254 or 254");
    }
}
