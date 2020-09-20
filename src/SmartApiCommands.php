<?php
/**
 * Created by PhpStorm.
 * User: 5729906803
 * Date: 9/13/2020
 * Time: 1:04 PM
 */

namespace Hsy\SimotelConnect;


trait SmartApiCommands
{
    private $apiCommands;

    private function addCommand($command)
    {
        $this->apiCommands[] = $command;
    }

    private function render()
    {
        $commands = implode(";", $this->apiCommands);
        $this->apiCommands = [];
        return $commands;
    }

    private function okResponse()
    {
        return ["ok" => 1,
            "commands" => $this->render()];
    }

    private function errorResponse()
    {
        return ["ok" => 0];
    }

    /*
     *
     */
    private function cmdPlayAnnouncement($file)
    {
        $this->addCommand("PlayAnnouncement('$file')");
    }

    /*
     *
     */
    private function cmdPlayback($file)
    {
        $this->addCommand("Playback('$file')");
    }

    /*
     *
     */
    private function cmdExit($exit)
    {
        $this->addCommand("Exit('$exit')");
    }

    /*
     *
     */
    private function cmdGetData($file,$timeout,$digitsCount)
    {
        $this->addCommand("GetData('$file',$timeout,$digitsCount)");
    }

    /*
     *
     */
    private function cmdSayDigit($number)
    {
        $this->addCommand("SayDigit($number)");
    }

    /*
     *
     */
    private function cmdSayNumber($number)
    {
        $this->addCommand("SayNumber($number)");
    }

    /*
     *
     */
    private function cmdSayClock($clock)
    {
        $this->addCommand("SayClock($clock)");
    }

    /*
     *
     */
    private function cmdSayDate($date,$calender)
    {
        $this->addCommand("SayDate('$date','$calender')");
    }

    /*
     *
     */
    private function cmdSayDuration($duration)
    {
        $this->addCommand("SayDuration('$duration'");
    }

    /*
    *
    */
    private function cmdSetExten($exten)
    {
        $this->addCommand("SetExten('$exten')");
    }
    /*
     *
     */
    private function cmdSetLimitOnCall($seconds)
    {
        $this->addCommand("SetLimitOnCall($seconds)");
    }
}
