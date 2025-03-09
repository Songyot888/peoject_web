<?php
$eventImages = getEventImage($data['event_id']['Event_id']);
$count = countParticipants($data['event_id']['Event_id']);
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #87CEFA, #4682B4);
        color: white;
        text-align: center;
        padding: 50px;
    }

    .activity-container {
        background: rgba(0, 0, 0, 0.8);
        padding: 40px;
        border-radius: 15px;
        width: 80%;
        max-width: 800px;
        margin: auto;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
    }

    img {
        width: 300px;
        height: 300px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid white;
    }

    .back-button {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 25px;
        font-size: 1.1rem;
        background-color: #6c757d;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .back-button:hover {
        background-color: #5a6268;
    }

    
</style>


<section>
    <div class="regis-at-container">
        

        <div class="activity-container">
            <h1><?php echo $data['event_id']['Eventname']; ?></h1>
            <div class="activity-image">
                <?php
                if (!empty($eventImages['images'])) {
                    foreach ($eventImages['images'] as $image) {
                        echo '<img src="' . $image . '" alt="Activity Image">';
                    }
                } else {
                    echo '<p>No images available for this event.</p>';
                }
                ?>
            </div>
            <div class="activity-details">
                <p class="activity-description">
                    <?php echo htmlspecialchars($data['event_id']['description']); ?>
                </p>
                <p class="activity-description">
                    วันเริ่มกิจกรรม : <?php echo date("d-m-y", strtotime($data['event_id']['start_date'])); ?>
                </p>
                <p class="activity-description">
                    สิ้นสุดกิจกรรม : <?php echo date("d-m-y", strtotime($data['event_id']['end_date'])); ?>
                </p>
                <div class="status-container">
                    <p class="status-text">จำนวนผู้เข้าร่วม: <?php echo $count; ?> / <?php echo $data['event_id']['Max_participants']; ?></p>
                    <div class="status-dot green"></div>
                </div>
                <button type="button" class="back-button" onclick="window.location.href='/main'">กลับไปหน้าแรก</button>
            </div>
        </div>
    </div>
</section>