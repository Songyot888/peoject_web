<section>
    <h1>Students</h1>
    <?php
    while ($row = $data['result']->fetch_object()) {
    ?>
        <?= $row->student_id ?> 
        <?= $row->first_name ?> 
        <?= $row->last_name ?> 
        <?= $row->phone_number ?> 
        <?= $row->email ?>
        <br>
    <?php
    }
    ?>
</section>