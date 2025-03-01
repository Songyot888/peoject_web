<style>
    body {
        background: url('background-image.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: Arial, sans-serif;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px 20px;
    }

    /* Profile container styles */
    .profile-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        width: 80%;
        max-width: 600px;
        background: rgba(0, 0, 0, 0.7);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
        margin-bottom: 40px;
        text-align: center;
    }

    /* Profile image styling */
    .profile-image {
        position: relative;
        width: 150px;
        height: 150px;
    }

    .profile-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #fff;
        cursor: pointer;
    }

    .profile-image input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    /* Profile info section */
    .profile-info {
        color: white;
        text-align: center;
    }

    .profile-info input {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border-radius: 8px;
        border: none;
        font-size: 1rem;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        text-align: center;
        outline: none;
        transition: 0.3s;
    }

    .profile-info input:focus {
        background: rgba(255, 255, 255, 0.4);
    }

    .edit-profile-button {
        padding: 12px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s ease;
        width: 100%;
        margin-top: 15px;
    }

    .edit-profile-button:hover {
        background-color: #0056b3;
    }
</style>
<section>
    <div class="profile-container">
        <div class="profile-image" onclick="document.getElementById('profile-pic').click()">
            <img id="profile-img" src="profile-placeholder.jpg" alt="">
            <input type="file" id="profile-pic" accept="image/*" onchange="previewImage(event)">
        </div>
        <form class="profile-info">
            <input type="text" value="Name Admin" placeholder="Full Name">
            <input type="email" value="admin@example.com" placeholder="Email">
            <input type="text" value="+123 456 7890" placeholder="Phone">
            <input type="text" value="123 Admin St, City" placeholder="Address">
            <input type="date" value="1990-01-01">
            <button type="submit" class="edit-profile-button">Save Changes</button>
        </form>
    </div>
</section>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('profile-img');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>