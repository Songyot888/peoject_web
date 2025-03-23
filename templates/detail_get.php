
<?php
if (isset($_GET['Event_id'])) {
    $eid = $_GET['Event_id'];
    $event = getEventById($eid);

    if ($event) {
        $activityName = $event['Eventname'];
        $activityDetails = $event['description'];
        $participants = $event['Max_participants'];
        $sdate = $event['start_date'];
        $ddate = $event['end_date'];

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

    .activity-image img {
        width: 250px;
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #fff;
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

        .activity-image img {
            width: 200px;
            height: 200px;
        }
    }
</style>

<section>
    <div class="editview-container">
        <h1>View Activity</h1>
        <div class="form-container">
            <div class="activity-image">
                <img src="placeholder-image.jpg" alt="Activity Image">
            </div>
            <div class="activity-details">
                <p class="activity-description">
                    <?php echo htmlspecialchars($activityDetails); ?>
                    c
                </p>
                <div class="button-container">
                <button class="view-button" onclick="window.location.href='/approval_at?eid=<?php echo $event['Event_id']; ?>'">View</button>
                <button class="edit-button" onclick="window.location.href='/edit?eid=<?php echo $event['Event_id']; ?>'">Edit</button>
                <button class="delete-button" onclick="window.location.href='/delete_activity.php?id=<?php echo $event['Event_id']; ?>'">Delete</button>
                </div>
            </div>
        </div>
    </div>
</section>
