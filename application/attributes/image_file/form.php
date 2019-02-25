<?php defined('C5_EXECUTE') or die("Access Denied.");

if ($mode == \Concrete\Core\Entity\Attribute\Key\Settings\ImageFileSettings::TYPE_FILE_MANAGER) {

    $al = Core::make('helper/concrete/asset_library');
    print $al->file('ccm-file-akID-' . $controller->getAttributeKey()->getAttributeKeyID(), $this->field('value'), t('Choose File'), $file);

} else { ?>

    <?php
    if (is_object($file)) {
        $fileID = $file->getFileID();
    } else {
        $fileID = '';
    }
    ?>
    <input type="file" name="<?=$view->field('value')?>" id="<?=$view->field('value')?>">
    <input type="hidden" name="<?=$view->field('value')?>[id]" id="<?=$view->field('value')?>[id]" value="<?php echo h($fileID);?>">
    <input type="checkbox" name="<?=$view->field('value')?>[clear]" id="<?=$view->field('value')?>[clear]"><?php echo h(t('Clear'));?>
<?php } ?>
