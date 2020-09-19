# Simotel Laravel Connect

Description.

## Simotel Api

    
    
    boolean addToQueue($queue, $source, $agent, $penalty = 0)
    boolean removeFromQueue($queue, $agent)
    boolean pauseInQueue($queue, $agent)
    boolean resumeInQueue($queue, $agent)

   Usage:
  
    $simotelApi = new SimotelApi();
    $res = $simotelApi->pauseInQueue($queue, $agent)
    
    if(!$res)
	    $errorMessage = $simotelApi->getMessage(); 


## Simotel Event Api
You can listen to defined Events in this package:

    "Cdr" => \Hsy\SimotelConnect\Events\SimotelEventCdr::class,  
    "NewState" => \Hsy\SimotelConnect\Events\SimotelEventNewState::class,  
    "ExtenAdded" => \Hsy\SimotelConnect\Events\SimotelEventExtenAdded::class,  
    "ExtenRemoved" => \Hsy\SimotelConnect\Events\SimotelEventExtenRemoved::class,  
    "IncomingCall" => \Hsy\SimotelConnect\Events\SimotelEventIncomingCall::class,  
    "OutGoingCall" => \Hsy\SimotelConnect\Events\SimotelEventOutgoingCall::class,  
    "Transfer" => \Hsy\SimotelConnect\Events\SimotelEventTransfer::class,


Create your listeners like bellow:
  

    namespace App\Listeners;  
      
    use App\Models\Call;  
    use App\User;  
      
    class UpdateCallCdrData  
    {        
		 /**  
		 * Handle the event. * * @param object $event  
		 * @return void  
		 */    
		     
	     public function handle($event)  
	     {
		      $cdrData = $event->apiData;  
	     }
	     
     }
     



## Smart Api
First, create your **Api Methods Repository Class** and edit simotel config file:

    "smartApi" => [  
      "methodsRepositoryClass" => \App\Classes\SmartApiMethodsRepo::class,  
    ],

Now, use the SmartApi component name defined in Simotel Dial Plan for Methods:

    namespace App\Classes;  
         
    use Hsy\SimotelConnect\SmartApiCommands;  
      
    class SmartApiMethodsRepo  
    {  
		use SmartApiCommands;  
      
	    public function select_queue($appData)  
	    {  
			$this->cmdGetData("SelectQueue", 4, 2);  
	        $this->cmdExit("1");  
	        if(true)
		        return $this->okResponse();   //
		    else
			    return $this->errorResponse()
        }
	}  
	
	

Avalable Methods:

  
	cmdPlayAnnouncement($file)  
    cmdPlayback($file)  
    cmdExit($exit)  
    cmdGetData($file,$timeout,$digitsCount)  
    cmdSayDigit($number)  
    cmdSayNumber($number)  
    cmdSayClock($clock)  
    cmdSayDate($date,$calender)  
    cmdSayDuration($duration)  
    cmdSetExten($exten)  
    cmdSetLimitOnCall($seconds)  
