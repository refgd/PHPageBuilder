<div id="phpb-loading">
    <div class="circle">
        <div class="loader">
            <div class="loader">
                <div class="loader">
                    <div class="loader"></div>
                </div>
            </div>
        </div>
        <div class="text">
            <?= phpb_trans('pagebuilder.loading-text') ?>
        </div>
    </div>
</div>

<div id="gjs"></div>

<script type="text/javascript" src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
<script type="text/javascript" src="<?= phpb_asset('pagebuilder/grapesjs-plugin-ckeditor-v0.0.9.min.js') ?>"></script>
<script type="text/javascript" src="<?= phpb_asset('pagebuilder/grapesjs-touch-v0.1.1.min.js') ?>"></script>
<script type="text/javascript">
CKEDITOR.dtd.$editable.a = 1;
CKEDITOR.dtd.$editable.b = 1;
CKEDITOR.dtd.$editable.em = 1;
CKEDITOR.dtd.$editable.button = 1;
CKEDITOR.dtd.$editable.strong = 1;
CKEDITOR.dtd.$editable.small = 1;
CKEDITOR.dtd.$editable.span = 1;
CKEDITOR.dtd.$editable.ol = 1;
CKEDITOR.dtd.$editable.ul = 1;
CKEDITOR.dtd.$editable.table = 1;

<?php
$currentLanguage = in_array(phpb_config('general.language'), phpb_active_languages()) ? phpb_config('general.language') : array_keys(phpb_active_languages())[0];
?>
window.languages = <?= json_encode(phpb_active_languages()) ?>;
window.currentLanguage = <?= json_encode($currentLanguage) ?>;
window.translations = <?= json_encode(phpb_trans('pagebuilder')) ?>;
window.contentContainerComponents = <?= json_encode($pageBuilder->getPageComponents($page)) ?>;
window.themeBlocks = <?= json_encode($blocks) ?>;
window.blockSettings = <?= json_encode($blockSettings) ?>;
window.pageBlocks = <?= json_encode($pageRenderer->getPageBlocksData()) ?>;
window.pages = <?= json_encode($pageBuilder->getPages()) ?>;
window.renderBlockUrl = '<?= phpb_url('pagebuilder', ['action' => 'renderBlock', 'page' => $page->getId()]) ?>';
window.injectionScriptUrl = '<?= phpb_asset('pagebuilder/page-injection.js') ?>';
window.renderLanguageVariantUrl = '<?= phpb_url('pagebuilder', ['action' => 'renderLanguageVariant', 'page' => $page->getId()]) ?>';

<?php
$config = require __DIR__ . '/grapesjs/config.php';
?>
let config = <?= json_encode($config) ?>;
if (window.customConfig !== undefined) {
    config = $.extend(true, {}, window.customConfig, config);
}

window.initialComponents = <?= json_encode($pageRenderer->render()) ?>;
window.initialStyle = <?= json_encode($pageBuilder->getPageStyleComponents($page)) ?>;
window.grapesJSTranslations = {
    <?= $currentLanguage ?>: {
        styleManager: {
            empty: '<?= phpb_trans('pagebuilder.style-no-element-selected') ?>'
        },
        traitManager: {
            empty: '<?= phpb_trans('pagebuilder.trait-no-element-selected') ?>',
            label: '<?= phpb_trans('pagebuilder.trait-settings') ?>',
            traits: {
                options: {
                    target: {
                        false: '<?= phpb_trans('pagebuilder.no') ?>',
                        _blank: '<?= phpb_trans('pagebuilder.yes') ?>'
                    }
                }
            }
        },
        assetManager: {
            addButton: '<?= phpb_trans('pagebuilder.asset-manager.add-image') ?>',
            inputPlh: 'http://path/to/the/image.jpg',
            modalTitle: '<?= phpb_trans('pagebuilder.asset-manager.modal-title') ?>',
            uploadTitle: '<?= phpb_trans('pagebuilder.asset-manager.drop-files') ?>'
        }
    }
};
config.layerManager.onRender = function ({ component, el }){
    if(component.attributes.selectable){
        $(el).removeClass('gjs-hidden');
    }

    if ('phpb-blocks-container' in component.attributes.attributes || 'phpb-content-container' in component.attributes.attributes) {
        $(el).removeClass('gjs-hidden').addClass('hasChild');
    }else{
        $(el).removeClass('hasChild');
    }
};

window.grapesJSLoaded = false;
window.editor = window.grapesjs.init(config);
window.editor.on('load', function(editor) {
    var pn = editor.Panels;

    // Load and show settings and style manager
    var openTmBtn = pn.getButton('views', 'open-settings-button');
        openTmBtn && openTmBtn.set('active', 1);
    var openSm = pn.getButton('views', 'open-style-button');
        openSm && openSm.set('active', 1);

    // Remove trait view
    pn.removeButton('views', 'open-settings-button');
    $(".gjs-trt-traits").parent().parent().css('display', 'none');

    // Add Settings Sector
    var traitsSector = $('<div class="gjs-sm-sector no-select gjs-sm-open">'+
          '<div class="gjs-sm-sector-title" data-sector-title=""><div class="gjs-sm-sector-caret"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M7,10L12,15L17,10H7Z"></path></svg></div><div class="gjs-sm-sector-label">Settings</div></div>' +
          '<div class="gjs-sm-properties"></div></div>');
    var traitsProps = traitsSector.find('.gjs-sm-properties');
    traitsProps.append($('.gjs-trt-traits').css('width', '100%'));
    traitsSector.insertBefore($('.gjs-sm-sectors'));
    // $('.gjs-sm-sectors').before(traitsSector);
    traitsSector.find('.gjs-sm-sector-title').on('click', function(){
        var traitStyle = traitsProps.get(0).style;
        var hidden = traitStyle.display == 'none';
        if (hidden) {
            traitStyle.display = 'block';
            $(this).parent().addClass('gjs-sm-open');
        } else {
            traitStyle.display = 'none';
            $(this).parent().removeClass('gjs-sm-open');
        }
    });

    

    window.grapesJSLoaded = true;
});
window.editor.I18n.addMessages(window.grapesJSTranslations);

window.editor.on('selector:add', selector => {
		const name = selector.get('name');

        if (name.substr(0,2) === 'ID') {
			selector.set({
				'protected': true,
			})
      	}
});

window.editor.on('run:open-sm', function(editor) {
    $(".gjs-layer").parent().css('display', 'none');
    $(".gjs-sm-sectors").parent().parent().css('display', 'block');
    // move element classes editor to advanced section
    // $(".gjs-sm-sector__advanced .gjs-sm-properties").append($(".gjs-clm-tags"));
});
window.editor.on('run:open-layers', function(editor) {
    const layers = window.editor.Layers;
    layers.setRoot(window.editor.getWrapper().find(".rootLayer")[0]);

    $(".gjs-sm-sectors").parent().parent().css('display', 'none');
    $(".gjs-layer").parent().css('display', 'block');

    // $(".gjs-trt-traits").parent().parent().css('display', 'block');
});

// load the default or earlier saved page css components
editor.setStyle(window.initialStyle);
</script>

<?php
require __DIR__ . '/grapesjs/asset-manager.php';
require __DIR__ . '/grapesjs/component-type-manager.php';
require __DIR__ . '/grapesjs/style-manager.php';
require __DIR__ . '/grapesjs/trait-manager.php';
?>

<button id="toggle-sidebar" class="btn">
    <i class="fa fa-bars"></i>
</button>
<div id="sidebar-header">
    <?php
    if (sizeof(phpb_active_languages()) > 1):
    ?>
    <div id="language-selector">
        <select class="selectpicker" data-width="fit">
            <?php
            foreach (phpb_active_languages() as $languageCode => $languageTranslation):
            ?>
            <option value="<?= phpb_e($languageCode) ?>" <?= phpb_config('general.language') === $languageCode ? 'selected' : '' ?>><?= phpb_e($languageTranslation) ?></option>
            <?php
            endforeach;
            ?>
        </select>
    </div>
    <?php
    endif;
    ?>
</div>

<div id="sidebar-bottom-buttons">
    <button id="save-page" class="btn" data-url="<?= phpb_url('pagebuilder', ['action' => 'store', 'page' => $page->getId()]) ?>">
        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
        <i class="fa fa-save"></i>
        <?= phpb_trans('pagebuilder.save-page') ?>
    </button>

    <a id="view-page" href="<?= phpb_e(phpb_full_url($page->getRoute())) ?>" target="_blank" class="btn">
        <i class="fa fa-external-link"></i>
        <?= phpb_trans('pagebuilder.view-page') ?>
    </a>

    <a id="go-back" href="<?= phpb_e(phpb_full_url(phpb_config('pagebuilder.actions.back'))) ?>" class="btn">
        <i class="fa fa-arrow-circle-left"></i>
        <?= phpb_trans('pagebuilder.go-back') ?>
    </a>
</div>

<div id="block-search">
    <i class="fa fa-search"></i>
    <input type="text" class="form-control" placeholder="<?= phpb_trans('pagebuilder.filter-placeholder') ?>">
</div>
