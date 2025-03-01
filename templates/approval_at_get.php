<style>
    section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 80px 20px 20px;
        background: linear-gradient(135deg, #ff9a9e, #fad0c4); /* สีสดใสขึ้น */
        height: 100vh;
    }

    .approval-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 15px;
        width: 80%;
        max-width: 1000px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    h1 {
        font-size: 2.8rem;
        margin-bottom: 30px;
        color: #333;
    }

    .user-list {
        margin-bottom: 30px;
    }

    .user-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.8);
        margin-bottom: 10px;
        border-radius: 10px;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-icon {
        width: 40px;
        height: 40px;
        background-color: #ff758c;
        color: white;
        font-size: 1.5rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user-name {
        font-size: 1.2rem;
        color: #333;
    }

    .user-status {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    input[type="radio"] {
        transform: scale(1.2);
        cursor: pointer;
    }

    .detail-button {
        padding: 6px 12px;
        background-color: #ff758c;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .detail-button:hover {
        background-color: #e84364;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        margin-top: 20px;
    }

    .deny-button {
        padding: 12px 20px;
        background-color: #ff5252;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .deny-button:hover {
        background-color: #e84343;
    }

    .apply-button {
        padding: 12px 20px;
        background-color: #42a5f5;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .apply-button:hover {
        background-color: #1e88e5;
    }

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
</style>

<section>
    <div class="approval-container">
        <h1>Activity Approval</h1>
        <div class="user-list">
            <div class="user-item">
                <div class="user-info">
                    <div class="user-icon">U</div>
                    <div class="user-name">User 1</div>
                </div>
                <div class="user-status">
                    <button class="detail-button">Detail</button>
                    <input type="radio" name="status1">
                </div>
            </div>

            <div class="user-item">
                <div class="user-info">
                    <div class="user-icon">U</div>
                    <div class="user-name">User 2</div>
                </div>
                <div class="user-status">
                    <button class="detail-button">Detail</button>
                    <input type="radio" name="status2">
                </div>
            </div>
        </div>
        <div class="button-container">
            <button class="deny-button">Deny</button>
            <button class="apply-button">Apply</button>
        </div>
    </div>
</section>
