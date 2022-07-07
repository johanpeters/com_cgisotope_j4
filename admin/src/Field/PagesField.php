<?php
/**
* CG Isotope Component  - Joomla 4.0.0 Component 
* Version			: 2.3.1
* Package			: CG ISotope
* copyright 		: Copyright (C) 2022 ConseilGouz. All rights reserved.
* license    		: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
* From              : isotope.metafizzy.co
*/
namespace ConseilGouz\Component\CGIsotope\Administrator\Field;
\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\Field\ListField;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
/* cette classe est utile pour le choix menu : affichage des pages */
class PagesField extends ListField
{
    public $type = 'Pages';

    public function getOptions()
    {
        $db = Factory::getDbo();
        $query = $db->getQuery(true)
            ->select('s.id AS value')
            ->select('s.title AS text')
            ->from('#__cgisotope_page AS s')
            ->where('s.state = 1');
        $db->setQuery($query);

        $options = $db->loadObjectList();

        array_unshift($options, HTMLHelper::_('select.option', '', Text::_('JSELECT')));

        return array_merge(parent::getOptions(), $options);
    }

}