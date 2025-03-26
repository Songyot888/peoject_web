<?php require_once 'header.php' ?>
<?php
    $event = getEventById($data['event_id']['Event_id']);
    $eventImages = getEventImage($data['event_id']['Event_id']);
    $count = countParticipants($data['event_id']['Event_id']);
?>

<style>
    body {
        background: linear-gradient(135deg, #d0e9f7, #ffffff);
        color: #333;
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 40px 20px;
        box-sizing: border-box;
    }

    .regis-at-container {
        background: rgba(255, 255, 255, 0.95);
        padding: 40px;
        border-radius: 20px;
        width: 100%;
        max-width: 900px;
        box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.1);
        text-align: center;
        animation: fadeIn 1s ease-out;
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 30px;
        color: #3498db;
        font-weight: 600;
        letter-spacing: 1px;
    }

.regis-at-container:hover {
    transform: translateY(-5px);
}

h1 {
    font-size: 3.5rem;
    margin-bottom: 30px;
    color: #4a90e2;
    font-weight: bold;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.activity-container {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    transition: all 0.3s ease-in-out;
}

.activity-image-container {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    max-width: 100%;
    padding: 10px;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.activity-image {
    flex: 0 0 auto;
    margin-right: 10px;
    border-radius: 15px;
}

.activity-image img {
    width: 300px;
    height: auto;
    object-fit: cover;
    transition: transform 0.3s ease;
    border-radius: 15px;
}

.activity-image img:hover {
    transform: scale(1.1);
}

.activity-details {
    color: #333;
    text-align: left;
    flex: 1;
    max-width: 500px;
}

.activity-description {
    font-size: 1.4rem;
    margin-bottom: 20px;
    line-height: 1.6;
    color: #555;
}

.status-container {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
}

.status-text {
    font-size: 1.2rem;
    margin: 0;
    color: #777;
}

.status-dot {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: inline-block;
}

.status-dot.green {
    background-color: #28a745;
}

.register-button, .back-button {
    padding: 15px 30px;
    font-size: 1.2rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s ease;
    text-transform: uppercase;
    font-weight: 600;
    width: 100%;
    margin-top: 20px;
}

.register-button {
    background-color: #4a90e2;
    color: white;
    box-shadow: 0px 6px 12px rgba(74, 144, 226, 0.5);
}

.register-button:hover {
    background-color: #007bb5;
    transform: translateY(-5px);
    box-shadow: 0px 12px 24px rgba(74, 144, 226, 0.6);
}

.back-button {
    background-color: #95a5a6;
    color: white;
    box-shadow: 0px 6px 12px rgba(149, 165, 166, 0.5);
}

.back-button:hover {
    background-color: #7f8c8d;
    transform: translateY(-5px);
    box-shadow: 0px 12px 24px rgba(149, 165, 166, 0.6);
}

@media (max-width: 768px) {
    .activity-container {
        display: flex;
        justify-content: flex-start;
        gap: 30px;
        flex-wrap: wrap;
        transition: all 0.3s ease-in-out;
    }

    /* Carousel Styles */
    .carousel-container {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        position: relative;
        max-width: 500px;
        margin-right: 30px;
        height: 280px; /* Fixed height for vertical scroll */
        overflow-y: scroll; /* Enable vertical scrolling */
    }

    .carousel {
        display: flex;
        flex-direction: column;
    }

    .activity-image {
        width: 280px;
        height: 280px;
        object-fit: cover;
        border-radius: 15px;
        margin: 5px 0; /* Vertical margin between images */
        border: 3px solid #3498db;
    }

    /* Activity Details */
    .activity-details {
        color: #333;
        text-align: left;
        flex: 1;
        max-width: 500px;
    }

    .activity-description {
        font-size: 1.4rem;
        margin-bottom: 20px;
        line-height: 1.6;
        color: #555;
    }

    .status-container {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .status-text {
        font-size: 1.2rem;
        margin: 0;
        color: #777;
    }

    .status-dot {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: inline-block;
    }

    .status-dot.green {
        background-color: #28a745;
    }

    .register-button, .back-button {
        padding: 15px 30px;
        font-size: 1.2rem;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s ease;
        text-transform: uppercase;
        font-weight: 600;
        width: auto;
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<section>
    <div class="regis-at-container">
        <h1><?php echo $data['event_id']['Eventname']; ?></h1>

        <!-- Carousel Section -->
        <div class="activity-container">
            <div class="carousel-container">
                <div class="carousel">
                    <?php
                    if (!empty($eventImages['images'])) {
                        foreach ($eventImages['images'] as $image) {
                            echo '<img class="activity-image" src="' . $image . '" alt="Activity Image">';
                        }
                    } else {
                        echo '<p>No images available for this event.</p>';
                    }
                    ?>
                </div>
            </div>

            <div class="activity-details">
                <p class="activity-description">
                    <?php echo $data['event_id']['description']; ?>
                </p>
                <p class="activity-description">
                  วันเริ่มกิจกรรม :  <?php echo date("d-m-y", strtotime($data['event_id']['start_date'])); ?>
                </p>
                <p class="activity-description">
                  สิ้นสุดกิจกรรม :  <?php echo date("d-m-y", strtotime($data['event_id']['end_date'])); ?>
                </p>
                <div class="status-container">
                    <p class="status-text">จำนวนผู้เข้าร่วม: <?php echo $count; ?> / <?php echo $data['event_id']['Max_participants']; ?></p>
                </div>
                <form action="/register_at" method="post">
                    <input type="hidden" name="eid" value="<?= $event['Event_id'] ?>">
                    <button class="register-button">เข้าร่วม</button>
                    <button type="button" class="back-button" onclick="window.location.href='/main'">กลับไปหน้าแรก</button>
                </form>
            </div>
        </div>
    </div>
</section>
