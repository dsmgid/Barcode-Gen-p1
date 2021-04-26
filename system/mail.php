<?php
namespace dsmgfw;

class mail
{
    public function mail(){
        return new \PHPMailer\PHPMailer\PHPMailer(true);
    }
}