<?php
if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $event = getEventById($eid);
} else {
    echo "ไม่ได้รับ eid";
}
?>
    <style>
    body {
        background: linear-gradient(135deg, #ff9a9e, #fad0c4);
        color: #333;
        font-family: Arial, sans-serif;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 80px 20px 20px;
    }

    .regis-at-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 15px;
        width: 80%;
        max-width: 1000px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    h1 {
        font-size: 3rem;
        margin-bottom: 30px;
        color: #ff6f61;
    }

    .activity-container {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .activity-image img {
        width: 280px;
        height: 280px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 20px;
        border: 3px solid #ff6f61;
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
        padding: 15px 25px;
        font-size: 1.2rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .register-button {
        background-color: #ff6f61;
        color: white;
    }

    .register-button:hover {
        background-color: #e35d56;
    }

    .back-button {
        background-color: #6c757d;
        color: white;
    }

    .back-button:hover {
        background-color: #5a6268;
    }

    @media (max-width: 768px) {
        .activity-container {
            flex-direction: column;
            padding: 20px;
        }

        .activity-image img {
            width: 220px;
            height: 220px;
        }

        .register-button, .back-button {
            width: 100%;
        }
    }
</style>

<section>
    <div class="regis-at-container">
        <h1>Activity</h1>
        <div class="activity-container">
            <div class="activity-image">
                <img src="activity-placeholder.jpg" alt="Activity Image">
            </div>
            <div class="activity-details">
                <p class="activity-description">
                    Lorem School Sports Day is an event that everyone eagerly awaits. It is a day when students can showcase their athletic abilities and team spirit with their color groups. The event begins with a vibrant parade, beautifully decorated and accompanied by cheerful music and energetic cheers. After the parade, the competitions start, featuring various sports like running races, long jumps, and even fun games that bring laughter to everyone.
                </p>
                <div class="status-container">
                    <p class="status-text">Participants: 0/50</p>
                    <div class="status-dot green"></div>
                </div>
                <form action="/register_at" method="post">
                <input type="hidden" name="eid" value="<?= $event['Event_id'] ?>">
                <button class="register-button" >Register</button>
                <button class="back-button" onclick="window.history.href='/main'">>Back</button>
                </form>
                
            </div>
        </div>
    </div>
</section>