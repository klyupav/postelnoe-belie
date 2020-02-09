<?php

namespace App\Http\Controllers;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggerController extends Controller
{
    public static function logToFile($message, $level = 'info', $context = [], $print_error = true)
    {
        $log = new Logger(config('app.name'));
        $today = date('Y-m-d');
        $log->pushHandler(new StreamHandler( "storage/logs/{$today}.log"));
        switch ( $level )
        {
            case 'info':
                $log->info($message, $context);
                break;
            case 'warning':
                $log->warning($message, $context);
                break;
            case 'error':
                $log->error($message, $context);
                break;
        }
        static::log($message, $context, $print_error, $level);
    }

    public static function log($message, $context = [], $print_error = true, $level = 'info')
    {
        if ($print_error)
        {
            echo "<pre style='color: red'>";
            echo $message;
            echo "</pre>";
            echo "<pre>";
            !empty($context) ? print_r($context) : '';
            echo "</pre>";
        }

        if ( @config('parser.log_to_mail') )
        {
            try
            {
                switch ( $level )
                {
                    case 'info':
//                        \Mail::send('emails.alert', array('text' => $message, 'context' => $context), function($message)
//                        {
//                            $to = explode(',', config('parser.admin_emails'));
//                            $message->to($to);
//                            $message->subject('info');
//                        });
                        break;
                    case 'warning':
                        \Mail::send('emails.alert', array('text' => $message, 'context' => $context), function($message)
                        {
                            $to = explode(',', config('parser.admin_emails'));
                            $message->to($to);
                            $message->subject('warning');
                        });
                        break;
                    case 'error':
                        \Mail::send('emails.alert', array('text' => $message, 'context' => $context), function($message)
                        {
                            $to = explode(',', config('parser.admin_emails'));
                            $message->to($to);
                            $message->subject('error');
                        });
                        break;
                }

            }
            catch (\Exception $e)
            {

            }
        }
    }
}
