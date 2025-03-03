<?php require_once 'header.php' ?>
<?php
$events = getAllEvents();
?>
<style>
    body {
        min-height: 100vh;
    }

    .container {
        width: 100%;
        padding-bottom: 50px;
    }

    .activity-container {
        margin-top: 20px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        justify-content: center;
    }

    .activity-card {
        width: 300px;
        height: 400px;
        background-color: #ccc;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        border-radius: 10px;
        text-align: center;
        padding: 20px;
        transition: 0.3s;
        cursor: pointer;
    }

    .activity-card:hover {
        background-color: #bbb;
    }

    .activity-card img {
        width: 100%;
        height: 180px;
        border-radius: 10px;
        object-fit: cover;
        margin-top: 10px;
    }

    .activity-card .content {
        margin-top: 10px;
        text-align: center;
        width: 100%;
        position: relative;
    }

    .activity-card .content button {
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        display: block;
        width: 100%;
        margin-top: 5px;
    }

    .activity-card:hover .content button {
        opacity: 1;
    }

    .large-activity-card {
        width: calc(100% + 200px);
        max-width: 1700px;
        height: 600px;
        background-color: #bbb;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        text-align: center;
        margin-left: -100px;
    }
</style>


<h2 class="text1-dark" style="margin-top: 20px; margin-left: 30px;">Activity Club</h2>

<div class="container">
    <div class="container d-flex justify-content-start">
        <div class="large-activity-card">
            <h3>Main Activity</h3>
        </div>
    </div>

    <div class="activity-container">
        <div class="activity-card" onclick="window.location.href='/create'">
            <div class="content">
                <h4>Create New Activity</h4>
            </div>
        </div>

        <?php if (!empty($events)): ?>
            <?php foreach ($events as $event): ?>
                <!-- สร้าง container ใหม่สำหรับกิจกรรมแต่ละรายการ -->
                <div class="activity-card">
                    <div class="content">
                        <h3><?php echo htmlspecialchars($event['Eventname']); ?></h3>
                        <span class="like-count"></span>
                        <div class="content">
                            <button class="btn btn-primary">View</button>
                            <button class="btn btn-success" onclick="window.location.href='/register_at?eid=<?php echo $event['Event_id']; ?>'">Sign</button>
                          
                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>ไม่มีข้อมูลกิจกรรม</p>
        <?php endif; ?>
        
    </div>
</div>


<!-- <h2 class="text1-dark" style="margin-top: 20px; margin-left: 30px;">Activity Club</h2>

<div class="container">
    <div class="container d-flex justify-content-start">
        <div class="large-activity-card">
            <h3>Main Activity</h3>
        </div>
    </div>
    <div class="activity-container">
        <div class="activity-card" onclick="window.location.href='/create'">
            <div class="content">
                <h4>Create New Activity</h4>
            </div>
        </div>
        <div class="activity-card">
            <div class="content">
                <p>Activity 1</p>
            </div>
            <img src="https://via.placeholder.com/300x180" alt="Activity 1">
            <div class="content">
                <button class="btn btn-primary">View</button>
                <button class="btn btn-success">Sign</button>
            </div>
        </div>
        <div class="activity-card">
            <div class="content">
                <p>Activity 2</p>
            </div>
            <img src="https://via.placeholder.com/300x180" alt="Activity 2">
            <div class="content">
                <button class="btn btn-primary">View</button>
                <button class="btn btn-success">Sign</button>
            </div>
        </div>
    </div>
</div> -->


<?php require_once 'footer.php' ?>