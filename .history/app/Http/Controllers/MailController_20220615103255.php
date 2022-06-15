<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller {
   public function basic_email() {
      $data = array('name'=>"Hup");
   
      FacadesMail::send(['text'=>'mail'], $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('xyz@gmail.com','Hup');
      });
      echo "Basic Email Sent. Check your inbox.";
   }
   public function html_email() {
      $data = array('name'=>"Hup");
      FacadesMail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('managepayment95@gmail.com','Hup');
      });
      echo "HTML Email Sent. Check your inbox.";
    }
   
   public function attachment_email() {
      $data = array('name'=>"Hup");
      FacadesMail::send('mail', $data, function($message) {
         $message->to('cuongnew37@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('E:\Downloads\Images\1070697.jpg');
         $message->from('managepayment95@gmail.com','Hup');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}