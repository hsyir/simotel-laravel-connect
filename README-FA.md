<div dir=rtl>

# پکیح لاراول ارتباط با سیموتل
ارتباط با Simotel Api بوسیله لاراول

## Simotel Api
Simotel Api یکی از قابلیت های قدرتمند نرم افزار سیموتل است، بوسیله این Api میتوان برخی اعمال تعریف شده روی سیموتل را از راه دور و بوسیله فریمورک قدرتمند لاراول انجام داد.    
</div> 
   
    boolean addToQueue($queue, $source, $agent, $penalty = 0)
    boolean removeFromQueue($queue, $agent)
    boolean pauseInQueue($queue, $agent)
    boolean resumeInQueue($queue, $agent)

   Usage:

    $simotelApi = new \Hsy\SimotelConnect\SimotelApi();
    $result = $simotelApi->pauseInQueue($queue, $agent);
    
    if(!$result)
	    $errorMessage = $simotelApi->getMessage(); 

<div dir=rtl>
## Simotel Event Api
Simotel Event Api (SEA) سرویس انتشار رویداد های سیموتل است. 
این پکیج امکان استفاده از این سرویس را بوسیله قابلیت های Events و Listeners در لاراول امکان پذیر می کند.
برای استفاده از Event های موجود در SEA می توانید از کلاس های زیر در EventServiceProvider لاراول استفاده کنید.
</div>

    "Cdr" => \Hsy\SimotelConnect\Events\SimotelEventCdr::class,  
    "NewState" => \Hsy\SimotelConnect\Events\SimotelEventNewState::class,  
    "ExtenAdded" => \Hsy\SimotelConnect\Events\SimotelEventExtenAdded::class,  
    "ExtenRemoved" => \Hsy\SimotelConnect\Events\SimotelEventExtenRemoved::class,  
    "IncomingCall" => \Hsy\SimotelConnect\Events\SimotelEventIncomingCall::class,  
    "OutGoingCall" => \Hsy\SimotelConnect\Events\SimotelEventOutgoingCall::class,  
    "Transfer" => \Hsy\SimotelConnect\Events\SimotelEventTransfer::class,

<div dir=rtl>

#####نمونه Listener :
پراپرتی apiData حاوی اطلاعات ارسالی از سیموتل است که به Listener ارسال می شود.
</div>

    namespace App\Listeners;  
      
    use App\Models\Call;  
    use App\User;  
      
    class UpdateCallCdrData  
    {        
	   /**  
	    * Handle the event. 
	    * 
	    * @param object $event  
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
		    return $this->okResponse();  
		//else
		    return $this->errorResponse();
        }
		
     }  
	
	

Available Methods:

  
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
