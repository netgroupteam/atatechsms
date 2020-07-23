<?php
namespace Netgroup\AtaTechSms;

class ResponseCodes{
    const S_000 = 'Operation is successful';
    const S_001 = 'Processing, report is not ready';
    const S_002 = 'Duplicate <control_id> (it must be unique for each task)';
    const S_100 = 'Bad request';
    const S_102 = 'Operation type is empty';
    const S_103 = 'Login is empty';
    const S_104 = 'Password is empty';
    const S_105 = 'Invalid authentification information';
    const S_106 = 'Title is empty';
    const S_107 = 'Invalid title';
    const S_108 = 'Task id is empty';
    const S_109 = 'Invalid task id';
    const S_110 = 'Task with supplied id is canceled';
    const S_111 = 'Scheduled date is empty';
    const S_112 = 'Invalid scheduled date';
    const S_113 = 'Old scheduled date';
    const S_114 = 'isbulk is empty';
    const S_115 = 'Invalid isbulk value, must be "true" or "false"';
    const S_116 = 'Invalid bulk message';
    const S_117 = 'Invalid body';
    const S_118 = 'Not enough units';
    const S_235 = 'Invalid Title, please contact Account Manager';
    const S_2xx = 'System error, report to administrator';
    const S_300 = 'Internal server error, report to administrator';


    public function getStatus($status){
        $const = "S_{$status}";
        return constant("Netgroup\AtaTechSms\ResponseCodes::{$const}");
    }
}


