<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stitch It - Accounts</title>
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
      max-width: 480px;
      width: 100%;
      padding: 20px;
    }

    .back-button {
      font-size: 20px;
      margin-bottom: 20px;
      cursor: pointer;
    }

    .account-header {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 30px;
    }

    .account-header i {
      color: #00796b;
      font-size: 24px;
    }

    .account-header h1 {
      font-size: 24px;
      font-weight: 600;
      margin: 0;
    }

    .menu-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 14px 0;
      border-bottom: 1px solid #ccc;
      cursor: pointer;
    }

    .menu-item i {
      margin-right: 12px;
      color: #000;
      width: 20px;
      text-align: center;
    }

    .menu-label {
      display: flex;
      align-items: center;
      font-size: 16px;
    }

    .menu-item:last-child {
      border-bottom: none;
    }

    .arrow-icon {
      color: #666;
    }
  </style>
</head>
<body>

  @yield('content')

  @yield('scripts')
  
</body>

</html>