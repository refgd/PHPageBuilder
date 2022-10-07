<?php

return [
    'container' => '#gjs',
    'noticeOnUnload' => false,
    'avoidInlineStyle' => true,
    'allowScripts' => true,
    'storageManager' => [
        'type' => 'local',
        'autoload' => false,
        'autosave' => false
    ],
    'canvasCss' => 'body {height: auto;}',  // prevent scrollbar jump on pasting in CKEditor
    'assetManager' => [
        'upload' => phpb_url('pagebuilder', ['action' => 'upload', 'page' => $page->getId()]),
        'uploadName' => 'files',
        'multiUpload' => false,
        'assets' => $assets
    ],
    'layerManager' => [
        'root' => '.rootLayer',
        'sortable' => true,
        'hidable' => true,
    ],
    'styleManager' => [
        'sectors' => [[
            'id' => 'position',
            'name' => phpb_trans('pagebuilder.style-manager.sectors.position'),
            'open' => true,
            'buildProps' => ['width', 'height', 'min-width', 'min-height', 'max-width', 'max-height', 'padding', 'margin', 'text-align'],
            'properties' => [[
                'property' => 'text-align',
                'list' => [
                    ['value' => 'left', 'className' => 'fa fa-align-left'],
                    ['value' => 'center', 'className' => 'fa fa-align-center'],
                    ['value' => 'right', 'className' => 'fa fa-align-right'],
                    ['value' => 'justify', 'className' => 'fa fa-align-justify'],
                ],
            ]]
        ], [
            'id' => 'background',
            'name' => phpb_trans('pagebuilder.style-manager.sectors.background'),
            'open' => false,
            'buildProps' => ['background-color', 'background']
        ], [
            'name' => 'Flex',
            'open' => false,
            'properties' => [
                [
                    'name' => 'Flex Container',
                    'property' => 'display',
                    'type' => 'select',
                    'defaults' => 'block',
                    'list' => [
                        [
                            'value' => 'block',
                            'name' => 'Disable',
                        ],
                        [
                            'value' => 'flex',
                            'name' => 'Enable',
                        ],
                    ],
                ],
                [
                    'name' => 'Flex Wrap',
                    'property' => 'flex-wrap',
                    'type' => 'select',
                    'defaults' => 'nowrap',
                    'list' => [
                        [
                            'value' => 'nowrap',
                            'name' => 'No Wrap',
                        ],
                        [
                            'value' => 'wrap',
                            'name' => 'Wrap',
                        ],
                        [
                            'value' => 'wrap-reverse',
                            'name' => 'Wrap Reverse',
                        ],
                    ],
                ],
                [
                    'name' => 'Direction',
                    'property' => 'flex-direction',
                    'type' => 'radio',
                    'defaults' => 'row',
                    'list' => [
                        [
                            'value' => 'row',
                            'name' => 'Row',
                            'className' => 'icons-flex icon-dir-row',
                            'title' => 'Row',
                        ],
                        [
                            'value' => 'row-reverse',
                            'name' => 'Row reverse',
                            'className' => 'icons-flex icon-dir-row-rev',
                            'title' => 'Row reverse',
                        ],
                        [
                            'value' => 'column',
                            'name' => 'Column',
                            'title' => 'Column',
                            'className' => 'icons-flex icon-dir-col',
                        ],
                        [
                            'value' => 'column-reverse',
                            'name' => 'Column reverse',
                            'title' => 'Column reverse',
                            'className' => 'icons-flex icon-dir-col-rev',
                        ],
                    ],
                ],
                [
                    'name' => 'Justify',
                    'property' => 'justify-content',
                    'type' => 'radio',
                    'defaults' => 'flex-start',
                    'list' => [
                        [
                            'value' => 'flex-start',
                            'className' => 'icons-flex icon-just-start',
                            'title' => 'Start',
                        ],
                        [
                            'value' => 'flex-end',
                            'title' => 'End',
                            'className' => 'icons-flex icon-just-end',
                        ],
                        [
                            'value' => 'space-between',
                            'title' => 'Space between',
                            'className' => 'icons-flex icon-just-sp-bet',
                        ],
                        [
                            'value' => 'space-around',
                            'title' => 'Space around',
                            'className' => 'icons-flex icon-just-sp-ar',
                        ],
                        [
                            'value' => 'center',
                            'title' => 'Center',
                            'className' => 'icons-flex icon-just-sp-cent',
                        ],
                    ],
                ],
                [
                    'name' => 'Align',
                    'property' => 'align-items',
                    'type' => 'radio',
                    'defaults' => 'center',
                    'list' => [
                        [
                            'value' => 'flex-start',
                            'title' => 'Start',
                            'className' => 'icons-flex icon-al-start',
                        ],
                        [
                            'value' => 'flex-end',
                            'title' => 'End',
                            'className' => 'icons-flex icon-al-end',
                        ],
                        [
                            'value' => 'stretch',
                            'title' => 'Stretch',
                            'className' => 'icons-flex icon-al-str',
                        ],
                        [
                            'value' => 'center',
                            'title' => 'Center',
                            'className' => 'icons-flex icon-al-center',
                        ],
                    ],
                ],
                [
                    'name' => 'Flex',
                    'property' => 'flex',
                    'type' => 'composite',
                    'properties' => [
                        [
                            'name' => 'Grow',
                            'property' => 'flex-grow',
                            'type' => 'integer',
                            'defaults' => 0,
                            'min' => 0,
                        ],
                        [
                            'name' => 'Shrink',
                            'property' => 'flex-shrink',
                            'type' => 'integer',
                            'defaults' => 0,
                            'min' => 0,
                        ],
                        [
                            'name' => 'Basis',
                            'property' => 'flex-basis',
                            'type' => 'integer',
                            'units' => [
                            'px',
                            '%',
                            '',
                            ],
                            'unit' => '',
                            'defaults' => 'auto',
                        ],
                    ],
                ],
                [
                    'name' => 'Align',
                    'property' => 'align-self',
                    'type' => 'radio',
                    'defaults' => 'auto',
                    'list' => [
                        [
                            'value' => 'auto',
                            'name' => 'Auto',
                        ],
                        [
                            'value' => 'flex-start',
                            'title' => 'Start',
                            'className' => 'icons-flex icon-al-start',
                        ],
                        [
                            'value' => 'flex-end',
                            'title' => 'End',
                            'className' => 'icons-flex icon-al-end',
                        ],
                        [
                            'value' => 'stretch',
                            'title' => 'Stretch',
                            'className' => 'icons-flex icon-al-str',
                        ],
                        [
                            'value' => 'center',
                            'title' => 'Center',
                            'className' => 'icons-flex icon-al-center',
                        ],
                    ],
                ],
            ],
        ]]
    ],
    'selectorManager' => [
        'label' => phpb_trans('pagebuilder.selector-manager.label'),
        'statesLabel' => phpb_trans('pagebuilder.selector-manager.states-label'),
        'selectedLabel' => phpb_trans('pagebuilder.selector-manager.selected-label'),
        'states' => [
            ['name' => 'hover', 'label' => phpb_trans('pagebuilder.selector-manager.state-hover')],
            ['name' => 'active', 'label' => phpb_trans('pagebuilder.selector-manager.state-active')],
            ['name' => 'nth-of-type(2n)', 'label' => phpb_trans('pagebuilder.selector-manager.state-nth')]
        ],
    ],
    'traitManager' => [
        'labelPlhText' => '',
        'labelPlhHref' => 'https://website.com'
    ],
    'panels' => [
        'defaults' => [
            [
                'id' => 'views',
                'buttons' => [
                    [
                        'id' => 'open-blocks-button',
                        'className' => 'fa fa-th-large',
                        'command' => 'open-blocks',
                        'togglable' => 0,
                        'attributes' => ['title' => phpb_trans('pagebuilder.view-blocks')],
                        'active' => true,
                    ],
                    [
                        'id' => 'open-settings-button',
                        'className' => 'fa fa-cog',
                        'command' => 'open-tm',
                        'togglable' => 0,
                        'attributes' => ['title' => phpb_trans('pagebuilder.view-settings')],
                    ],
                    [
                        'id' => 'open-layers-button',
                        'className' => 'fa fa-list',
                        'command' => 'open-layers',
                        'togglable' => 0,
                        'attributes' => ['title' => phpb_trans('pagebuilder.view-layers')],
                    ],
                    [
                        'id' => 'open-style-button',
                        'className' => 'fa fa-paint-brush',
                        'command' => 'open-sm',
                        'togglable' => 0,
                        'attributes' => ['title' => phpb_trans('pagebuilder.view-style-manager')],
                    ]
                ]
            ],
        ]
    ],
    'canvas' => [
        'styles' => [
            phpb_asset('pagebuilder/page-injection.css'),
        ],
    ],
    'plugins' => ['grapesjs-touch', 'gjs-plugin-ckeditor'],
    'pluginsOpts' => [
        'gjs-plugin-ckeditor' => [
            'position' => 'left',
            'options' => [
                'startupFocus' => true,
                'allowedContent' => true,
                //'extraAllowedContent' => '*(*);*[*];ul ol li span', // allows classes, inline styles and certain elements
                'enterMode' => 'CKEDITOR.ENTER_BR',
                'extraPlugins' => 'sharedspace,justify,colorbutton,font',
                'toolbar' => [
                    ['Bold', 'Italic', 'Underline', 'Strike', 'Undo', 'Redo'],
                    [
                        'name' => 'links',
                        'items' => ['Link', 'Unlink']
                    ],
                    [
                        'name' => 'styles',
                        'items' => ['FontSize']
                    ],
                    [
                        'name' => 'paragraph',
                        'groups' => ['list', 'indent', 'blocks', 'align'],
                        'items' => ['NumberedList', 'BulletedList', 'Blockquote', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-']
                    ],
                    [
                        'name' => 'colors',
                        'items' => ['TextColor', 'BGColor']
                    ],
                ],
            ]
        ]
    ]
];
