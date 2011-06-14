<?php
/*
 This class is used for logging error in specified Text file.
 @author Nirav Patel
 */
interface IErrorHandler
{
function __construct($any_error);
}
/*Class Implements Interface*/
class ErrorLogging implements IErrorHandler
{
    private $errorObj;
    public function __construct($any_error)
    {
    $this->errorObj=$any_error;
    $this->logError($this->errorObj);
    }
    /*Prepeare  error Information */
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
    /*Actual function to Write/Log errors */
    public function WriteErrorToTextFile($errorInfo) 
    {
        if(!file_exists("Error_Log.txt"))
        {
        //Create and Write log file.
        Echo 'Log file does not Exist ,Log file Created.<br>';
        $file=fopen("Error_Log.txt","w");
        fwrite($file,"$errorInfo[0] , $errorInfo[1] , $errorInfo[2] ,$errorInfo[3] ,$errorInfo[4] ,$errorInfo[5] ,$errorInfo[6],$errorInfo[7] \n");
        fclose($file);
        }
        else
        {
        //Append errors to existing file.
        $file=fopen("Error_Log.txt","a+");
        fwrite($file,"$errorInfo[0] , $errorInfo[1] , $errorInfo[2] ,$errorInfo[3] ,$errorInfo[4] ,$errorInfo[5] ,$errorInfo[6],$errorInfo[7] \n");
        fclose($file);
        }
    }
    //This may be redudant as I already have function in other class.
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

    
}

?>
