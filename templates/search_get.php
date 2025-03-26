<?php require_once 'header.php'; ?>
<?php
$search = isset($data['search']) ? $data['search'] : '';
$events = isset($data['events']) && is_array($data['events']) ? $data['events'] : getAllEvents();
$joined_events = getUserJoinedEvents($_SESSION['User_id']);
$joined_event_ids = array_map(fn($event) => $event['Event_id'], $joined_events);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fa;
        padding-top: 60px;
    }

    .container {
        width: 90%;
        max-width: 1200px;
        margin-top: 50px;
    }

    .title {
        font-size: 2rem;
        font-weight: bold;
        color: #222;
        margin-bottom: 20px;
        text-transform: uppercase;
        text-align: center;
    }

    .activity-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    .activity-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease-in-out;
        cursor: pointer;
    }

    .activity-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .activity-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }

    .content h3 {
        font-size: 1.5rem;
        font-weight: bold;
        margin: 15px 0;
    }

    .btn-container {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 15px;
    }
</style>

<div class="container">
    <h2 class="title">Event List</h2>
    
    <div class="activity-container">
        <?php if (!empty($events)): ?>
            <?php foreach ($events as $event): ?>
                <div class="activity-card">
                    <?php if (!empty($event['image_url'])): ?>
                        <img src="<?php echo htmlspecialchars($event['image_url']); ?>" alt="Event Image">
                    <?php endif; ?>

                    <div class="content">
                        <h3><?php echo htmlspecialchars($event['Eventname']); ?></h3>
                        <p><?php echo htmlspecialchars($event['description']); ?></p>
                        <p><strong>Start:</strong> <?php echo htmlspecialchars($event['start_date']); ?></p>
                        <p><strong>End:</strong> <?php echo htmlspecialchars($event['end_date']); ?></p>
                    </div>

                    <div class="btn-container">
                        <form action="/main" method="post">
                            <input type="hidden" name="eid" value="<?php echo $event['Event_id']; ?>">
                            <button type="submit" name="view" class="btn btn-primary" >View</button>
                            <?php if (!in_array($event['Event_id'], $joined_event_ids)): ?>
                                <button type="submit" name="sign" class="btn btn-success" >Sign</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-danger">No events found.</p>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>