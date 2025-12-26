<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stitch It - Settings</title>
    <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: #fff;
      color: #000;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      max-width: 600px;
      width: 100%;
      padding: 40px;
    }

    .back-button {
      font-size: 20px;
      margin-bottom: 30px;
      cursor: pointer;
      display: inline-block;
    }

    h1 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 8px;
    }

    p {
      color: #444;
      margin-bottom: 30px;
    }

    .setting-item {
      background: #f9f9f9;
      border: 1px solid #e0e0e0;
      border-radius: 14px;
      padding: 18px 24px;
      margin-bottom: 16px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 16px;
      font-weight: 600;
    }

    /* Toggle Switch */
    .switch {
      position: relative;
      display: inline-block;
      width: 44px;
      height: 24px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #aaa;
      transition: .3s;
      border-radius: 24px;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: .3s;
      border-radius: 50%;
    }

    input:checked + .slider {
      background-color: #00897b;
    }

    input:checked + .slider:before {
      transform: translateX(20px);
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="back-button" onclick="window.history.back()">
      <i class="fas fa-arrow-left"></i>
    </div>

    <h1>Settings</h1>
    <p>Check the settings and modify them as needed</p>

    <div class="setting-item">
      <span>Notifications</span>
      <label class="switch">
        <input type="checkbox" checked>
        <span class="slider"></span>
      </label>
    </div>

    <div class="setting-item">
      <span>Email Updates</span>
      <label class="switch">
        <input type="checkbox" checked>
        <span class="slider"></span>
      </label>
    </div>                        

  </div>
</body>
</html>
