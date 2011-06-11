<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExceptionHandler
 *
 * @author Dishna
 */
//This class has method for handling exceptions and logging it into Text file.
class ExceptionHandler {
    //put your code here
    //Logging exceptions/error
    function logError($anyError) 
    {
        
        $traceError = $anyError->getTrace();
        $errorInfo = array("Message: " . $anyError->getMessage(),
        "File: " . $anyError->getFile(),
        "Thrown on line: " . $anyError->getLine(),
        "Code: " . $anyError->getCode(),
        "Called by function: " . $traceError[0]['function'],
        "On line: " . $traceError[0]['line'],
        "in " . $traceError[0]['file'],
        "Classification: " . $this->classify($anyError->getCode()));
        //Write this into text file.
        //echo $errorInfo;
        echo 'writing to Log file.Please check Log file for details.<br>';
        $this->WriteErrorToTextFile($errorInfo);
    }
    //Log warnings /failures
    function classify($code)
    {
        if($code <= 110)
        {
        $classify = "Warning";
        }
        if($code > 110 && $code <= 120)
        {
        $classify = "Severe";
        }
        return $classify;
    }
   //Write error message to Text file.
    public function WriteErrorToTextFile($errorInfo) 
    {
    if(!file_exists("Error_Log.txt"))
        {
           //Create and Write
        Echo 'Log file does not Exist ,Log file Created.,<br>';
       $file=fopen("Error_Log.txt","w");
        //$message = 'HellO I am appending...';
        //echo '<b>'.'File :'.$e->getFile().'<br />';
        fwrite($file,"$errorInfo[0] , $errorInfo[1] , $errorInfo[2] ,$errorInfo[3] ,$errorInfo[4] ,$errorInfo[5] ,$errorInfo[6] \n");
        fclose($file);
        }
        else
        {
           //Write Append.
         $file=fopen("Error_Log.txt","a+");
        //$message = 'HellO I am appending...';
        //echo '<b>'.'File :'.$e->getFile().'<br />';
        fwrite($file,"$errorInfo[0] , $errorInfo[1] , $errorInfo[2] ,$errorInfo[3] ,$errorInfo[4] ,$errorInfo[5] ,$errorInfo[6] \n");
        fclose($file);
        }
    }

}

?>
