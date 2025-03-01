<style>
    section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 80px 20px 20px;
    }

    /* Activity container styles */
    .activity-container {
        background: rgba(0, 0, 0, 0.8);
        padding: 40px;
        border-radius: 15px;
        width: 80%;
        max-width: 1000px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    h1 {
        font-size: 2.8rem;
        margin-bottom: 30px;
    }

    /* Activity content container */
    .activity-content {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    /* Activity image styles */
    .activity-image img {
        width: 250px;
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 20px;
        border: 2px solid #fff;
    }

    /* Activity details styling */
    .activity-details {
        color: white;
        text-align: left;
        flex: 1;
        max-width: 500px;
    }

    /* Activity description */
    .activity-description {
        font-size: 1.2rem;
        margin-bottom: 20px;
    }

    /* Status container for participants and status dot */
    .status-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .status-text {
        font-size: 1rem;
    }

    .status-dot {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        display: inline-block;
    }

    /* Status colors */
    .status-dot.green {
        background-color: #28a745;
    }

    /* Back button styling */
    footer {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .back-button {
        padding: 12px 25px;
        font-size: 1.1rem;
        background-color: #6c757d;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #5a6268;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .activity-content {
            flex-direction: column;
            padding: 20px;
        }

        .activity-image img {
            width: 200px;
            height: 200px;
        }

        .back-button {
            width: 100%;
        }
    }
</style>
<section>
    <div class="activity-container">
        <h1>Activity</h1>
        <div class="activity-content">
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
            </div>
        </div>
    </div>
</section>