<legend><?=$this->getTrans('certificate') ?></legend>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <colgroup>
            <col class="col-lg-2">
            <col class="col-lg-2">
        </colgroup>
        <thead>
            <tr>
                <th><?=$this->getTrans('property') ?></th>
                <th><?=$this->getTrans('value') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$this->getTrans('certificateValidFrom') ?></td>
                <td>
                    <?php if ($this->get('certificate')['validFrom_time_t'] <= time()): ?>
                        <span class="text-success"><?=gmdate("Y-m-d H:i:s", $this->get('certificate')['validFrom_time_t']) ?></span>
                    <?php else: ?>
                        <span class="text-danger"><?=gmdate("Y-m-d H:i:s", $this->get('certificate')['validFrom_time_t']) ?></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><?=$this->getTrans('certificateValidTo') ?></td>
                <td>
                    <?php if ($this->get('certificate')['validTo_time_t'] >= time()): ?>
                        <span class="text-success"><?=gmdate("Y-m-d H:i:s", $this->get('certificate')['validTo_time_t']) ?></span>
                    <?php else: ?>
                        <span class="text-danger"><?=gmdate("Y-m-d H:i:s", $this->get('certificate')['validTo_time_t']) ?></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><?=$this->getTrans('certificateKeyType') ?></td>
                <td>
                    <?php if ($this->get('certificateKeyType') == 'RSA'): ?>
                        <span class="text-success"><?=$this->get('certificateKeyType') ?></span>
                    <?php else: ?>
                        <span class="text-danger"><?=$this->get('certificateKeyType') ?></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><?=$this->getTrans('certificateKeySize') ?></td>
                <td>
                    <?php if ($this->get('certificateKeyType') == 'RSA' && $this->get('certificateKeySize') >= 2048): ?>
                        <span class="text-success"><?=$this->get('certificateKeySize').$this->getTrans('bit') ?></span>
                    <?php else: ?>
                        <span class="text-danger"><?=$this->get('certificateKeySize').$this->getTrans('bit') ?></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><?=$this->getTrans('certificateDigest') ?></td>
                <td>
                    <?=$this->get('certificateDigest') ?>
                </td>
            </tr>
            <tr>
                <td><?=$this->getTrans('certificateCountry') ?></td>
                <td>
                    <?=$this->get('certificate')['subject']['C'] ?>
                </td>
            </tr>
            <tr>
                <td><?=$this->getTrans('certificateCommonName') ?></td>
                <td>
                    <?=$this->get('certificate')['subject']['CN'] ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
