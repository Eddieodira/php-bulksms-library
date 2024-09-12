<?php

namespace Eddieodira\Messager\Constant;

class Constants
{
    const SMS_USER_ID = "userid";
    const SMS_PASSWORD = "password";
    const SMS_PHONE = "mobile";
    const SMS_MESSAGE = "msg";
    const SMS_SENDER_ID = "senderid";
    const SMS_CHECK_DUPLICATE = "duplicatecheck";
    const SMS_SCHEDULE_TIME = "scheduleTime";

    const SMS_MESSAGE_TYPE = "msgType";
    const TYPE_TEXT_MESSAGE = "text";
    const TYPE_UNICODE_MESSAGE = "unicode";
    const TYPE_FLASH_MESSAGE = "flash";
    
    const SMS_OUTPUT = "output";
    const OUTPUT_FORMAT_JSON = "json";
    const OUTPUT_FORMAT_PLAIN = "plain";
    const OUTPUT_FORMAT_XML = "xml";

    const SMS_SEND_METHOD = "sendMethod";
    const METHOD_SIMPLE_MESSAGE = "simpleMsg";
    const METHOD_GROUP_MESSAGE = "groupMsg";
    const METHOD_BULK_MESSAGE = "excelMsg";
    
    const PARAM_PATTERNS = [
        'PHONE_NUMBER' => '/^(?:254|\+254|0)?(7(?:(?:[0-9][0-9])|(?:0[0-8])|(9[0-9]))[0-9]{6})$/',
    ];
}
