<section>
    <?php
    if (isset($data['result'])) {
        while ($row = $data['result']->fetch_object()) {
    ?>
            <?= $row->Eventname?>
            <br>
    <?php
        }
    }
    ?>
</section>