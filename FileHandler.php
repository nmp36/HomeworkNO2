<?php
//include ("ExceptionHandler.php"); 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileHandler
 *
 * @author Dishna
 */
class FileHandler {
    private $file;
    private $fileDir;
    private $ExcepHand;
    public function __construct($file)
    {
        try
        {
        $this->ExcepHand = new ExceptionHandler();
        if(!file_exists($file))
        {
        throw new Exception('File '.$file.' not found');
        }
        $this->file=$file;
        }
       catch(Exception $e) 
        {
         $this->ExcepHand->logError($e);    
        }
    }
    
    public function getContent()
    {
        try
        {
        if(!$content=file_get_contents($this->file))
        {
        throw new Exception('Unable to read file contents.');
        }
        return $content;
        }
        catch(Exception $e)
        {
         $this->ExcepHand->logError($e);   
        }
    }
    /*Normal file operation */
    Public function fileOperations()
    {
        /*check if file exists -- Same function to check directory /file*/
        if(!file_exists($this->file))
        {
            echo 'file ' . $this->file . 'exists<br>';
        }
        else
        {
         echo 'file ' . $this->file .'does not exist<br>';   
            
        }
        
        /*check to if FILE.Direcorty readble exists */
      
    }
    /*check to see if file can be readble */
    public function isReadble($file)
    {
        
        if (is_readable($file)) 
        {
        echo 'The file is readable.<br>';

        } else 
        {

        echo 'The file is not readable.<br>';

        }
    }
    /*check to see if file is wrtiable */
    public function isWritable($file)
    {
        
        if (is_writable($file)) 
        {
        echo 'The file is writable. <br>';
        } else 
        {
        echo 'The file is not writable.<br>';
        }

    }
   /*READ FIle into arrary*/
    public function readFileintoArray($file)
    {
        $file_handle = fopen($file, "rb");
        while (!feof($file_handle) ) 
        {
        $line_of_text = fgets($file_handle);
        $parts = explode('=', $line_of_text);
        echo $parts[0] . $parts[1]. "<BR>";
        }
        fclose($file_handle);
    }
    /*LIST ALL FILES FORM Directory */
    public  function getAllfilesFromDirectory($DirName)
    {
        try
        {
        $handle = opendir($DirName);
        if ($handle) 
        {
        echo "Directory handle: $handle\n";
        echo "Files:\n";

        /* This is the correct way to loop over the directory. */
        echo 'Getting list of files from directory.<br>';
        while (false !== ($file = readdir($handle))) {
        echo "$file\n";
        }
        closedir($handle);
        }
        else
        {
         throw new Exception('Unable to open Directory!');   
        }
        }
        catch(Exception $e)
        {
         $this->ExcepHand->logError($e);            
        }
    }
    /*Append data to file */
    public function AppendtoFile($file)
    {
        try
        {
        $file=fopen($file,"a+");
        if($file)
        {
        $message = 'HellO I am appending...';
        echo 'Appending file <br>';
        fwrite($file,"\n $message");
        fclose($file);
        }
        else
        {
            throw new Exception('Unable to open file!');   
        }
        }
        catch(Eception $e)
        {
         $this->ExcepHand->logError($e);   
        }
        }
    /*Creat eDirectory */
    public function CreateDirectory()
    {
        try
        {
        $thisdir = getcwd();
        /* Step 2. From this folder, I want to create a subfolder called "myfiles".  Also, I want to try and make this folder world-writable (CHMOD 0777). Tell me if success or failure... */
        if(mkdir($thisdir ."/TestFiles" , 0777))
        {
        echo "Directory has been created successfully... <br>";
        }
        else
        {
        throw new Exception('Failed to create directory...');
        } 
        }
        catch(Exception $e)
        {
         $this->ExcepHand->logError($e);   
        }
    }
    /*removing or deleting file   */
    var $str='File deleted Successfully.';
    public function  DelelteFile($file)
    {
        $unlink = unlink($file);
        if ($unlink)
        {

        echo "File deleted Successfully...<br>";
        //return  $this->str;

        }
        else
        {
        //return  $this->str;
        throw new Exception('Failed to delete file.'); 
        }
    }
    /*
    * Read file line by line */
    Public function getFileLinebyLine($file)
    {
        try
        {
        $file = fopen($file, "r");
        if ($file)
        {
        //Output a line of the file until the end is reached
            echo 'Reading file line by line. <br>';
            while(!feof($file))
            {
            echo fgets($file). "<br />";
            }
            fclose($file);
            }
        else
        {
            throw new Exception('Unable to open file!');   
        }
        }
        catch(Exception $e)
        {
        $this->ExcepHand->logError($e);
        }
      }
    
}
?>
