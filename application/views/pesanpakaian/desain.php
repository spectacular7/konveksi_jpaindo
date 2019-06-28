<?php
foreach ($desain as $ds) { ?>
    <a href="<?= base_url('pesanpakaian/detailbarang'); ?>/<?= $ds['KodeJenis']; ?>/<?= $ds['KdPola']; ?>/<?= $ds['KdDesain']; ?>">
        <img src="<?= base_url('assets/img/desain'); ?>/<?= $ds['GbrDesain']; ?>" width="200">
        |<?= $ds['KdDesain']; ?>|<?= $ds['GbrDesain']; ?>|
    </a>
<?php } ?>