
<section>
    <div class="container">
        <h1>Search Results</h1>
        <div class="activity-container">
            <?php
            if (isset($data['result']) && $data['result']->num_rows > 0) {
                while ($row = $data['result']->fetch_object()) {
                    $imagePath = !empty($row->image_url) ? htmlspecialchars($row->image_url) : 'default-image.jpg';
            ?>
                    <div class="activity-card">
                        <div class="activity-card-img" style="background-image: url('<?= $imagePath ?>');"></div>
                        <div class="activity-card-content">
                            <h4><?= htmlspecialchars($row->Eventname) ?></h4>
                            <p><?= htmlspecialchars($row->description) ?></p>
                            <button class="detail-button" onclick="window.location.href='/detail?Event_id=<?= $row->Event_id ?>';">Detail</button>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No results found.</p>";
            }
            ?>
        </div>
    </div>
</section>

<style>
    .container {
        width: 80%;
        margin: auto;
        padding: 20px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 20px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .activity-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .activity-card {
        width: 250px;
        padding: 15px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 8px;
        text-align: center;
        display: flex;
        flex-direction: column;
    }

    .activity-card-img {
        height: 150px;
        background-size: cover;
        background-position: center;
        border-radius: 8px;
    }

    .activity-card-content {
        padding: 10px;
    }

    .activity-card-content h4 {
        font-size: 1.2em;
        margin: 10px 0;
    }

    .activity-card-content p {
        color: #555;
        font-size: 0.9em;
    }

    .detail-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    .detail-button:hover {
        background-color: #45a049;
    }
</style>
