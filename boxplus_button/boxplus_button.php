<?php

 // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgButtonBoxplus_Button extends JPlugin {

    function plgButtonBoxplus_Button(& $subject, $config)
    {
        parent::__construct($subject, $config);
    }
    function onDisplay($name)
    {
        $js =  "function Boxplus_ButtonClick(editor) {
			txt = prompt('You can change content','CONTENT');
			if (!txt) return;
			jInsertEditorText('{boxplus href=\"\" title=\"\"}'+txt+'{/boxplus}', editor);
		}";
				
        $doc = & JFactory::getDocument();
        $doc->addScriptDeclaration($js);
		
        $button = new JObject;		
	$button->modal = false;
	$button->class = 'btn';
	$button->link = '#';
	$button->text = JText::_('Boxplus');
	$button->name = 'wand';
	$button->onclick = 'Boxplus_ButtonClick(\''.$name.'\'); return false;';
		
        return $button;
    }
}
