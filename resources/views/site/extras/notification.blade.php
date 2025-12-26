<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
  <title>Notifications | Stitch It</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f6f7f9;
      margin: 0;
      padding: 0;
      color: #222;
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    /* Header section */
    .header {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-bottom: 20px;
    }

    .header i {
      font-size: 20px;
      color: #333;
      cursor: pointer;
      transition: 0.3s;
    }

    .header i:hover {
      color: #00897b;
      transform: translateX(-3px);
    }

    .header h2 {
      font-size: 24px;
      margin: 0;
    }

    .subtitle {
      color: #777;
      font-size: 15px;
      margin-bottom: 25px;
    }

    /* Notification card */
    .notification {
      background: #fff;
      border: 1px solid #eee;
      border-radius: 10px;
      padding: 18px 20px;
      margin-bottom: 15px;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      transition: 0.3s;
    }
    /* Make notification layout 3 columns */
.notification {
    display: flex;
    align-items: flex-start;
    /* justify-content: flex-start; */
    gap: 10px;
}

/* Icon separate on left */
.notif-icon-box {
    width: 40px;
    height: 40px;
    background: #fff3c4;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.notif-icon {
    color: #d9a500;
    font-size: 20px;
}

/* Title and text */
.notif-content h4 {
    margin: 0 0 6px 0;
    font-size: 16px;
    font-weight: 600;
}

.notif-content p {
    margin: 0;
    font-size: 14px;
    color: #555;
}

/* Time on right */
.notif-time {
    white-space: nowrap;
    font-size: 12px;
    color: #777;
}

/* Responsive layout */
@media (max-width: 600px) {
    .notification {
        flex-direction: column;
        align-items: flex-start;
    }

    .notif-time {
        margin-top: 10px;
    }
}


    .notification:hover {
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .notification.warning {
      background: #fffbea;
      border-color: #ffe8a3;
    }

    .notif-content h4 {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 6px;
    }

    .notif-content p {
      font-size: 14px;
      color: #555;
      margin: 0;
    }

    .notif-time {
      font-size: 13px;
      color: #999;
      white-space: nowrap;
    }

    .notif-icon {
      color: #f4b400;
      font-size: 20px;
      margin-right: 0px;
    }

    .notif-header {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    @media (max-width: 600px) {
      .container {
        margin: 20px;
        padding: 20px;
      }

      .header h2 {
        font-size: 20px;
      }

      .notification {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
      }

      .notif-time {
        align-self: flex-end;
      }
    }
    /* Content expands */
.notif-content {
    flex: 1;
}

/* Time stays on right */
.notif-time {
    white-space: nowrap;
    font-size: 12px;
    color: #777;
    align-self: flex-start;
}
.notification {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    background: #fafafa;
    padding: 18px;
    border-radius: 14px;
    margin-bottom: 15px;
    gap: 15px; /* GAP between icon & content */
}

/* ICON BOX */
.notif-icon-box {
    width: 30px;
    flex-shrink: 0;
    display: flex;
    justify-content: center;
    margin-top: 4px;
}

.notif-icon {
    font-size: 22px;
    color: #d29a00; /* warning yellow */
}

/* TEXT CONTENT */
.notif-content {
    flex: 1;
}

/* TIME ON RIGHT SIDE */
.notif-time {
    white-space: nowrap;
    font-size: 12px;
    color: #666;
    align-self: flex-start;
}

.warning {
    background: #fff7d9 !important;
}

  </style>
</head>

<body>

  <div class="container">
    <!-- Header -->
    <div class="header">
      <i class="fas fa-arrow-left" onclick="window.location.href='{{ route('home') }}'"></i>
      <h2>Notifications</h2>
    </div>
    <p class="subtitle">Stay updated with your order and account alerts</p>

    <!-- Notification 1 -->
    <div class="notification warning">
      <div class="notif-icon-box">
        <i class="fas fa-exclamation-triangle notif-icon"></i>
      </div>

      <div class="notif-content">
        <h4>Garment Category Verification</h4>
        <p>Does not match the selected category during garment inspection.</p>
      </div>

      <div class="notif-time">1 min ago</div>
    </div>


    <!-- Notification 2 -->
    <div class="notification">
      <div class="notif-content">
        <h4>Order #12345 has been shipped</h4>
        <p>Expected delivery: 2–3 days</p>
      </div>
      <div class="notif-time">Yesterday</div>
    </div>

    <!-- Notification 3 -->
    <div class="notification">
      <div class="notif-content">
        <h4>Your return request has been approved</h4>
        <p>Refund will be processed in 5–7 business days</p>
      </div>
      <div class="notif-time">3 days ago</div>
    </div>
  </div>

</body>

</html>