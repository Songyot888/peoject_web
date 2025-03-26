<?php require_once 'header.php' ?>
<?php
$events = getAllEvents();
$joined_events = getUserJoinedEvents($_SESSION['User_id']);
$joined_event_ids = array_map(function ($event) {
    return $event['Event_id'];
}, $joined_events);
?>
<style>
    body {
        padding-top: 60px;
        background-color: #f4f4f4;
    }

    .container {
        width: 90%;
        max-width: 1200px;
        text-align: center;
        padding: 50px 0;
    }

    .title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #222;
        margin-bottom: 30px;
        text-transform: uppercase;
    }

    .activity-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
        padding: 20px;
    }
    .activity-container:has(.activity-card:only-child) {
        display: flex;
        justify-content: center;
    }

    .activity-card {
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(15px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        border-radius: 20px;
        padding: 25px;
        text-align: center;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        cursor: pointer;
        overflow: hidden;
        position: relative;
    }

    .activity-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
    }

    .activity-card img {
        width: 100%;
        height: 200px;
        border-radius: 15px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .activity-card img:has(.event-image:only-child) {
        display: flex;
        justify-content: center;
    }

    .activity-card:hover img {
        transform: scale(1.1);
    }

    .content {
        text-align: center;
        padding: 15px 10px;
    }

    .content h3 {
        margin: 15px 0 10px;
        font-size: 1.8rem;
        color: #111;
        font-weight: 600;
    }

    .content p {
        color: #444;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .navbar {
            font-size: 0.9rem;
        }

        .activity-container {
            padding: 10px;
        }

        .activity-card {
            padding: 20px;
        }

        .content h3 {
            font-size: 1.6rem;
        }
    }
</style>

<div class="container">
    <div class="container d-flex justify-content-start">
        <div class="large-activity-card">
            <h3>Main Activity</h3>
        </div>
    </div>

    <div class="activity-container">
    <?php if (!empty($events)): ?>
        <?php foreach ($events as $event): ?>
            <div class="activity-card" onclick="submitForm('<?php echo $event['Event_id']; ?>', 'view');">
                <?php if (!empty($event['image_url'])): ?>
                    <img src="<?php echo $event['image_url']; ?>" alt="Event Image" class="event-image">
                <?php endif; ?>

                <div class="content">
                    <h3>กิจกรรม : <?php echo $event['Eventname']; ?></h3>
                    <h6>วันเริ่ม : <?php echo date("d-m-y", strtotime($event['start_date'])); ?></h6>
                    <h6>วันสิ้นสุด : <?php echo date("d-m-y", strtotime($event['end_date'])); ?></h6>
                    <h6> กิจกรรม : <?php echo $event['status_event']; ?></h6>
                    <span class="like-count"></span>

                    <div class="content">
                        <form id="form-<?php echo $event['Event_id']; ?>" action="/main" method="post">
                            <input type="hidden" name="eid" value="<?php echo $event['Event_id']; ?>">
                            <input type="hidden" id="action-<?php echo $event['Event_id']; ?>" name="action" value="">

                            <?php if (!in_array($event['Event_id'], $joined_event_ids)): ?>
                                <button type="button" onclick="event.stopPropagation(); submitForm('<?php echo $event['Event_id']; ?>', 'sing');" class="btn btn-success">Sign</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>ไม่มีข้อมูลกิจกรรม</p>
    <?php endif; ?>
</div>

</div>

<script>
function submitForm(eventId, action) {
    document.getElementById('action-' + eventId).value = action;
    document.getElementById('form-' + eventId).submit();
}
</script>

<?php require_once 'footer.php' ?>