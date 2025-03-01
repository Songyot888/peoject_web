<style>
        .menu {
        font-size: 1.5rem;
        cursor: pointer;
    }

    .user-info {
        font-size: 1.2rem;
    }

    /* Main content container */
    .main-container {
        padding-top: 80px; /* Space for the fixed header */
        padding: 20px;
        text-align: center;
    }

    h1 {
        font-size: 3rem;
        margin-bottom: 30px;
    }

    /* Container for the activity cards */
    .cards-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 30px;
    }

    /* Styles for each card */
    .card {
        background-color: rgba(0, 0, 0, 0.7);
        border-radius: 10px;
        width: 280px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .card img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 15px;
        height: 180px;
        object-fit: cover;
    }

    .card button {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .card button:hover {
        background-color: #0056b3;
    }

    /* View and Sign buttons */
    .view-sign {
        display: flex;
        justify-content: space-between;
    }

    .view-sign button {
        background-color: #28a745;
        width: 48%;
    }

    .view-sign button:hover {
        background-color: #218838;
    }

    /* Hover effect on card */
    .card:hover {
        transform: scale(1.05);
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .cards-container {
            flex-direction: column;
            align-items: center;
        }
        
        .card {
            width: 90%;
            margin-bottom: 20px;
        }
    }
</style>

<section>
    <div class="menu">MENU</div>
        <div class="user-info">NameUser</div>
    </header>

    <div class="main-container">
        <h1>Activity Club</h1>
        <div class="cards-container">
            <div class="card">
                <img src="activity1.jpg" alt="Activity 1">
                <button>+</button>
                <div class="view-sign">
                    <button>View</button>
                    <button>Sign</button>
                </div>
            </div>
        </div>
    </div>
</section>
        