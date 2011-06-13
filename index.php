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
        <?php
        /*I tried below function but does not work in case of Custom extends classes for exception.
        function __autoload($className)
        {
        require_once "$className.php";
        }*/
        //This is manually Added for timebeing.
        include 'HTMLTagCreator.php';
        include 'ExceptionHandler.php';
        include 'ErrorLogging.php';
        include 'FileHandler.php';

        $fr = new FileHandler();
        $htmlTag = new HTMLTagCreator();
                     
        ?>
        
        <div align="left">
        <h1>File Operation Test</h1>
        <table width="400" border="0">
        <tr align="center">
        <td><strong>Enter File Name :</strong></td>
        <td align="left"><input  id="fileID" type="text" name="FileName" /></td>  
        </tr>
        <tr align="center">
        <td><strong>Enter Directory:</strong></td>
        <td align="left"><input  id="DirID" type="text" name="DirName" /></td>  
        </tr>
        <tr align="center">
        <td><strong>Enter Name of Directory To create:</strong></td>
        <td align="left"><input  id="NewDir" type="text" name="NewDirName" /></td>  
        </tr>
        <tr align="center">
        <td><strong>Enter File name to Delete:</strong></td>
        <td align="left"><input  id="DelFile" type="text" name="DelFile" /></td>  
        </tr>
        <tr align="center">
            <td colspan="2"><input type="Submit" name="Check" title="Check" value="Submit"/></td>
        </tr>
        </table>
        </div>
        <!--Tag creation Test -- HTML */-->
        <div align="left">
        <h1>Tag Creation Test </h1>
        <table width="400" border="0">
        <tr align="center">
        <td><strong>Enter Tag Name:</strong></td>
        <td align="left"><input  id="TagID" type="text" name="TagName" /></td>  
        </tr>
        <tr align="center">
        <td><strong>Enter Attribute Name:</strong></td>
        <td align="left"><input  id="Attrid" type="text" name="AttrName" /></td>  
        </tr>
        <td><strong>Enter Attribute Value:</strong></td>
        <td align="left"><input  id="AttrvalId" type="text" name="Attrval" /></td>  
        </tr>
        <tr align="center">
        <td><strong>Enter Content:</strong></td>
        <td align="left"><input  id="TagCont" type="text" name="TagContent" /></td>  
        </tr>
        <tr align="center">
            <td colspan="2"><input type="Submit" name="Check" title="Check" value="CreateTag"/></td>
        </tr>
        </table>
        </div>
                 
    </body>
    </form>
</html>
