<?php
/**
 * Created by PhpStorm.
 * User: 5729906803
 * Date: 9/13/2020
 * Time: 1:04 PM
 */

namespace Hsy\SimotelConnect;


class SmartApi
{
    public function callApi($apiData)
    {
        $appName = $apiData['app_name'];
        $apiMethodsRepositoryClassPath = config("simotel.smartApi.methodsRepositoryClass");
        $apiMethodsRepository = new $apiMethodsRepositoryClassPath;
        if (!method_exists($apiMethodsRepository, $appName))
            return false;

        $apiResponse = $apiMethodsRepository->$appName($apiData);
        if (!is_array($apiResponse))
            return false;

        return $apiResponse;

    }
}
