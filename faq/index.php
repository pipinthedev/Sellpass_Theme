<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ Section</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom, #1f1f1f, #000000);
      color: #ffffff;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow-x: hidden;
    }

    .container {
      max-width: 700px;
      margin: 20px;
      padding: 20px;
    }

    .faq-card {
      background: #2a2a2a;
      padding: 15px 20px;
      border-radius: 8px;
      margin-bottom: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      transition: background 0.3s;
    }

    .faq-card:hover {
      background: #333333;
    }

    .faq-button {
      background: none;
      border: none;
      outline: none;
      color: #ffffff;
      font-size: 18px;
      display: flex;
      justify-content: space-between;
      width: 100%;
    }

    .faq-button::after {
      content: '\25BC';
      transition: transform 0.3s;
    }

    .faq-button.active::after {
      transform: rotate(180deg);
    }

    .faq-answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s ease;
      color: #b0b0b0;
      margin-top: 10px;
    }

    .faq-answer.open {
      max-height: 100px;
    }
  </style>
</head>

<body>
  <section class="container">
    <h2 class="text-3xl font-bold text-center mb-8 text-purple-400">FAQs</h2>
    <h3 class="text-4xl font-bold text-center mb-8 text-white">Frequently Asked Questions</h3>


    <div class="faq-card">
      <button class="faq-button" onclick="toggleFaq(this)">
        Will I get a replacement if the account isn't working?
      </button>
      <div class="faq-answer">
        Sure thing! We're pretty sure that you'll be satisfied with your purchase.
      </div>
    </div>


    <div class="faq-card">
      <button class="faq-button" onclick="toggleFaq(this)">
        Do we have a Telegram channel?
      </button>
      <div class="faq-answer">
        Yes, you can find us on Telegram for all the latest updates.
      </div>
    </div>


    <div class="faq-card">
      <button class="faq-button" onclick="toggleFaq(this)">
        How to leave feedback?
      </button>
      <div class="faq-answer">
        You can leave your feedback through our website's feedback section.
      </div>
    </div>

    <!-- Additional FAQ Items -->
    <div class="faq-card">
      <button class="faq-button" onclick="toggleFaq(this)">
        What can I do with the accounts with CC linked?
      </button>
      <div class="faq-answer">
        You can use the accounts as described within the product details safely.
      </div>
    </div>

  </section>

  <script>
    function toggleFaq(button) {
      const answer = button.nextElementSibling;

      answer.classList.toggle('open');
      button.classList.toggle('active');

      document.querySelectorAll('.faq-answer').forEach((ans) => {
        if (ans !== answer) {
          ans.classList.remove('open');
        }
      });

      document.querySelectorAll('.faq-button').forEach((btn) => {
        if (btn !== button) {
          btn.classList.remove('active');
        }
      });
    }
  </script>

</body>

</html>