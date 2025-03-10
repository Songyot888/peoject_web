<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        height: 100%;
        width: 100%;
        font-family: Arial, sans-serif;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px 20px;
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        min-height: 100vh;
        width: 100%;
    }

    .approval-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 15px;
        width: 90%;
        max-width: 1200px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 30px;
        color: #333;
    }

    .user-list {
        max-height: 500px;
        overflow-y: auto;
        padding-right: 10px;
    }

    .user-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        margin-bottom: 15px;
        border-radius: 12px;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .user-icon {
        width: 60px;
        height: 60px;
        background-color: #ff758c;
        color: white;
        font-size: 1.8rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user-name {
        font-size: 1.5rem;
        color: #333;
    }

    .user-status {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    input[type="radio"] {
        transform: scale(1.5);
        cursor: pointer;
    }

    .detail-button {
        padding: 8px 15px;
        background-color: #ff758c;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .detail-button:hover {
        background-color: #e84364;
    }

    .button-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 25px;
    }

    .deny-button,
    .apply-button {
        padding: 15px 30px;
        font-size: 1.2rem;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .deny-button {
        background-color: #ff5252;
    }

    .deny-button:hover {
        background-color: #e84343;
    }

    .apply-button {
        background-color: #42a5f5;
    }

    .apply-button:hover {
        background-color: #1e88e5;
    }

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
</style>

<section>
    <div class="approval-container">
        <button class="back-button" onclick="window.location.href='/profile'">← Back</button>
        <h1>Activity Approval</h1>
        <form method="POST" action="/approval_at">
            <div class="user-list">
                <?php

                $users = join_event($data['event_id']['Event_id']);
                $grouped_users = [];

                foreach ($users as $user) {
                    $grouped_users[$user['event_id']][] = $user;
                }

                foreach ($grouped_users as $event_id => $event_users):
                    if ($event_id == $data['event_id']['Event_id']):
                ?>
                        <h2>Event ID: <?= $event_id ?></h2>
                        <?php
                        if (empty($event_users)) {
                            echo "<p>No users found for this event.</p>";
                        }
                        ?>
                        <?php foreach ($event_users as $user): ?>
                            <div class="user-item">
                                <div class="user-info">
                                    <div class="user-icon">U</div>
                                    <div class="user-name"><?= $user['Name'] ?></div>
                                </div>
                                <div class="user-status">
                                    <button type="button" class="detail-button">Detail</button>
                                    <input type="radio" name="status[<?= $user['User_id'] ?>]" value="approved" <?= $user['status'] === 'approved' ? 'checked' : '' ?>> Approved
                                    <input type="radio" name="status[<?= $user['User_id'] ?>]" value="denied" <?= $user['status'] === 'denied' ? 'checked' : '' ?>> Denied
                                </div>
                            </div>
                        <?php endforeach; ?>
                <?php endif;
                endforeach; ?>
            </div>

            <div class="button-container">
                <input type="hidden" name="eid" value="<?= $data['event_id']['Event_id']; ?>">
                <button type="submit" class="apply-button" name="action" value="apply">Apply</button>
            </div>
        </form>
    </div>
</section>