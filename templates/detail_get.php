<?php
if (isset($_POST['event_id'])) {
    $eid = $_POST['event_id'];
    $event = getEventById($eid);

    if ($event) {
        $activityName = $event['Eventname'];
        $activityDetails = $event['description'];
        $participants = $event['Max_participants'];
        $sdate = $event['start_date'];
        $ddate = $event['end_date'];

        $eventImages = getEventImages($eid);
    } else {
        echo "ไม่พบกิจกรรม";
    }
} else {
    echo "ไม่ได้รับ eid";
}
?>

<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #87CEFA;
        font-family: Arial, sans-serif;
        color: white;
    }

    .editview-container {
        background: rgba(0, 0, 0, 0.8);
        padding: 40px;
        border-radius: 15px;
        width: 80%;
        max-width: 1000px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.7);
        text-align: center;
    }

    h1 {
        font-size: 2.8rem;
        margin-bottom: 30px;
        color: #ffffff;
    }

    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 40px;
        flex-wrap: wrap;
    }

    /* Styles for image carousel */
    .carousel-container {
        position: relative;
        width: 300px;
        height: 250px;
        overflow: hidden;
        border-radius: 10px;
        border: 2px solid #fff;
    }

    .carousel-images {
        display: flex;
        transition: transform 0.3s ease;
    }

    .carousel-images img {
        width: 400px;
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
    }

    .carousel-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        font-size: 1.5rem;
    }

    .carousel-button-left {
        left: 10px;
    }

    .carousel-button-right {
        right: 10px;
    }

    .activity-details {
        max-width: 600px;
        text-align: left;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        color: black;
    }

    .activity-description {
        font-size: 1.2rem;
        margin-bottom: 20px;
    }

    .button-container {
        display: flex;
        justify-content: space-around;
    }

    button {
        padding: 12px 20px;
        font-size: 1rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .view-button {
        background-color: #007bff;
        color: white;
    }

    .view-button:hover {
        background-color: #0056b3;
    }

    .edit-button {
        background-color: #ffc107;
        color: white;
    }

    .edit-button:hover {
        background-color: #e0a800;
    }

    .delete-button {
        background-color: #dc3545;
        color: white;
    }

    .delete-button:hover {
        background-color: #c82333;
    }

    @media (max-width: 768px) {
        .editview-container {
            width: 90%;
            padding: 20px;
        }

        .form-container {
            flex-direction: column;
            align-items: center;
        }

        .activity-details {
            max-width: 90%;
            text-align: center;
        }

        .button-container {
            flex-direction: column;
            gap: 15px;
        }

        .carousel-container {
            width: 100%;
            height: 200px;
        }
    }
</style>

<section>
    <div class="editview-container">
        <h1>View Activity</h1>
        <div class="form-container">
            <div class="carousel-container">
                <div class="carousel-images">
                    <?php
                    if (!empty($eventImages)) {
                        foreach ($eventImages as $image) {
                            echo '<img src="' . $image . '" alt="Activity Image">';
                        }
                    } else {
                        echo '<p>No images available for this event.</p>';
                    }
                    ?>
                </div>
                <button class="carousel-button carousel-button-left" onclick="prevImage()">❮</button>
                <button class="carousel-button carousel-button-right" onclick="nextImage()">❯</button>
            </div>
            <div class="activity-details">
                <p class="activity-description">
                    <?php echo htmlspecialchars($activityDetails); ?>
                </p>
                <div class="button-container">
                    <form action="/detail" method="post">
                        <input type="hidden" name="eid" value="<?php echo $eid; ?>">
                        <button type="submit" name="view" class="view-button" >View</button>
                    </form>
                    <form action="/detail" method="post">
                        <input type="hidden" name="eid" value="<?php echo $eid; ?>">
                        <button type="submit" name="edit" class="edit-button" >Edit</button>
                    </form>
                    <form action="/detail" method="post">
                        <input type="hidden" name="eid" value="<?php echo $eid; ?>">
                        <button type="submit" name="delete" class="delete-button" >Delete</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let currentIndex = 0;
    const images = document.querySelectorAll('.carousel-images img');
    
    function updateCarousel() {
        const totalImages = images.length;
        const newTransform = -currentIndex * 250; // Adjusting based on image width
        document.querySelector('.carousel-images').style.transform = `translateX(${newTransform}px)`;
    }

    function prevImage() {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
        updateCarousel();
    }

    function nextImage() {
        currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
        updateCarousel();
    }
</script>
