<?php
/**
 * This class has basic file opeations listed.
 *Call matching exception from Exception handler upon exception generated.
 * @author Nirav Patel
 */

class FileHandler
{ 
    private $file;
    private $fileDir;
    private $ExcepHand;
    private $path;

    public function __construct()
    {
    if (empty($_GET["FileName"]))
    {
        Echo 'Please Enter file name to check.<br>';
    }
    else
    {
        $fileop=new FileOperation();
        $this->thisdir = getcwd();
        $path=$this->thisdir.'\\'.$_GET["FileName"];

        try {
        @$fileop->isFileExists($path);
        $fileop->readFileintoArray($path);
        $fileop->readLineByLineFromFile($path);
        $fileop->AppendtoFile($path);
        $fileop->DelelteFile($_GET["DelFile"]);
        $fileop->getAllfilesFromDirectory($_GET["DirName"]);
        $fileop->CreateDirectory($_GET["NewDirName"]);
        $fileop->ReadCSVFile($path);
        $fileop->readXMLFile($path);
        }
        catch(FileNotFoundException $e)
        {
        Echo 'Severe Error Occured : File not Found.'; 
        }
        catch(FileLoadException $e)
        {
        Echo 'Error in loading file..';  
        }
        catch(DirectoryExistsException $e)
        {
        Echo 'Directory already exists..';  
        }
        catch(FileAlreadyExistsException $e)
        {
        Echo 'File already exists..';  
        }
        catch(FileNotReadble $e)
        {
        Echo 'File is not readble..';  
        }
        catch(FileAlreadyExistsException $e)
        {
        Echo 'File is not writable...';  
        }
        catch(GeneralException $e)
        {
        Echo 'Error occured in Processing request...';  
        }
        catch(DirectoryNotFoundException $e)
        {
        Echo 'Directory not found..';  
        }
        }
    }

}
class FileOperation
{
 /*Check to see file exists*/
    Public function isFileExists($file)
    {
        if(!file_exists($file))
        {
        throw new FileNotFoundException('File '.$file.' not found');
        return true;
        }
        else
        {
        return true;           
        }
    }

    /*check to see if file can be readble */
    public function isReadble($file)
    {
        if (!is_readable($file)) 
        {
        throw new FileNotReadble('File '.$file.' not Readble.<br>');
        return true;
        }
        else
        {
        return true;
        }
    }
    /*check to see if file is wrtiable */
    public function isWritable($file)
    {
        if (!is_writable($file)) 
        {
        throw new FileNotWritableException('The file is' .$file. 'not writable.<br>');
        }
        return true;
    }
    /*Read file into string */
    public function readFileintoString($file)
    {
        if($this->isFileExists($file))
        {
        if(!$content=file_get_contents($file))
        {
        throw new FileLoadException('Unable to read file contents.');
        }
        echo $content;
        return $content;
        }
    }

    /*READ FIle into arrary*/
    public function readFileintoArray($file)
    {
        if($this->isFileExists($file))
        {
        echo 'file path '.$file;
        if($this->isReadble($file))
        {
        $file_handle = file($file, FILE_USE_INCLUDE_PATH | FILE_SKIP_EMPTY_LINES);
        if (!$file_handle)
        {
         throw new GeneralException('Unable to read file into Array.');    
        }
        foreach ( $file_handle as $line ) 
        echo $line . "<br />";
        }
        }
    }
    /*Reading single line from file. */
    public function readLineByLineFromFile($file)
    {
        if($this->isFileExists($file))
        {
        if($this->isReadble($file))
        {
        /* @var $file_handle type */
        $file_handle = fopen($file);

        if ($file_handle)
        {
        while (($buffer = fgets($handle, 4096)) !== false)
        {
        echo $buffer;
        }
        if (!feof($handle))
        {
        throw new GeneralException("Error: unexpected fgets() fail\n");
        }
        fclose($handle);
        }
        }
        }
    }
    /*reading csv file */
    public function ReadCSVFile($file)
    {
        $row = 1;
        if($this->isFileExists($file))
        {
        if (($handle = fopen("sampleCSV.CSV", "r")) !== FALSE) 
        {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
        {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
        echo $data[$c] . "<br />\n";
        }
        }
        fclose($handle);
        }
        }
    }
    /*Read XML file */
    public function readXMLFile($file)
    {
        if($this->isFileExists($file))
        {
        $xml = simplexml_load_file($file);
        if($xml)
        {
        echo $xml->getName() . "<br />";
        foreach($xml->children() as $child)
        {
        echo $child->getName() . ": " . $child . "<br />";
        }   
        }
        else
        {
           throw new FileLoadException("Not able to Load XML file :".$file ."<br>");
        }
        }
    }
    /*Append data to existing file */
    public function AppendtoFile($file)
    {
        if($this->isFileExists($file))
        {
        $file=fopen($file,"a+");

        if($file)
        {
        $message = 'HellO I am appending.';
        echo 'Appending file'. '<br>';
        fwrite($file,"$message\n");
        fclose($file);
        }
        else
        {
        throw new FileLoadException("Unable to open file : ". $file ."<br>");   
        }
        }
    }
    /*Create Directory */
    public function CreateDirectory($Dirname)
    {
        $thisdir = getcwd();
        Echo 'here in '.$Dirname;
        /* Step 2. From this folder, I want to create a subfolder called "myfiles".  Also, I want to try and make this folder world-writable (CHMOD 0777). Tell me if success or failure... */
        if(mkdir($thisdir ."/".$Dirname , 0777))
        {
        echo "Directory has been created successfully... <br>";
        }
        else
        {
        throw new DirectoryExistsException("Failed to create directory : Directory Already Exists :". $Dirname ."<br>");
        } 
    }
    /*LIST ALL FILES FORM Directory */
    public  function getAllfilesFromDirectory($DirName)
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
        throw new FileLoadException("Unable to open Directory :" .$DirName . "<br>");   
        }
    }
    /*removing or deleting file   */
    public function  DelelteFile($file)
    {
        if($this->isFileExists($file))
        {
        $unlink = unlink($file);
        if ($unlink)
        {
        echo "File deleted Successfully...<br>";
        }
        else
        {
        throw new GeneralException("Failed to delete file :".$file. "<br>"); 
        }
        }
    }
  }
?>
