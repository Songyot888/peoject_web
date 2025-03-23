<?php
    $eventImages = getEventImage($data['event_id']['Event_id']);

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
        width: 300px;
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
        gap: 2%;
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

        .carousel-container {
            width: 100%;
            height: 200px;
        }
    }

    /* ปุ่มย้อนกลับ */
    .back-button {
        position: absolute;
        top: 20px;
        right: 20px;
        padding: 10px 20px;
        font-size: 1.2rem;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        z-index: 10;
        /* ให้แน่ใจว่าปุ่มอยู่เหนือคอนเทนต์ */
    }

    .back-button:hover {
        background-color: rgba(0, 0, 0, 0.9);
    }
    .activity-description-name{
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
        margin-top: -5%;
        text-align: center;
    }
</style>

<section>
    <div class="editview-container">
        <button class="back-button" onclick="window.history.back()">← Back</button>
        <h1>รายละเอียดของผู้สร้าง</h1>
        <div class="form-container">
            <div class="carousel-container">
                <div class="carousel-images">
                    <div class="carousel-images">
                        <?php
                        // Check if eventImages array is not empty
                        if (!empty($eventImages['images'])) {
                            foreach ($eventImages['images'] as $image) {
                                echo '<img src="' . $image . '" alt="Activity Image">';
                            }
                        } else {
                            echo '<p>No images available for this event.</p>';
                        }
                        ?>
                    </div>
                </div>
                <button class="carousel-button carousel-button-left" onclick="prevImage()">❮</button>
                <button class="carousel-button carousel-button-right" onclick="nextImage()">❯</button>
            </div>
            <div class="activity-details">
                <p class="activity-description-name">
                   ชื่อกิจกรรม : <?php echo $data['event_id']['Eventname']; ?>
                </p>
                <p class="activity-description">
                   วันเริ่มกิจกรรม : <?php echo date("d-m-y", strtotime($data['event_id']['start_date'])); ?>
                </p>
                <p class="activity-description">
                   วันสิ้นสุดกิจกรรม : <?php echo date("d-m-y", strtotime($data['event_id']['end_date'])); ?>
                </p>
                <p class="activity-description">
                   เนื้อหา : <?php echo $data['event_id']['description']; ?>
                </p>
                <div class="button-container">
                    <form action="/detail" method="post">
                        <input type="hidden" name="eid" value="<?php echo $data['event_id']['Event_id']; ?>">
                        <button type="submit" name="view" class="view-button">คำขอเข้าร่วม</button>
                    </form>
                    <form action="/detail" method="post">
                        <input type="hidden" name="eid" value="<?php echo $data['event_id']['Event_id']; ?>">
                        <button type="submit" name="edit" class="edit-button">แก้ไข</button>
                    </form>
                    <form action="/detail" method="post">
                        <input type="hidden" name="eid" value="<?php echo $data['event_id']['Event_id']; ?>">
                        <button type="submit" name="delete" class="delete-button">ลบ</button>
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
        const newTransform = -currentIndex * 300; // Adjusting based on image width
        document.querySelector('.carousel-images').style.transform = `translateX(${newTransform}px)`; // Corrected syntax with template literals
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