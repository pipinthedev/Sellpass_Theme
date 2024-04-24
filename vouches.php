<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .scrolling-reviews {
            overflow: hidden;
            position: relative;
            height: 200px;
            display: flex;
            align-items: center;
        }

        .slide-container {
            display: flex;
            will-change: transform;
        }

        .slide-card {
            border-radius: 25px;
            padding: 15px;
            background-color: #1b1c1d;
            width: 300px;
            height: auto;
            margin-right: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            color: white;
            font-family: Arial, sans-serif;
            position: relative;
        }

        .slide-card h4 {
            margin-bottom: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .slide-card small,
        .date-display {
            font-size: 12px;
            color: #ccc;
        }

        .date-display {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }

        .slide-card.active {
            box-shadow: 0 0 5px 3px #0ad9ea;
            filter: none;
        }

        .blur-effect {
            filter: blur(2px);
        }

        @media (max-width: 768px) {
            .slide-card {
                width: 280px;
                padding: 10px;
            }
        }

        .rating {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <section>
        <div class="content-description" style="margin-top: 40px;">
            <span class="main-title" style="color: #0ad9ea;">What our Customer Acknowledge</span>
            <div class="sub-title">
                <span>About our </span><span id="dynamic-content2" class="dynamic-part2" style="color:  #de0ab1;">Stocks</span> <br>
                <div class="scrolling-reviews">
                    <div class="slide-container" id="scrollContainer">
                        <?php
                        include 'server/scrape_vouches.php';
                        foreach ($feedbacks as $feedback) {
                            if (!empty($feedback['comment']) && strlen($feedback['comment']) <= 80) {
                                $date = new DateTime($feedback['createdAt']);
                                echo "<div class='slide-card'>";
                                echo "<small class='rating'>" . str_repeat('⭐', $feedback['rating']) . "</small>";
                                echo "<h4>" . htmlspecialchars($feedback['comment']) . "</h4>";
                                echo "<div class='date-display'>" . $date->format('F Y') . "</div>";
                                echo "</div>";

                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
    </section>

    <script>
        function scrollReviews() {
            const container = document.getElementById('scrollContainer');
            let currentPosition = 0;
            const speed = 1; // Adjust scroll speed here
            let animationFrameId;

            function animate() {
                currentPosition -= speed;
                container.style.transform = `translateX(${currentPosition}px)`;
                if (Math.abs(currentPosition) >= container.firstChild.offsetWidth + 30) {
                    container.appendChild(container.firstChild);
                    currentPosition += container.firstChild.offsetWidth + 30;
                }
                animationFrameId = requestAnimationFrame(animate);
            }

            container.addEventListener('mouseover', function (event) {
                if (event.target.classList.contains('slide-card')) {
                    cancelAnimationFrame(animationFrameId);
                    event.target.classList.add('active');
                    document.querySelectorAll('.slide-card').forEach(card => {
                        if (card !== event.target) card.classList.add('blur-effect');
                    });
                }
            });

            container.addEventListener('mouseout', function (event) {
                if (event.target.classList.contains('slide-card')) {
                    requestAnimationFrame(animate);
                    event.target.classList.remove('active');
                    document.querySelectorAll('.slide-card').forEach(card => {
                        card.classList.remove('blur-effect');
                    });
                }
            });

            animate();
        }

        window.onload = scrollReviews;
    </script>
</body>

</html>