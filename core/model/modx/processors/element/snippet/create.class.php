<?php
require_once (dirname(dirname(__FILE__)).'/create.class.php');
/**
 * Create a snippet.
 *
 * @param string $name The name of the element
 * @param string $snippet The code of the snippet.
 * @param string $description (optional) A brief description.
 * @param integer $category (optional) The category to assign to. Defaults to no
 * category.
 * @param boolean $locked (optional) If true, can only be accessed by
 * administrators. Defaults to false.
 * @param json $propdata (optional) A json array of properties
 *
 * @package modx
 * @subpackage processors.element.snippet
 */
class modSnippetCreateProcessor extends modElementCreateProcessor {
    public $classKey = 'modSnippet';
    public $languageTopics = array('snippet','category','element');
    public $permission = 'new_snippet';
    public $elementType = 'snippet';
    public $objectType = 'snippet';
    public $beforeSaveEvent = 'OnBeforeSnipFormSave';
    public $afterSaveEvent = 'OnSnipFormSave';
}
return 'modSnippetCreateProcessor';
