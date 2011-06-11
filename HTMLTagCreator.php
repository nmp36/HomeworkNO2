<?php
 
include ("ExceptionHandler.php"); 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HTMLTagCreator
 *
 * @author Dishna
 */

class HTMLTagCreator {
private  $ExcepHand;

//Constructor   
public function __construct()  
{
$this->ExcepHand = new ExceptionHandler();
}

    
public function aTag($tag, $attributes, $content)
{
    try
    {

    $this->exception_tester($tag, $attributes, $content);
    //if no exception has been thrown then generate a html tag
    $html = '<' . $tag;
    foreach($attributes as $key=>$value)
    {
        if(isset($value))
        {
        $html .= ' ' . $key . '="' . $value . '"';
        }
    }
    $html .= '>' . $content . "</" . $tag . "><br>\n";
    //return string containing the complete html tag

    echo $html;
    } 
    catch (Exception $e) 
    {
    $this->ExcepHand->logError($e);
    //$this->logError($e);
    //print_r($e);
    }

}

public function exception_tester($tag, $attributes, $content)
{
//test if the content is a string
if (!$this->html5TagValidate($tag))
    {
            throw new Exception("Invalid HTML5 tag.", 111);
            
    }
if(!is_array($attributes))
    {
throw new Exception("Attribute must be an array.", 112);

    }
if(!is_string($content))
    {
throw new Exception("Content must be strings", 113);

    }
}
//this function assumes that a severe error code is between 111 and 120
/*
*This function will check if the given tag is a valid tag in HTML5.
*/
public function html5TagValidate($tag){

$html5ValidTags = array ("!--", "!DOCTYPE", "a", "abbr", "address", "area", "article", "aside", "audio", "b", "base", "bdo",
"blockquote", "body", "br", "button", "canvas", "caption", "cite", "code", "col", "colgroup", "command", "datalist", "dd",
"del", "details", "dfn", "div", "dl", "dt", "em", "embed", "fieldset", "figcaption", "figure", "footer", "form", "h1", "h2",
"h3", "h4", "h5", "h6", "head", "header", "hgroup", "hr", "html", "i", "iframe", "img", "input", "ins", "keygen", "kbd",
"label", "legend", "li", "link", "map", "mark", "menu", "meta", "meter", "nav", "noscript", "object", "ol", "optgroup",
"option", "output", "p", "param", "pre", "progress", "q", "rp", "rt", "ruby", "s", "samp", "script", "section", "select",
"small", "source", "span", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td", "textarea", "tfoot", "th",
"thead", "time", "title", "tr", "ul", "var", "video", "wbr" );

if (!in_array($tag, $html5ValidTags)){
return false;
}else{
return true;
}
}
}
?>
