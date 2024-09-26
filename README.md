# Yaishix - eat.stream.repeat
![yaishix_logo](https://github.com/user-attachments/assets/f24eb7dd-d2b7-4ff9-a675-b148a065a483)


Yaishix is a comprehensive video streaming platform designed to deliver a user-friendly and immersive experience for streaming diverse video content. Inspired by the functionality of Netflix, Yaishix allows users to effortlessly register, log in, and explore an extensive library of videos. The platform features fully functional video playback, session memory for seamless resumption from the last watched point, and a genre-based recommendation system to personalize the viewing experience. Built using a robust tech stack of **HTML**, **CSS**, **JavaScript**, **PHP**, and **phpMyAdmin**, Yaishix ensures smooth connectivity and functionality, offering users an engaging and hassle-free streaming experience.

Here's a bifurcated front-end and back-end implementation for your video streaming web service based on the technologies mentioned:

### **Front-End Implementation**

<img width="1000" alt="Screenshot 2023-11-29 at 10 07 41 AM" src="https://github.com/user-attachments/assets/02d2f510-b6a8-4335-88f7-c53c657210dc">

 <img width="498" alt="image" src="https://github.com/user-attachments/assets/6aa02bf4-35a5-4f44-a243-57ced13feefc">  <img width="498" alt="image" src="https://github.com/user-attachments/assets/c3441fc4-3132-4c42-a466-f1265ebe2b68">


**Technologies:** HTML, CSS, JavaScript

1. **HTML Structure:**
   - Create a structured layout for the homepage, genres, video playback pages, and user profile page.
   - Include sections such as navigation, genre categories, video previews, and recommended videos.
   - Use `<video>` tags for video playback with controls enabled for play, pause, and progress tracking.

2. **CSS Styling:**
   - Design a responsive layout to ensure compatibility across different devices.
   - Use CSS grids and flexbox to create a seamless and user-friendly design for genre categorization, video previews, and navigation bars.
   - Implement hover effects on video thumbnails to display video details like title, genre, and duration.

3. **JavaScript Functionality:**
   - Use JavaScript to handle dynamic loading of video previews and genres.
   - Fetch video data via AJAX requests from the back-end (PHP server) and display it on the front-end.
   - Implement a progress bar to track how much of the video has been watched, storing this data using the `localStorage` or `sessionStorage` feature temporarily.
   - Develop the functionality to continue playback from the last watched position by retrieving this data from the back-end database.
   - Implement a recommendation carousel that updates based on user viewing history.

4. **User Profile and Watch History:**
   - Provide a user profile section that displays the user's watch history, saved points, and recommended videos.
   - Include an option to filter watch history by genre, series, or standalone videos.

<img width="498" alt="image" src="https://github.com/user-attachments/assets/a50716eb-3848-44a8-a2ea-2fb0aaef17e3">  <img width="498" alt="image" src="https://github.com/user-attachments/assets/1d909090-b395-4196-9dcf-82662ae81c5d">

![07D1F950-0FCE-4737-8632-8D49C59F2476](https://github.com/user-attachments/assets/9d07876a-bd7f-43a0-a1c4-bd4bb0957b03)
### **Back-End Implementation**

**Technologies:** PHP, MySQL (phpMyAdmin for database management)

1. **Database Structure (MySQL):**
   - **Users Table:** Stores user information like user ID, email, password, and profile details.
   - **Videos Table:** Contains video details such as video ID, title, genre, description, video URL, and thumbnail URL.
   - **Genres Table:** Lists different genres available with genre IDs and names.
   - **Watch History Table:** Tracks user watch progress, storing user ID, video ID, watched duration, last watched timestamp, episode/season information (if applicable).
   - **Recommendations Table:** Stores user preferences based on genres watched, video ratings, or any other relevant data.

2. **PHP Server-Side Functionality:**
   - **User Authentication:** Implement user registration, login, and authentication using PHP sessions to manage user data securely.
   - **Video Retrieval:** Write PHP scripts to fetch video previews and genre data from the database and send this information to the front-end using JSON format.
   - **Progress Tracking:** Store user watch progress in the `Watch History` table. When the user resumes a video, fetch the saved position from the database.
   - **Genre & Recommendations:** Create a recommendation algorithm in PHP that selects videos from similar genres that the user has previously watched or liked, based on the data in the `Recommendations` table.
   - **CRUD Operations:** Provide Create, Read, Update, and Delete operations for video data, genres, user preferences, and watch history.
   - **Data Synchronization:** Whenever a user completes watching a video or episode, update their progress and recommendation data.

3. **APIs and AJAX Integration:**
   - Develop APIs using PHP to handle data transfer between the front-end and back-end. Key API endpoints might include:
     - `/api/getVideosByGenre.php?genre=XYZ` – Retrieve videos under a specific genre.
     - `/api/getVideoProgress.php?videoID=XYZ&userID=123` – Fetch the last watched position for a video.
     - `/api/updateWatchProgress.php` – Update the watch progress in the database.
     - `/api/getRecommendations.php?userID=123` – Fetch personalized video recommendations.

<img width="1000" alt="image" src="https://github.com/user-attachments/assets/cafbc21a-1fc8-45bd-b7f5-6f826fc72aa6">


