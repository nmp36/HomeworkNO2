<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" ID="cssFile" type="text/css" href="HelloWorldOrig.css" />
        <link rel="Javascript" ID="jsFile" type="text/javascript" href="HelloWorldOrig.js" />
        <title></title>
    </head>
    <form action="index.php" method="get">
    <body>
        
        <?php include ("HTMLPHP.php");  ?>
        <?php include ("FileHandler.php");  ?>
        <?php include ("HTMLTagCreator.php");  ?>
        
        <?php
 
        //Added By nirav call HTML Tag creator 
        $attributes = array();
        $htmlTag = new HTMLTagCreator();
        
        $tag = "a";
        $attributes = array("id" => "myid", "href" => "http://www.google.com", "class" => "myfirstclass mysecondclass");
        $content = "Test Tag";
       // $htmlTag->exception_tester($tag, $attributes, $content);
        $aTag = $htmlTag->aTag($tag, $attributes, $content);
        echo 'Tag Created : <br>'. $aTag;
        
        //File handling function test
        if (empty($_GET["FileName"]))
        {
         Echo 'Please Enter file name to check.';
        }
        else
        {
        Echo 'You entered File :';
        echo $_GET["FileName"].'<br>';
        $fr=new FileHandler($_GET["FileName"]); // potential error
        $fr->getAllfilesFromDirectory($_GET["Directory"]);
        $fr->getContent();
        $fr->fileOperations();
        $fr->AppendtoFile($_GET["FileName"]);
        $fr->CreateDirectory();
        $fr->getFileLinebyLine($_GET["FileName"]);
        $fr->isReadble($_GET["FileName"]);
        $fr->isWritable($_GET["FileName"]);
        $fr->readFileintoArray($_GET["FileName"]);
        $fr->DelelteFile($_GET["FileName"]);
        }
                      
        ?>
            
        <br>File Name: <input  id="fileID" type="text" name="FileName" />
        <br>Enter Directory: <input type="text" name="Directory" />
        <br><input type="submit" />
       
    </body>
    </form>
</html>
