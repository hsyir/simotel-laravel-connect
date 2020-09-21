<div dir=rtl>

# پکیح لاراول ارتباط با سیموتل


[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/hsyir/simotel-laravel-connect/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/hsyir/simotel-laravel-connect/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/hsyir/simotel-laravel-connect/badges/build.png?b=master)](https://scrutinizer-ci.com/g/hsyir/simotel-laravel-connect/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/hsyir/simotel-laravel-connect/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)


ارتباط با Simotel بوسیله لاراول

- [نصب](#نصب)
- [سازگاری با سیموتل](#simotel-api)
- [Simotel Api](#simotel-api)
- [Simotel Event Api](#simotel-event-api)
- [Smart Api](#smart-api)

## نصب
با استفاده از کامپوزر و لاراول 6 به بعد این پکیج را با فرمان زیر نصب کنید:

</div> 

```
composer require hsyir/simotel-laravel-connect
```

<div dir=rtl>

سپس به وسیله اجرای فرمان زیر فایل کانفیگ ساخته خواهد شد:

</div> 

```
php artisan vendor:publish --provider=Hsyir\\SimotelConnect\\SimotelApiServiceProvider
```


<div dir=rtl>

## سازگاری با سیموتل

| ورژن پکیج لاراول|  ورژن نرم افزار سیموتل |
|---|---|
| 1.*  |  5.2.5 |

</div> 

<div dir=rtl>

## Simotel Api
Simotel Api یکی از قابلیت های قدرتمند نرم افزار سیموتل است، بوسیله این Api میتوان برخی اعمال تعریف شده روی سیموتل را از راه دور و بوسیله فریمورک قدرتمند لاراول انجام داد.    

#### اتصال به سیموتل

برای تعریف آدرس سرور سیموتل و اطلاعات ورود در فایل کانفیگ simotel.php مقادیر زیر را تغییر دهید:


</div> 

```php

"simotelApi" => [
        "apiUrl" => env("SIMOTEL_API_SERVER", "http://127.0.0.1/api/v1/"),
        "user" => env("SIMOTEL_API_USER", "user"),
        "pass" => env("SIMOTEL_API_PASS", "pass"),
    ],

```


<div dir=rtl>

#### نحوه استفاده

</div> 

   
```php
$simotelApi = new \Hsy\SimotelConnect\SimotelApi();
$result = $simotelApi->pauseInQueue($queue, $agent);

if(!$result)
    $errorMessage = $simotelApi->getMessage(); 
```    


<div dir=rtl>

#### متد ها

</div> 

```php
boolean addToQueue($queue, $source, $agent, $penalty = 0)
boolean removeFromQueue($queue, $agent)
boolean pauseInQueue($queue, $agent)
boolean resumeInQueue($queue, $agent)
```



<div dir=rtl>

## Simotel Event Api
Simotel Event Api (SEA) سرویس انتشار رویداد های سیموتل است. 
این پکیج امکان استفاده از این سرویس را بوسیله قابلیت های Events و Listeners در لاراول امکان پذیر می کند.
برای استفاده از Event های موجود در SEA می توانید از کلاس های زیر در EventServiceProvider لاراول استفاده کنید.


</div>

```php

"Cdr" => \Hsy\SimotelConnect\Events\SimotelEventCdr::class,  
"NewState" => \Hsy\SimotelConnect\Events\SimotelEventNewState::class,  
"ExtenAdded" => \Hsy\SimotelConnect\Events\SimotelEventExtenAdded::class,  
"ExtenRemoved" => \Hsy\SimotelConnect\Events\SimotelEventExtenRemoved::class,  
"IncomingCall" => \Hsy\SimotelConnect\Events\SimotelEventIncomingCall::class,  
"OutGoingCall" => \Hsy\SimotelConnect\Events\SimotelEventOutgoingCall::class,  
"Transfer" => \Hsy\SimotelConnect\Events\SimotelEventTransfer::class,

```


<div dir=rtl>

#### نمونه Listener :

</div>

```php
namespace App\Listeners;  
  
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
      
      // 
      
    }
       
 }
```     

<div dir=rtl>

پراپرتی apiData حاوی اطلاعات ارسالی از سیموتل است که به Listener ارسال می شود.






#### نمونه Controller :

</div>

```php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Hsy\SimotelConnect\SimotelEventApi;
use Illuminate\Http\Request;

class SeaController extends Controller
{
    public function dispatchEvent(Request $request)
    {
        $simotelEventApi = new  SimotelEventApi;
        $simotelEventApi->dispatchSimotelEvent($request->all());
    }
}
```






<div dir=rtl>

## Smart Api
برای استفاده از این قابلیت ویژه نرم افزار سیموتل در فریمورک لاراول ابتدا باید یک کلاس به صورت زیر ایجاد کنید.
برای استفاده از دستورات آماده پکیج از Trait با نام SmartApiCommands باید استفاده نمایید. 


</div>



```php

namespace App\Classes;  
         
use Hsy\SimotelConnect\SmartApiCommands;  
  
class SmartApiMethodsRepo  
{  
    use SmartApiCommands;  
  
    // نام متد باید مساوی با نام کامپوننت SmartApi در نقشه تماس سیموتل باشد.
    public function select_queue($apiData)  
    {  
        
        $this->cmdGetData("SelectQueue", 4, 2);  
        $this->cmdExit("1");  
            
        if(true)
            return $this->okResponse();  
        //else
            return $this->errorResponse();
    }
    
 }

```   


<div dir=rtl>

#### متدهای قابل استفاده :

</div>
	
  
```php

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

```


<div dir=rtl>

جهت معرفی کلاس ایجاد شده در فایل کانفیگ simotel.php مقدار زیر را تنظیم کنید.

</div>
    
```php


 "smartApi" => [  
      "methodsRepositoryClass" => \App\Classes\SmartApiMethodsRepo::class,  
    ],

```    
      
	
<div dir=rtl>

#### نمونه Controller :

</div>
	
```php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Hsy\SimotelConnect\SmartApi;
use Illuminate\Http\Request;

class SmartApiController extends Controller
{
    public function call(Request $request)
    {
        $smartApi = new SmartApi;
        $response = $smartApi->callApi($request->all());
        return response()->json($response);
    }
}


```

## License



