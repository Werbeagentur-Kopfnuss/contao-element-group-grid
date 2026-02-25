<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'grid_columns';

// add new content element
$GLOBALS['TL_DCA']['tl_content']['palettes']['element_group_grid'] = '{type_legend},type,headline;{config_legend},nestedFragments;{template_legend:hide},customTpl;{expert_legend:hide},cssID,space';

// define the new field
$GLOBALS['TL_DCA']['tl_content']['fields']['grid_columns'] = [
    'inputType' => 'select',
    'options' => [
        'columns-2',
        'columns-3',
        'columns-4',
    ],
    'default' => 'columns-3',
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['gridOptionsColumns'],
    'eval' => ['submitOnChange' => true, 'mandatory' => true, 'includeBlankOption' => false, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => ['type' => 'string', 'length' => 32, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_align_center'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50', ],
    'sql' => ['type' => 'boolean', 'default' => false],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_center'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50', ],
    'sql' => ['type' => 'boolean', 'default' => false],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_align_stretch'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50', ],
    'sql' => ['type' => 'boolean', 'default' => false],
];

// add new field
PaletteManipulator::create()
    // add a new "custom_legend" before the "type_legend"
    ->addLegend('custom_grid_legend', 'type_legend', PaletteManipulator::POSITION_AFTER)

    // directly add new fields to "custom_legend"
    ->addField('grid_columns', 'custom_grid_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('grid_align_center', 'custom_grid_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('grid_align_stretch', 'custom_grid_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('grid_center', 'custom_grid_legend', PaletteManipulator::POSITION_APPEND)

    // then apply it to the palette "table" in "tl_content" as usual
    ->applyToPalette('element_group_grid', 'tl_content')
;

// Define the subpalette
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['grid_columns_columns-2'] = 'grid_columns_layout,grid_columns_background_color_left,grid_columns_background_color_right';

// field: column distribution for 2 columns
$GLOBALS['TL_DCA']['tl_content']['fields']['grid_columns_layout'] = [
    'inputType' => 'select',
    'options'   => [
        'two-columns-equal',      // 1 : 1
        'two-columns-left-wide',  // 3 : 2
        'two-columns-right-wide', // 2 : 3
    ],
    'default'   => 'two-columns-equal',
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['gridColumnsLayout'],
    'eval'      => [
        'mandatory'          => true,
        'includeBlankOption' => false,
        'chosen'             => true,
        'tl_class'           => 'w50',
    ],
    'sql' => ['type' => 'string', 'length' => 32, 'default' => ''],
];

// field: column distribution for 2 columns
$GLOBALS['TL_DCA']['tl_content']['fields']['grid_columns_background_color-left'] = [
    'inputType' => 'select',
    'options'   => [
        'two-columns-background-none',
        'two-columns-background-black',
        'two-columns-background-grey',
        'two-columns-background-color',
    ],
    'default'   => 'two-columns-background-none',
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['gridColumnsBackgroundColorLeft'],
    'eval'      => [
        'mandatory'          => true,
        'includeBlankOption' => false,
        'chosen'             => true,
        'tl_class'           => 'w50',
    ],
    'sql' => ['type' => 'string', 'length' => 32, 'default' => ''],
];

// field: column distribution for 2 columns
$GLOBALS['TL_DCA']['tl_content']['fields']['grid_columns_background_color-right'] = [
    'inputType' => 'select',
    'options'   => [
        'two-columns-background-none',
        'two-columns-background-black',
        'two-columns-background-grey',
        'two-columns-background-color',
    ],
    'default'   => 'two-columns-background-none',
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['gridColumnsBackgroundColorRight'],
    'eval'      => [
        'mandatory'          => true,
        'includeBlankOption' => false,
        'chosen'             => true,
        'tl_class'           => 'w50',
    ],
    'sql' => ['type' => 'string', 'length' => 32, 'default' => ''],
];