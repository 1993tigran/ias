<?php

namespace App\Jobs;

use App\Jobs\Job;
use Davibennun\LaravelPushNotification\Facades\PushNotification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use PhpParser\Error;

/**
 * Class SendMessage
 * @package App\Jobs
 */
class SendMessage extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;


    /**
     * @var array
     */
    private $payload;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $os = $this->payload['os'];
        $deviceUdid = $this->payload['udid'];
        $message = $this->payload['message'];
        $environment = $this->payload['environment'];
        $finalMessage = PushNotification::Message('You have a new message',['custom' => ['message'=> $message['message'], 'user_id' => $message['user_id'] , 'user_name' => $message['user_name']]]);
        if($os == 'ios')
        {
            if($environment == 'dev')
            {
//                try
//                {
//                    PushNotification::app('appNameIOSDev')
//                        ->to($deviceUdid)
//                        ->send($finalMessage);
//                }catch (Error $e)
//                {
//                    \Response::json(['success' => false , 'message' => $e]);
//                }
            }
            else if($environment == 'prod')
            {
                try
                {
                    PushNotification::app('appNameIOSProd')
                        ->to($deviceUdid)
                        ->send($finalMessage);
                }
                catch (Error $e)
                {
                    \Response::json(['success' => false , 'message' => $e]);
                }
            }
        }
        else
        {

            PushNotification::app([
                'environment' => $environment,
                'apiKey'      => 'AIzaSyDXTzVm5NWaF0ISNwfaaymqtzqz72Ggzaw',
                'service'     => 'gcm'
            ])
                ->to($deviceUdid)
                ->send($finalMessage);
        }
    }
}
