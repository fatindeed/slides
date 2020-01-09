<?php

namespace PHPUnitTutorial\Chapter3;

interface IEmailService
{
    /**
     * 发送电子邮件
     *
     * @param string $to
     * @param string $subject
     * @param string $body
     *
     * @return void
     */
    public function sendEmail($to, $subject, $body);
}