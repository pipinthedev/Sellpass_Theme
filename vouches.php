<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .scrolling-reviews {
            overflow: hidden;
            position: relative;
        }

        .scroll-container {
            width: 100%;
            overflow: hidden;
        }

        .slide-container {
            display: flex;
            animation: scroll-left 30s linear infinite;
            margin-top: 20px;
        }

        .slide-card {
            border-radius: 25px;
            padding: 20px;
            background-color: rgb(39, 40, 40);
            width: 350px !important;
            max-width: 350px !important;
            height: 150px;
            margin-right: 30px;
        }


        @keyframes scroll-left {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Pause animation on hover */
        .scrolling-reviews:hover .slide-container {
            animation-play-state: paused;
        }

        .masking-div-left, .masking-div-right {
    flex: 1;
    height: 50px;
    backdrop-filter: blur(200px);
    -webkit-backdrop-filter: blur(200px);
    -webkit-filter: blur(200px);
  -moz-filter: blur(200px);
  -o-filter: blur(200px);
  -ms-filter: blur(200px);
  filter: blur(200px);
  pointer-events: none;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
    </style>
</head>

<body>
    <section>

        <div class="content-description" style="margin-top: 40px !important;">
            <span class="main-title">What our Customer Acknowledge</span>
            <div class="sub-title">
                <span>About our </span><span id="dynamic-content2" class="dynamic-part2">Stocks</span> <br>
            </div> <?php include 'server/scrape_vouches.php'; ?>
            <div class="masking-div-left"></div> <!-- Left masking div -->
            <div class="scrolling-reviews">
                <div class="scroll-container">
                    <div class="slide-container">
                        <?php foreach ($feedbacks as $feedback): ?>
                            <?php
                            $comment = htmlspecialchars($feedback['comment']);
                            if (!empty($comment) && strlen($comment) <= 50):
                                ?>
                                <div class="slide-card rounded-lg p-6 w-96 max-w-96 h-45 mr-10 bg-gray-800">
                                    <div class="card-footer">
                                        <small><?= str_repeat('⭐', $feedback['rating']); ?></small>
                                    </div>
                                    <div class="card-header" style="font-weight: bolder !important; margin-bottom: 10px !important;margin-top: 10px !important; font-size: 15px !important">
                                        <h3><?= $comment; ?></h3>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="masking-div-right"></div
        </div>
    </section>

    <script>
function scrollReviews(container) {
            let position = 0;
            const cardWidth = 400; // Width of each card
            const speed = 50; // Scroll speed (lower value means faster scroll)

            function animate() {
                position -= 1;
                container.style.transform = `translateX(${position}px)`;

                if (position <= -cardWidth) {
                    position = 0;
                }

                requestAnimationFrame(animate);
            }

            animate();
        }

        window.addEventListener('load', () => {
            const scrollContainer = document.getElementById('scrollContainer');
            scrollReviews(scrollContainer);
        });
        </script>
</body>

</html>