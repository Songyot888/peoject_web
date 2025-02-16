<section>
    <h1>Courses</h1>
    <form action="courses" method="get">
        <input type="text" name="keyword" />
        <button type="submit">Search</button>
    </form>
    <?php
    if(isset($data['result'])){
    while ($row = $data['result']->fetch_object()) {
    ?>

        <?= $row->course_id ?> 
        <?= $row->course_name ?> 
        <?= $row->course_code ?> 
        <?= $row->instructor ?> 
        <br>
    <?php
    }
}
    ?>
</section>