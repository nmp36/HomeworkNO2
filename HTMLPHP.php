<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HTMLPHP
 *
 * @author Nirav Patel
 */
class HTMLPHP {
    //put your code here
    var $h1 = "This is H1 Tag";
    var $h2 = 'This is H2 Tag';
    var $h3 = 'This is H3 Tag';
    var $h4 = 'This is H4 Tag';
    var $h5 = 'This is H5 Tag';
    var $h6 = 'This is H6 Tag';
    //Function to Return H1 - H6 Html tags values.
    function get_H1()
    {
    return $this->h1;
    }

    function get_H2()
    {

    return $this->h2;
    }

    function get_H3()
    {
    return $this->h3;

    }

    function get_H4()
    {
    return $this->h4;

    }

    function get_H5()
    {
    return $this->h5;

    }
     function get_H6()
    {

    return $this->h6;
    }
    //Link Tag values Modification
    var $css = "HelloworldModified.css";
    var $js = "HelloworldModified.js";
    function get_cssFile()
    {
    return $this->css;

    }
    function get_jsFile()
    {
    return $this->js;

    }
//    function generateError()
//    {
//        var $a = 10;
//        var $b = 0;
//        try 
//        {
//          //return $a/$b;
//            throw new Exception('File 'le.' not found');
//        }
//        catch(Exception $e)
//        {
//           echo $e->getMessage(); 
//           exit();
//        }
//       
//        
//    }
}
?>
