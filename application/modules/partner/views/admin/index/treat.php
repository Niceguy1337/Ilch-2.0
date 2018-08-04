<h1><?=($this->get('partner') != '' ? $this->getTrans('edit') : $this->getTrans('add')) ?></h1>
<form class="form-horizontal" method="POST">
    <?=$this->getTokenField() ?>
    <div class="form-group <?=$this->validation()->hasError('name') ? 'has-error' : '' ?>">
        <label for="name" class="col-lg-2 control-label">
            <?=$this->getTrans('name') ?>:
        </label>
        <div class="col-lg-4">
            <input type="text"
                   class="form-control"
                   id="name"
                   name="name"
                   placeholder="Name"
                   value="<?=($this->originalInput('name') ? $this->originalInput('name') : $this->escape($this->get('partner')->getName())) ?>" />
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('link') ? 'has-error' : '' ?>">
        <label for="link" class="col-lg-2 control-label">
            <?=$this->getTrans('link') ?>:
        </label>
        <div class="col-lg-4">
            <input type="text"
                   class="form-control"
                   id="link"
                   name="link"
                   placeholder="http://"
                   value="<?=($this->originalInput('link') ? $this->originalInput('link') : $this->escape($this->get('partner')->getLink())) ?>" />
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('banner') ? 'has-error' : '' ?>">
        <label for="selectedImage_1" class="col-lg-2 control-label">
            <?=$this->getTrans('banner') ?>:
        </label>
        <div class="col-lg-4">
            <div class="input-group">
                <input type="text"
                       class="form-control"
                       id="selectedImage_1"
                       name="banner"
                       placeholder="<?=$this->getTrans('httpOrMedia') ?>"
                       value="<?=($this->originalInput('banner') ? $this->originalInput('banner') : $this->escape($this->get('partner')->getBanner())) ?>" />
                <span class="input-group-addon"><a id="media" href="javascript:media_1()"><i class="fa fa-picture-o"></i></a></span>
            </div>
        </div>
    </div>
    <?=($this->get('partner') != '' ? $this->getSaveBar('updateButton') : $this->getSaveBar('addButton')) ?>
</form>

<?=$this->getDialog('mediaModal', $this->getTrans('media'), '<iframe frameborder="0"></iframe>'); ?>
<script>
<?=$this->getMedia()
    ->addMediaButton($this->getUrl('admin/media/iframe/index/type/single/input/_1/'))
    ->addInputId('_1')
    ->addUploadController($this->getUrl('admin/media/index/upload'))
?>
</script>
