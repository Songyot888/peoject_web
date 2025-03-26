<?php
    $eventImages = getEventImage($data['event_id']['Event_id']);

?>

<style>
/* Reset some default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Set the base font and background */
html, body {
    height: 100%;
    font-family: 'Roboto', sans-serif;
    background: #f0f8ff; /* Light Blue Background */
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Container for the main content */
.editview-container {
    background: rgba(255, 255, 255, 0.9); /* Slight transparency to give depth */
    padding: 40px;
    border-radius: 20px;
    width: 90%;
    max-width: 1000px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1); /* Soft shadow for a modern look */
    text-align: center;
    position: relative;
    backdrop-filter: blur(8px); /* Blurred background effect */
}

/* Title styling */
h1 {
    font-size: 2.5rem;
    margin-bottom: 30px;
    color: #0066cc; /* Blue color for the title */
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
}

/* Form container with flexible layout */
.form-container {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
    margin-bottom: 30px;
}

/* Styles for the image carousel */
.carousel-container {
    position: relative;
    width: 320px;
    height: 270px;
    overflow: hidden;
    border-radius: 15px;
    background-color: #f7f9fc;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
}

.carousel-images {
    display: flex;
    transition: transform 0.3s ease-in-out;
}

.carousel-images img {
    width: 320px;
    height: 270px;
    object-fit: cover;
    border-radius: 10px;
}

/* Carousel buttons */
.carousel-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.6);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 2rem;
    border-radius: 50%;
}

.carousel-button-left {
    left: 10px;
}

.carousel-button-right {
    right: 10px;
}

/* Activity details block */
.activity-details {
    max-width: 650px;
    text-align: left;
    padding: 25px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    box-shadow: 0px 5px 25px rgba(0, 0, 0, 0.1);
    color: #333;
}

/* Activity description styling */
.activity-description {
    font-size: 1.1rem;
    line-height: 1.5;
    margin-bottom: 20px;
}

/* Button styling */
.button-container {
    display: flex;
    justify-content: space-evenly;
    gap: 30px;
}

button {
    padding: 14px 25px;
    font-size: 1.1rem;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* View button */
.view-button {
    background-color: #007bff;
    color: white;
}

.view-button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Edit button */
.edit-button {
    background-color: #ff9900;
    color: white;
}

.edit-button:hover {
    background-color: #e68a00;
    transform: scale(1.05);
}

/* Delete button */
.delete-button {
    background-color: #dc3545;
    color: white;
}

.delete-button:hover {
    background-color: #c82333;
    transform: scale(1.05);
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .editview-container {
        width: 90%;
        padding: 25px;
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
        display: flex;
        justify-content: space-around;
        gap: 2%;
    }

    .carousel-container {
        width: 100%;
        height: 220px;
    }

    .carousel-images img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
}

/* Back button */
.back-button {
    position: absolute;
    top: 20px;
    left: 20px;
    padding: 12px 25px;
    font-size: 1.3rem;
    background-color: rgba(0, 0, 0, 0.6);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
}

.back-button:hover {
    background-color: rgba(0, 0, 0, 0.8);
    transform: scale(1.05);
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