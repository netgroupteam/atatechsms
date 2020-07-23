<?php

namespace Netgroup\AtaTechSms;

use App\Http\Controllers\Controller;
use Carbon\Traits\Date;


class BroadcastSms extends Controller
{
    use BroadcastSmsHelper;

    /**
     * @param string $title
     * @param string $bulkMessage
     * @param Date $scheduleDate
     * @param array $phoneNumbers
     * @return array "response status message"
     */
    public function sendBulk($title, $bulkMessage, $scheduleDate, $phoneNumbers = []){
        return $this->sendBulkMessage($title, $bulkMessage, $scheduleDate, $phoneNumbers);
    }


    /**
     * @param $title
     * @param $scheduleDate
     * @param array $phonesMessages
     * @return array "response status message"
     */
    public function sendIndividual($title, $scheduleDate, $phonesMessages = [])
    {
        return $this->sendIndividualMessage($title, $scheduleDate, $phonesMessages);
    }

}
