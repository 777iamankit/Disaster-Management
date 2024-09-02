<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Weather Forecast and Image Slider</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Same styling as before */

        .navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #333;
            overflow: hidden;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar li {
            float: left;
        }

        .navbar li a,
        .navbar .search-button,
        .navbar .report-button {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 16px;
        }

        .navbar li a:hover,
        .navbar .search-button:hover,
        .navbar .report-button:hover {
            background-color: black;
        }

        .navbar .search-button,
        .navbar .report-button {
            float: right;
            background-color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .navbar .search-button:hover,
        .navbar .report-button:hover {
            background-color: black;
        }

        .scrolling-info {
            position: fixed;
            top: 60px;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            white-space: nowrap;
            z-index: 1000;
            animation: scroll 20s linear infinite;
        }

        .scrolling-info p {
            margin: 0;
            display: inline-block;
            padding: 0 2rem;
            font-size: 16px;
        }

        .scrolling-info .temp-info {
            display: inline-flex;
            align-items: center;
        }

        .scrolling-info .temp-info span {
            margin-left: 0.5rem;
        }

        .scrolling-info .arrow {
            font-size: 18px;
            margin-left: 0.5rem;
        }

        @keyframes scroll {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(-100%);
            }
        }

        .slider-container {
            position: absolute;
            top: 150px;
            left: 10px;
            width: 600px;
            height: 400px;
            margin: 150px auto;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            z-index: 100;
        }

        .image-slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .image-slider img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .prev-arrow,
        .next-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 10;
            border-radius: 50%;
        }

        .prev-arrow {
            left: 10px;
        }

        .next-arrow {
            right: 10px;
        }

        .prev-arrow:hover,
        .next-arrow:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .social-buttons {
            position: absolute;
            top: 120px; /* Adjusted to place it between images and helpline */
            left: 10px;
            display: flex;
            gap: 10px;
            z-index: 200;
        }

        .social-buttons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: #333;
            border-radius: 50%;
            color: white;
            text-align: center;
            line-height: 40px;
            font-size: 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .social-buttons a:hover {
            background-color: #555;
        }

        .helpline-info {
            position: absolute;
            top: 180px;
            left: 10px;
            width: 100%;
            text-align: left;
            font-size: 18px;
            color: #333;
        }

        .weather-container {
            width: 80%;
            max-width: 600px;
            margin: 150px 50px 20px auto;
            position: relative;
            text-align: right;
        }

        .weather-section {
            background-color: aquamarine;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            backdrop-filter: blur(5px);
            position: relative;
        }

        .weather-section h2 {
            margin-bottom: 20px;
        }

        .weather-section .weather-info {
            margin-bottom: 20px;
        }

        .weather-section button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .weather-section button:hover {
            background-color: #0056b3;
        }

        .weather-details {
            margin-top: 20px;
        }

        .weather-details p {
            margin: 5px 0;
        }

        .rotating-sun {
            width: 70px;
            height: 70px;
            background: url('https://image.shutterstock.com/image-vector/sun-icon-260nw-411668686.jpg') no-repeat center center;
            background-size: cover;
            position: relative;
            animation: rotate 10s linear infinite;
        }

        .rotating-sun .overlay {
            position: absolute;
            top: 5;
            left: 0;
            width: 100%;
            height: 100%;
            background: aquamarine;
            mix-blend-mode: multiply;
            pointer-events: none;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }



/* Chatbot Icon */
/* Chatbot Icon Styles */
/* Chatbot Icon Styles */
.chatbot-icon {
    position: fixed;
    top: calc(50% + 80px); /* Adjust down by 80 pixels from the center */
    left: calc(50% + 60px); /* Adjust right by 20 pixels from the center */
    width: 10px; /* Adjust the size as needed */
    height: 10px;
    background-color: #007bff;
    border-radius: 50%;
    color: white;
    text-align: center;
    line-height: 60px;
    font-size: 30px;
    cursor: pointer;
    z-index: 1000;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}


/* Chatbot Window Styles */
.chatbot-window {
    display: none;
    width: 300px;
    height: 400px;
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    z-index: 1000;
}

.chatbot-header {
    background-color: #007bff;
    color: white;
    padding: 10px;
    text-align: center;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.chatbot-messages {
    padding: 10px;
    height: 300px;
    overflow-y: auto;
}

.chatbot-input-container {
    display: flex;
    padding: 10px;
    align-items: center;
}

.chatbot-input {
    flex: 1;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-right: 10px;
}

.chatbot-send-button {
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}


.footer-content {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 150px; /* Adjust as needed to control spacing above */
    padding-left: 100px; /* Shift the entire content to the right */
}

.footer-images {
    display: flex;
    align-items: center;
    margin-right: 20px; /* Space between images and text */
}

.footer-images img {
    width: 100px; /* Adjust size as needed */
    height: auto;
    opacity: 0.8;
    margin-right: 50px; /* Increase space between the two images */
}

.footer-images img:last-child {
    margin-right: 0; /* Remove margin from the last image */
}

.footer-text {
    text-align: left; /* Align text to the left */
    color: #333; /* Text color */
    font-family: Arial, sans-serif; /* Font family */
}

.footer-text p {
    margin: 0;
    font-size: 14px; /* Adjust size as needed */
}

.footer-text p:first-child {
    font-weight: normal; /* Regular weight for the first line */
}

.footer-text p:last-child {
    font-weight: bold; /* Bold weight for the second line */
    font-size: 16px; /* Slightly larger font size for emphasis */
}



.navbar-logo {
    position: fixed;
    top: 70px;
    right: 10px;
}

.navbar-logo .logo {
    width: 50px; /* Adjust as needed */
    height: auto; /* Maintain aspect ratio */
}



    </style>
</head>

<body>


<!--     for logo
<div class="navbar-logo">
    <img src="https://www.dropbox.com/t/A125zAHCwvuJvzxC" alt="Logo" class="logo">
</div>

-->

    <ul class="navbar">
        <li><a href="home">Home</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="admin_login.php">Admin Login</a></li>
        <li><button class="report-button">Immediate Report</button></li>
        <li><button class="search-button">Search</button></li>
    </ul>

    <div class="scrolling-info">
        <p>Weather forecast: Valid for 24 hours</p>
        <p><span id="min-temp">Min Temperature: <span class="temp-info">35°C <span class="arrow">↓</span></span></span></p>
        <p><span id="max-temp">Max Temperature: <span class="temp-info">43°C <span class="arrow">↑</span></span></span></p>
        <p id="forecast">24-hour Forecast: Loading...</p>
        <p>Humidity: Loading...</p>
        <p>Torridity: Loading...</p>
    </div>

    <div class="slider-container">
        <div class="image-slider">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2Wrhje5VkzYWFSJg81Iu7CFf1ujr0ZTSN6g&s" alt="Image 1">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTih-61Y8_-KyuniUrfMKE5W2iRMIv_SOTtVA&s" alt="Image 2">
        </div>
        <button class="prev-arrow" onclick="prevImage()">&#10094;</button>
        <button class="next-arrow" onclick="nextImage()">&#10095;</button>
    </div>

    <div class="social-buttons">
        <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.whatsapp.com" target="_blank"><i class="fab fa-whatsapp"></i></a>
    </div>

    <div class="helpline-info">
    <p>Child Helpline: 1098 &nbsp;&nbsp;|&nbsp;&nbsp; GSDMA: 1070 (Toll Free) &nbsp;&nbsp;|&nbsp;&nbsp; Emergency: 108</p>
</div>


    <div class="weather-container">
        <div class="weather-section">
            <h2>Current Weather</h2>
            <div class="weather-info">
                <p id="weather-description">Weather: Loading...</p>
                <p id="temperature">Temperature: Loading...</p>
            </div>
            <div class="weather-details">
                <p id="wind">Wind: Loading...</p>
                <p id="pressure">Pressure: Loading...</p>
                <p id="tide">Tide: Loading...</p>
            </div>
            <button onclick="fetchWeather()">Update Weather</button>
            <div class="rotating-sun">
                <div class="overlay"></div>
            </div>
        </div>
    </div>




    





<!-- Chatbot Icon -->
<div class="chatbot-icon" onclick="toggleChatbot()" style="position: relative; margin: 20px 50px;">
    <img src="data:image/png;base64,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" alt="Chatbot Icon" style="cursor: pointer;">
</div>

<!-- Chatbot Window -->
<div id="chatbotWindow" class="chatbot-window" style="display: none; position: absolute; bottom: 0; right: 20px; width: 300px; height: 400px; background-color: white; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0,0,0,0.3); overflow: hidden; z-index: 1000;">
    <div class="chatbot-header" style="background-color: #007bff; color: white; padding: 10px; text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px;">
        Chatbot
    </div>
    <div id="chatbotMessages" style="padding: 10px; height: 275px; overflow-y: auto;">
        <!-- Messages will be displayed here -->
    </div>
    <form id="chatbotForm" onsubmit="sendChatbotMessage(event)" style="padding: 10px; display: flex; align-items: center;">
        <input type="text" id="chatbotInput" placeholder="Type a message..." required style="flex: 1; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-right: 10px;">
        <button type="submit" style="padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px;">Send</button>
    </form>
</div>

<script>
    // Toggle Chatbot Window
    function toggleChatbot() {
        const chatbotWindow = document.getElementById('chatbotWindow');
        chatbotWindow.style.display = chatbotWindow.style.display === 'none' ? 'block' : 'none';
    }

    // Send Chatbot Message
    async function sendChatbotMessage(event) {
        event.preventDefault(); // Prevent form from submitting

        const chatbotInput = document.getElementById('chatbotInput');
        const chatbotMessages = document.getElementById('chatbotMessages');

        const userMessage = chatbotInput.value.trim();
        if (userMessage === '') return;

        // Display user message
        const userMessageElement = document.createElement('div');
        userMessageElement.textContent = userMessage;
        userMessageElement.style.padding = '10px';
        userMessageElement.style.margin = '10px 0';
        userMessageElement.style.borderRadius = '5px';
        userMessageElement.style.backgroundColor = '#007bff';
        userMessageElement.style.color = 'white';
        userMessageElement.style.textAlign = 'right';
        chatbotMessages.appendChild(userMessageElement);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;

        // Clear input
        chatbotInput.value = '';

        // Send message to ChatGPT API
        const response = await fetch('https://api.openai.com/v1/chat/completions', {
            method: 'POST',
            headers: {
                'Authorization': `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`, // Replace with your OpenAI API key
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                model: 'gpt-3.5-turbo', // Use the appropriate model
                messages: [{ role: 'user', content: userMessage }]
            })
        });

        const data = await response.json();
        const botMessage = data.choices[0].message.content;

        // Display bot message
        const botMessageElement = document.createElement('div');
        botMessageElement.textContent = botMessage;
        botMessageElement.style.padding = '10px';
        botMessageElement.style.margin = '10px 0';
        botMessageElement.style.borderRadius = '5px';
        botMessageElement.style.backgroundColor = '#f1f1f1';
        botMessageElement.style.color = '#333';
        chatbotMessages.appendChild(botMessageElement);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }
</script>









 <div class="disaster-links" style="margin: 40px 70px; text-align: right;">
    <p><a href="https://nidm.gov.in/PDF/guidelines/sdmp.pdf" target="_blank">Guidelines for State Disaster Management Plan</a></p>
    <p><a href="https://www.adt.com/resources/home-safety-tips-for-natural-disasters?srsltid=AfmBOopCxS1EtoMaPqXQgvDE2aBKZI2u2BfSESTl4dXb8MBADPym8VaH" target="_blank">Home Safety Tips for Natural Disasters</a></p>
    <p><a href="https://www.fcc.gov/general/disaster-information-reporting-system-dirs-0" target="_blank">Disaster Information Reporting System (DIRS)</a></p>
</div>

<!-- What's New box -->
<div class="whats-new" style="margin: 80px 50px 30px; padding: 15px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h3 style="margin-top: 0; color: #007bff;">What's New</h3>
    <ul style="list-style-type: none; padding-left: 0;">
        <li style="margin-bottom: 10px;">
            <a href="https://ndma.gov.in/Natural-Hazards/Heat-Wave" target="_blank" style="text-decoration: none; color: #333; font-weight: bold;">Heat Wave Guidelines</a>
        </li>
        <li>
            <a href="https://ndma.gov.in/covid/covid-19-positive-stories" target="_blank" style="text-decoration: none; color: #333; font-weight: bold;">COVID-19 Positive Stories</a>
        </li>
    </ul>
</div>



<!-- Rescue Now and Share Location Section -->
<div class="rescue-section" style="margin: 20px 600px; display: flex; gap: 20px; align-items: center;">
    <button style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; transition: background-color 0.3s;">
        Rescue Now
    </button>
    <button onclick="shareLocation()" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; transition: background-color 0.3s;">
        Share Location
    </button>
</div>

<script>
    function shareLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                alert(`Location shared!\nLatitude: ${latitude}\nLongitude: ${longitude}`);
                // Here, you can send the location to your server or another endpoint.
            }, error => {
                alert('Unable to retrieve location. Please try again.');
            });
        } else {
            alert('Geolocation is not supported by this browser.');
        }
    }
</script>


<!-- Message Section -->
<div class="message-section" style="margin: 20px 50px;">
    <h3>Send a Message</h3>
    <form id="messageForm" onsubmit="sendMessage(event)">
        <input type="text" id="messageInput" placeholder="Type your message here..." required
            style="width: 60%; padding: 10px; border-radius: 4px; border: 1px solid #ccc; margin-right: 10px;">
        <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; transition: background-color 0.3s;">
            Send
        </button>
        <button type="button" onclick="clearMessages()" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; transition: background-color 0.3s; margin-left: 10px;">
            Clear
        </button>
    </form>
    <h4>Messages</h4>
    <ul id="messageList" style="list-style-type: none; padding: 0;">
        <!-- Messages will appear here -->
    </ul>
</div>

<script>
    function sendMessage(event) {
        event.preventDefault(); // Prevent the form from refreshing the page

        const messageInput = document.getElementById('messageInput');
        const messageList = document.getElementById('messageList');

        const messageText = messageInput.value;
        if (messageText.trim() === '') {
            return; // Do nothing if the message is empty
        }

        // Create a new list item for the message
        const newMessage = document.createElement('li');
        newMessage.textContent = messageText;
        newMessage.style.padding = "10px";
        newMessage.style.borderBottom = "1px solid #ccc";
        messageList.appendChild(newMessage);

        // Clear the input field
        messageInput.value = '';
    }

    function clearMessages() {
        const messageList = document.getElementById('messageList');
        messageList.innerHTML = ''; // Clear all messages from the list
    }
</script>




    <script>
        const apiKey = 'a993e7e317e095aa1a54bf3e8a9bad0e'; // Replace with your OpenWeatherMap API key
        const city = 'London'; // Replace with the city you want to get weather for

        function fetchWeather() {
            fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`)
                .then(response => response.json())
                .then(data => {
                    const description = data.weather[0].description;
                    const temp = data.main.temp;
                    const minTemp = data.main.temp_min;
                    const maxTemp = data.main.temp_max;
                    const wind = data.wind.speed;
                    const pressure = data.main.pressure;
                    const tide = 'Not Available'; // OpenWeatherMap API does not provide tide information

                    // Update current weather and additional info
                    document.getElementById('weather-description').textContent = `Weather: ${description}`;
                    document.getElementById('temperature').textContent = `Temperature: ${temp}°C`;
                    document.getElementById('min-temp').innerHTML = `Min Temperature: <span class="temp-info">${minTemp}°C <span class="arrow">↓</span></span>`;
                    document.getElementById('max-temp').innerHTML = `Max Temperature: <span class="temp-info">${maxTemp}°C <span class="arrow">↑</span></span>`;
                    document.getElementById('wind').textContent = `Wind: ${wind} m/s`;
                    document.getElementById('pressure').textContent = `Pressure: ${pressure} hPa`;
                    document.getElementById('tide').textContent = `Tide: ${tide}`;
                })
                .catch(error => {
                    console.error('Error fetching weather data:', error);
                });
        }

        fetchWeather(); // Fetch weather on page load

        let currentIndex = 0;

        function showImage(index) {
            const slider = document.querySelector('.image-slider');
            slider.style.transform = `translateX(-${index * 100}%)`;
        }

        function nextImage() {
            const totalImages = document.querySelectorAll('.image-slider img').length;
            currentIndex = (currentIndex + 1) % totalImages;
            showImage(currentIndex);
        }

        function prevImage() {
            const totalImages = document.querySelectorAll('.image-slider img').length;
            currentIndex = (currentIndex - 1 + totalImages) % totalImages;
            showImage(currentIndex);
        }
    </script>




<div class="footer-content">
    <div class="footer-images">
        <img src="https://ndma.gov.in/sites/default/files/emblem-dark.png" alt="Emblem">
        <img src="https://www.ndma.gov.in/themes/custom/cmf/images/emblem-dark.png" alt="Emblem">
    </div>
    <div class="footer-text">
        <p>NATIONAL DISASTER MANAGEMENT AUTHORITY</p>
        <p><strong>GOVERNMENT OF INDIA</strong></p>
    </div>
</div>



</body>

</html>
