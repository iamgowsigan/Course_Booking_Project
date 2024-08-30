<?php
session_start();
//session_destroy();
include 'includes/config.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <?php include 'includes/head.php'; ?>
</head>

<body>

    <div class="main-wrapper">
        <?php include 'includes/navigation.php'; ?>

        <!-- Page Section Start -->
        <div class="page-section section section-padding">
            <div class="container">
                <div class="row row-30 mbn-40">

                    <div class="contact-info-wrap col-md-6 col-12 mb-40">
                        <h1>Course Information</h1>

                        <label for="authorFirstName">Enter Author's First Name:</label>
                        <input type="text" id="authorFirstName" />
                        <button onclick="fetchBookInfo()">Get Course Information</button>
                    </div>


                    <!-- Book Information Container -->
                    <div id="bookInfoContainer" class="col-md-6 col-12 mb-40"></div>

                </div>
            </div>
        </div><!-- Page Section End -->

        <?php include 'layout/home-promise.php'; ?>

        <!-- CONTENT END-->
        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/toast.php'; ?>

    </div>
    <?php include 'includes/script.php'; ?>

    <!-- Script for Book Information -->
    <script>
        async function fetchBookInfo() {
            const authorFirstNameInput = document.getElementById('authorFirstName');
            const bookInfoContainer = document.getElementById('bookInfoContainer');

            const authorFirstName = authorFirstNameInput.value.trim();

            if (!authorFirstName) {
                alert('Please enter the author\'s first name');
                return;
            }

            const apiUrl = `https://books-api7.p.rapidapi.com/books/get/random/?first_name=${authorFirstName}`;

            const options = {
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': 'ef1ff267e8msh28d68b9de5a40dap1df6cdjsnb57d9b3c1768',
                    'X-RapidAPI-Host': 'books-api7.p.rapidapi.com'
                }
            };

            try {
                const response = await fetch(apiUrl, options);
                const result = await response.json();

                // Check if the API response contains valid data
                if (result && result.author && result.review) {
                    const { first_name, last_name } = result.author;
                    const { name, body } = result.review;

                    const bookInfoHtml = `
                        <div class="book-info">
                            <h2>${result.title}</h2>
                            <p><strong>Author:</strong> ${first_name} ${last_name}</p>
                            <p><strong>Reviewer:</strong> ${name}</p>
                            <p><strong>Review:</strong> ${body}</p>
                            <p><strong>Rating:</strong> ${result.rating}</p>
                            <p><strong>Genres:</strong> ${result.genres.join(', ')}</p>
                            <p><strong>Plot:</strong> ${result.plot}</p>
                            <img class="book-cover" src="${result.cover}" alt="Book Cover" />
                            <p><strong>URL:</strong> <a href="${result.url}" target="_blank">${result.url}</a></p>
                        </div>
                    `;

                    // Append the book information to the container
                    bookInfoContainer.innerHTML = bookInfoHtml;
                } else {
                    // Handle invalid or empty response
                    alert('Invalid API response');
                }
            } catch (error) {
                console.error(error);
                alert('Error fetching book information');
            }
        }
    </script>
</body>

</html>