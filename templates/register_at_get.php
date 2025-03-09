<?php require_once 'header.php' ?>
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

    .activity-container {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        transition: all 0.3s ease-in-out;
    }

    .activity-image {
        width: 280px;
        height: 280px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 20px;
        border: 3px solid #3498db;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .activity-image img {
        width: 100%;
        height: 100%;
        border-radius: 15px;
    }

    .activity-image:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
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
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s ease;
        text-transform: uppercase;
        font-weight: 600;
        width: auto;
    }

    .register-button {
        background-color: #3498db;
        color: white;
        box-shadow: 0px 6px 12px rgba(52, 152, 219, 0.5);
    }

    .register-button:hover {
        background-color: #2980b9;
        transform: translateY(-5px);
        box-shadow: 0px 12px 24px rgba(52, 152, 219, 0.6);
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

    @media (max-width: 768px) {
        .activity-container {
            flex-direction: column;
            padding: 20px;
        }

        .activity-image {
            width: 220px;
            height: 220px;
        }

        .register-button, .back-button {
            width: 100%;
            padding: 12px 25px;
            font-size: 1rem;
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
                    <p class="status-text">จำนวนผู้เข้าร่วม: 0/50</p>
                    <div class="status-dot green"></div>
                </div>
                <form action="/register_at" method="post">
                <input type="hidden" name="eid" value="<?= $event['Event_id'] ?>">
                <button class="register-button" >เข้าร่วม</button>
                <!-- <button onclick="window.location.href='/main'" class="back-button">กลับไปหน้าแรก</button> -->
                <button type="button" class="back-button" onclick="window.location.href='/main'">กลับไปหน้าแรก</button>
                </form>
                
            </div>
        </div>
    </div>
</section>