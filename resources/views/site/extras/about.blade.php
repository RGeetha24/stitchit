<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stitch It - About Us</title>
  <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #fff;
      color: #064c4c;
      padding: 200px;
      margin-top: -100px;
      line-height: 1.6;
      transition: all 0.3s ease;
    }

    .back-button {
      font-size: 22px;
      margin-bottom: 30px;
      cursor: pointer;
      display: inline-block;
      color: #064c4c;
      transition: color 0.3s;
    }

    .back-button:hover {
      color: #009e7b;
    }

    h1 {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 10px;
      color: #000;
    }

    p.subtitle {
      color: #333;
      font-size: 18px;
      margin-bottom: 25px;
    }

    p {
      color: #000;
      font-size: 17px;
      margin-bottom: 25px;
    }

    h2 {
      font-size: 22px;
      font-weight: 700;
      margin-top: 30px;
      margin-bottom: 10px;
      color: #1e1e1e;
    }

    ul {
      list-style-type: disc;
      margin-left: -20px;
    }

    li {
      margin-bottom: 8px;
      font-size: 16px;
      color: black;
    }

    /* ===== Responsive Design ===== */
    @media (max-width: 992px) {
      body {
        padding: 80px;
        margin-top: -60px;
      }

      h1 {
        font-size: 28px;
      }

      p,
      li {
        font-size: 16px;
      }
    }

    @media (max-width: 768px) {
      body {
        padding: 40px 25px;
        margin-top: -30px;
      }

      h1 {
        font-size: 24px;
      }

      p.subtitle {
        font-size: 16px;
      }

      h2 {
        font-size: 20px;
      }

      p,
      li {
        font-size: 15px;
      }
    }

    @media (max-width: 480px) {
      body {
        padding: 25px 18px;
        margin-top: 0;
      }

      .back-button {
        font-size: 20px;
      }

      h1 {
        font-size: 22px;
      }

      p.subtitle {
        font-size: 15px;
      }

      p,
      li {
        font-size: 14px;
      }
    }
  </style>
</head>

<body>
  <div class="back-button" onclick="window.history.back()">
    <i class="fas fa-arrow-left"></i>
  </div>

  <h1>About Us</h1>
  <p class="subtitle">Learn about Stitch It and the services offered</p>

  <p>We are a professional cloth alteration service dedicated to helping you get the perfect fit. From minor adjustments
    to detailed tailoring, our skilled team ensures your garments look and feel just right.</p>

  <h2>Mission & Values</h2>
  <p>Our mission is to bring convenience and craftsmanship together, making alterations seamless and hassle-free.<br>
    Quality | Trust | Convenience | Sustainability
  </p>

  <h2>Services Highlight</h2>
  <ul>
    <li>Alterations for men's, women's, and kids' wear</li>
    <li>Quick turnaround options</li>
    <li>Doorstep pickup & delivery</li>
    <li>Saved measurements for future convenience</li>
  </ul>

</body>

</html>