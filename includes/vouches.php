<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Feedback Slideshow</title>
<style>
  .feedback-container {
    width: 100%;
    overflow: hidden;
  }

  .feedback-slide-container {
    display: flex;
    animation: slideIn 60s linear infinite;
  }

  .feedback-slide-container:hover {
    animation-play-state: paused;
  }

  .feedback-card {
    width: 600px; 
    height: 200px; /* Fixed height */
    margin: 10px;
    background-color: #000;
    color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: space-around; /* Adjusted for spacing */
    align-items: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    font-weight: bold;
    text-align: center;
  }

  @keyframes slideIn {
    from { transform: translateX(100%); }
    to { transform: translateX(-100%); }
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .feedback-card {
      width: 90%;
      height: auto;
    }
  }
</style>
</head>
<body>

<div class="feedback-container">
  <div class="feedback-slide-container">
  <?php include 'server/scrape_vouches.php'; ?>
  
  <?php foreach($feedbacks as $feedback): ?>
    <div class="feedback-card">
      <p class="feedback-rating"><?= str_repeat('⭐', $feedback['rating']); ?></p>
      <p class="feedback-comment"><?= htmlspecialchars($feedback['comment']); ?></p>
      <p class="feedback-date"><?= date('F j, Y', strtotime($feedback['createdAt'])); ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</div>

</body>
</html>
