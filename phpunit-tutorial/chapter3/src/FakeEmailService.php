<?php

namespace PHPUnitTutorial\Chapter3;

class FakeEmailService implements IEmailService
{
    /**
     * @var string
     */
    public $to;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $body;

    /**
     * 发送电子邮件
     *
     * @param string $to
     * @param string $subject
     * @param string $body
     *
     * @return void
     */
    public function sendEmail($to, $subject, $body)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->body = $body;
    }
}