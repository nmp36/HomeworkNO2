<?php
/*This class is Exception Main class.Custom exceptions are 
 * defined here which were extended from Base class Exception.
 *
 * @author Nirav Patel
 */

/*This function is custom error handler to catch warnings,notices.*/
function customError($errno, $errstr,$errfile,$errline,$errcontext)
{
    switch ($errno)
    {
    case E_WARNING:
    $message="Warning: " .$errstr . " , File :".$errfile." , Line Number :".$errline." ,Context :".$errcontext."\n";
    error_log($message, 3, "Error_log.txt");
    }
}
set_error_handler("customError");  

##Region Custom Excpetion
/*File not found exception*/
class FileNotFoundException extends Exception
{
     function __autoload($className)
{
     require_once  "$className.php";
}
    public function __construct( $message ) 
    {
    parent::__construct( $message );
    $obj=new ErrorLogging();
    echo 'code'. $this->getcode();
    $obj->logError($this);

    }
}
/*File not readbale exception*/
class FileNotReadble extends Exception
{
    public function __construct( $message ) 
    {
    parent::__construct( $message );
    $obj=new ErrorLogging();
    $obj->logError($this);

    }
}
/*Directory not found exception*/
class DirectoryNotFoundException extends Exception
{
    public function __construct( $message ) 
    {
    parent::__construct( $message );
    $obj=new ErrorLogging();
    $obj->logError($this);

    }
}
/*EndofFile exception */
class EndofFileException extends Exception
{
    public function __construct( $message ) 
    {
    parent::__construct( $message );
    $obj=new ErrorLogging();
    $obj->logError($this);

    }
}
/*FileLoad Exception class*/
class FileLoadException extends Exception
{
    public function __construct( $message ) 
    {
    parent::__construct( $message);
    $obj=new ErrorLogging();
    $obj->logError($this);

    }
}
/*Directory Already exists Exception*/
class DirectoryExistsException extends Exception
{
    public function __construct( $message ) 
    {
    parent::__construct( $message );
    $obj=new ErrorLogging();
    $obj->logError($this);

    }
}
/*File Already Exists exception */
class FileAlreadyExistsException extends Exception
{
    public function __construct( $message ) 
    {
    parent::__construct( $message );
    $obj=new ErrorLogging();
    $obj->logError($this);

    }
}
/*Permission denied exception --No permission to open file/directory */
class PermissionDeniedException extends Exception
{
    public function __construct( $message ) 
    {
    parent::__construct( $message);
    $obj=new ErrorLogging();
    $obj->logError($this);

    }

}
/*File not writable exception */
class FileNotWritableException extends Exception
{
    public function __construct( $message ) 
    {
    parent::__construct( $message);
    $obj=new ErrorLogging();
    $obj->logError($this);

    }
}

/*Invalid Tag Exception*/
class InvalidTagNameException extends Exception
{
    public function __construct($message) 
    {
    parent::__construct($message);
    $obj=new ErrorLogging();
    $obj->logError($this);

    }
}
/*Invalid Attributes Exceptions*/
class InvalidAttributeException extends Exception
{
    public function __construct( $message) 
    {
    parent::__construct( $message);
    $obj=new ErrorLogging();
    $obj->logError($this);

    }
}
/*Invalid Content Exceptions*/
class InvalidContentException extends Exception
{
    public function __construct( $message) 
    {
    parent::__construct( $message);
    $obj=new ErrorLogging();
    $obj->logError($this);

    }
}
/*General Exception if NO match occured */
class GeneralException extends Exception
{
    public function __construct( $message) 
    {
    parent::__construct( $message);
    $obj=new ErrorLogging();
    echo 'code'. $this->getcode();
    $obj->logError($this);
    
    }
}
#End Region 

?>
