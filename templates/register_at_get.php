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
    background: linear-gradient(135deg, #87CEFA, #4682B4);
    color: #333;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    box-sizing: border-box;
}

section {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 80px 20px 20px;
    box-sizing: border-box;
}

.regis-at-container {
    background: rgba(0, 0, 0, 0.8);
    padding: 40px;
    border-radius: 20px;
    width: 80%;
    max-width: 1000px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
    text-align: center;
    transition: transform 0.3s ease;
}

.regis-at-container:hover {
    transform: translateY(-5px);
}

h1 {
    font-size: 3.5rem;
    margin-bottom: 30px;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.activity-container {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    margin-top: 30px;
}

.activity-image img {
    width: 300px;
    height: 300px;
    object-fit: cover;
    border-radius: 15px;
    margin-bottom: 20px;
    border: 3px solid #ffffff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.activity-image img:hover {
    transform: scale(1.1);
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
}

.activity-details {
    color: #ffffff;
    text-align: left;
    flex: 1;
    max-width: 500px;
}

.activity-description {
    font-size: 1.4rem;
    margin-bottom: 20px;
    line-height: 1.5;
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
    font-weight: 500;
    color: #ffffff;
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
    border-radius: 12px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    width: auto;
    margin-top: 20px;
}

.register-button {
    background-color: #ff6f61;
    color: white;
}

.register-button:hover {
    background-color: #e35d56;
    transform: scale(1.05);
}

.back-button {
    background-color: #6c757d;
    color: white;
}

.back-button:hover {
    background-color: #5a6268;
    transform: scale(1.05);
}

@media (max-width: 768px) {
    section {
        padding: 40px 20px;
    }

    .regis-at-container {
        width: 100%;
        padding: 25px;
    }

    .activity-container {
        flex-direction: column;
        padding: 20px;
        gap: 15px;
    }

    .activity-image img {
        width: 250px;
        height: 250px;
    }

    .register-button, .back-button {
        width: 100%;
        padding: 15px;
    }

    h1 {
        font-size: 2.5rem;
    }

    .activity-description {
        font-size: 1.3rem;
    }

    .status-text {
        font-size: 1.1rem;
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