<?php
/**
 * This class is used for creating HTML tags.
 * * @author Nirav Patel
 */

class HTMLTagCreator {
    private $tag;
    private $attributes;
    private $content;
    private $Attrval;
    
public function __construct()  
{

    if (empty($_GET["TagName"]) || empty($_GET["AttrName"]) || empty($_GET["TagContent"]) || empty($_GET["Attrval"]))
    {
    Echo 'Please Enter Tag Name/Attributes/Content<br>'  ;
    }
    else
    {
    $this->tag=$_GET["TagName"];
    $this->attributes=$_GET["AttrName"];
    $this->content=$_GET["TagContent"];
    $this->Attrval=$_GET["Attrval"];
    $this->aTag($this->tag, $this->attributes, $this->content,$this->Attrval);   
    }
}
   /*validate and generate HTML Tag(s)*/
public function aTag($tag, $attributes, $content,$Attrval)
{
    try
    {
    /*Validate all input values */
    $this->ValidateUserInput($tag, $attributes, $content);
    /*Special Tag Img*/
    if ($tag =='img')
    {
    /*check for image file exists */
    $file=new FileOperation();
    try
    {
    $file->isFileExists($Attrval);
    }
    catch(FileNotFoundException $e)
    {
    $attributes='alt';
    $Attrval="No image";
    }
    }
    $html = '<' . $tag;
    $html .= ' ' . $attributes . '="' . $Attrval . '"';
    $html .= '>' . $content . "</" . $tag . "><br>\n";
    /*Display Created Tag*/
    echo "\nTag Created :". $html .'<br>';
    } 
    catch (InvalidAttributeException $e) 
    {
    echo 'Invalid Attribute.';
    }
    catch (InvalidContentException $e) 
    {
    echo 'Invalid Content.';
    }
    catch (InvalidTagNameException $e) 
    {
    echo 'Invalid Tag Name.';
    }
}

public function ValidateUserInput($tag, $attributes, $content)
{
    if (!$this->html5TagValidate($tag))
    {
    throw new InvalidTagNameException("Invalid HTML5 tag.");

    }
    if(!is_string($content))
    {
    throw new InvalidTagNameException("Content must be strings.");
    }
}
/*This function will check if the given tag is a valid tag in HTML5*/
public function html5TagValidate($tag)
{

    $html5ValidTags = array ("!--", "!DOCTYPE", "a", "abbr", "address", "area", "article", "aside", "audio", "b", "base", "bdo",
    "blockquote", "body", "br", "button", "canvas", "caption", "cite", "code", "col", "colgroup", "command", "datalist", "dd",
    "del", "details", "dfn", "div", "dl", "dt", "em", "embed", "fieldset", "figcaption", "figure", "footer", "form", "h1", "h2",
    "h3", "h4", "h5", "h6", "head", "header", "hgroup", "hr", "html", "i", "iframe", "img", "input", "ins", "keygen", "kbd",
    "label", "legend", "li", "link", "map", "mark", "menu", "meta", "meter", "nav", "noscript", "object", "ol", "optgroup",
    "option", "output", "p", "param", "pre", "progress", "q", "rp", "rt", "ruby", "s", "samp", "script", "section", "select",
    "small", "source", "span", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td", "textarea", "tfoot", "th",
    "thead", "time", "title", "tr", "ul", "var", "video", "wbr" );

    if (!in_array($tag, $html5ValidTags))
    {
    return false;
    }else
    {
    return true;
    }
}

}
?>

