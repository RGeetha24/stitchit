<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Wallet | Stitch It</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #fff;
      color: #064c4c;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .wallet-wrapper {
      background: #fff;
      width: 90%;
      line-height: 40px;
      max-width: 800px;
      border-radius: 10px;
      padding: 40px 30px;
      margin-top: 50px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .back-arrow {
      font-size: 22px;
      color: #333;
      text-decoration: none;
      display: inline-block;
      margin-bottom: 10px;
    }

    h1 {
      font-size: 34px;
      font-weight: 600;
      margin-bottom: 5px;
    }

    p.subtitle {
      color: #666;
      font-size: 15px;
      margin-bottom: 20px;
    }

    .wallet-card {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 15px;
      border: 1px solid #eee;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .wallet-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .wallet-icon {
      background: #ffe8d27d;
      color: #ff8b3d;
      padding: 10px;
      border-radius: 100%;
      font-size: 17px;
    }

    .wallet-name {
      font-weight: 600;
      font-size: 16px;
      color: #000;
    }

    .wallet-amount {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .wallet-amount span {
      font-weight: 600;
      font-size: 16px;
      color: #000;
    }

    .add-btn {
      background: #d9f2f0;
      color: #008080;
      border: none;
      padding: 8px 16px;
      border-radius: 8px;
      font-size: 14px;
      cursor: pointer;
      transition: 0.3s;
    }

    .add-btn:hover {
      background: #c2e8e5;
    }

    .divider {
      height: 1px;
      background: #f0f0f0;
      margin: 20px 0;
    }

    /* ---------- DROPDOWN ---------- */
    .list-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 5px;
      border-bottom: 1px solid #f0f0f0;
      cursor: pointer;
      transition: 0.3s;
    }

    .list-item:hover {
      background: #fafafa;
    }

    .list-item span {
      font-size: 16px;
      color: #333;
    }

    .list-item i {
      color: #999;
      transition: transform 0.3s ease;
    }

    .list-item.active i {
      transform: rotate(90deg);
    }

    .dropdown-content {
      display: none;
      padding: 10px 15px;
      font-size: 15px;
      color: #555;
      background: #f7f7f7;
      border-left: 0px solid #008080;
      border-radius: 5px;
    }

    .dropdown-content.active {
      display: block;
    }

    /* ---------- MODAL ---------- */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.4);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .modal {
      background: #fff;
      border-radius: 12px;
      width: 90%;
      max-width: 420px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      animation: fadeIn 0.3s ease;
      position: relative;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: scale(0.9);
      }

      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    .modal h3 {
      margin-top: 0;
      text-align: center;
      color: #008080;
    }

    .tab-buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-bottom: 15px;
    }

    .tab-buttons button {
      flex: 1;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #008080;
      background: #fff;
      color: #008080;
      cursor: pointer;
      transition: 0.3s;
    }

    .tab-buttons button.active {
      background: #008080;
      color: #fff;
    }

    .tab-content {
      display: none;
    }

    .tab-content.active {
      display: block;
    }

    .modal label {
      font-size: 14px;
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    .modal input {
      width: 95%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-bottom: 15px;
      font-size: 14px;
    }

    .verify-btn {
      background: #008080;
      color: #fff;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }

    .verify-btn:hover {
      background: #006b6b;
    }

    .close-modal {
      position: absolute;
      top: 15px;
      right: 20px;
      background: none;
      border: none;
      font-size: 18px;
      color: #666;
      cursor: pointer;
    }

    @media (max-width: 600px) {
      .wallet-wrapper {
        padding: 25px 20px;
      }

      .modal {
        padding: 20px;
      }

      .tab-buttons button {
        font-size: 13px;
      }
    }

    /* Container */
    .wallet-section {
      max-width: 800px;
      margin: 20px auto;
      font-family: Poppins, sans-serif;
    }

    /* Dropdown Header */
    .list-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #fff;
      padding: 14px 18px;
      border-radius: 10px;
      cursor: pointer;
      font-size: 16px;
      border: 1px solid #e5e5e5;
    }

    .arrow-icon {
      transition: 0.3s;
    }

    /* Dropdown Content */
    .dropdown-content {
      display: none;
      margin-top: 12px;
    }

    /* Each row */
    .wallet-row {
      display: flex;
      align-items: center;
      background: #fff;
      padding: 14px 18px;
      border-radius: 10px;
      border: 1px solid #e5e5e5;
      margin-bottom: 10px;
      gap: 12px;
    }

    /* Icon */
    .wallet-row .icon {
      font-size: 20px;
    }

    /* Name */
    .wallet-row .title {
      flex: 1;
      font-size: 15px;
    }

    /* Amount */
    .wallet-row .amount {
      font-size: 16px;
      font-weight: 600;
    }

    /* Colors */
    .success .amount {
      color: #0a8a34;
      /* green */
    }

    .danger .amount {
      color: #d12a2a;
      /* red */
    }

    .danger .icon {
      color: #d12a2a;
    }

    /* Responsive */
    @media (max-width: 500px) {
      .wallet-row {
        padding: 12px;
      }

      .amount {
        font-size: 14px;
      }

      .title {
        font-size: 14px;
      }
    }
  </style>
</head>

<body>
  <div class="wallet-wrapper">
    <a href="{{route('home')}}" class="back-arrow"><i class="ri-arrow-left-line"></i></a>
    <h1>My Wallet</h1>
    <p class="subtitle">View the Stitch It Wallet details below</p>
    <div class="divider"></div>

    <div class="wallet-card">
      <div class="wallet-info">
        <div class="wallet-icon"><img src='{{url("site/assets/image/icon/streamline-plump_wallet-solid.png")}}' alt="Wallet" style="width:30px; vertical-align:middle;">
        </div>
        <div class="wallet-name">Stitch It Wallet</div>
      </div>
      <div class="wallet-amount">
        <span id="walletBalance">₹150</span>
        <button class="add-btn" id="addMoneyBtn">Add Money</button>
      </div>
    </div>

    <div class="divider"></div>

    <div class="list-item" onclick="toggleDropdown('question')">
      <span>Have a question?</span>
      <i class="fa-solid fa-chevron-right"></i>
    </div>
    <div class="dropdown-content" id="question">
      <h3><b>What is Stitch It Cash</b></h3>
      <p>Stitch It cash is given by us as part of our customer experience programs.
        It is redeemable across all categories and is valid for 1 year from date of issue.
      </p>

    </div>

    <div class="wallet-section">

      <div class="list-item" onclick="toggleDropdown('activity')">
        <span>Wallet activity</span>
        <i class="fa-solid fa-chevron-right arrow-icon"></i>
      </div>

      <div class="dropdown-content" id="activity">

        <!-- CREDIT EXAMPLE -->
        <div class="wallet-row success">
          <i class="fa-solid fa-gift icon"></i>
          <span class="title">Referral Bonus</span>
          <span class="amount">+100</span>
        </div>

        <!-- CREDIT -->
        <div class="wallet-row success">
          <i class="fa-solid fa-check icon"></i>
          <span class="title">Money Added</span>
          <span class="amount">+300</span>
        </div>

        <!-- DEBIT EXAMPLE -->
        <div class="wallet-row danger">
          <i class="fa-solid fa-bag-shopping icon"></i>
          <span class="title">Paid for Order #12345</span>
          <span class="amount">-250</span>
        </div>

      </div>
    </div>


    <div class="divider"></div>
  </div>

  <!-- Modal -->
  <div class="modal-overlay" id="moneyModal">
    <div class="modal">
      <button class="close-modal" id="closeModal">&times;</button>
      <h3>Add Money</h3>

      <label>Enter Amount</label>
      <input type="number" id="amountInput" placeholder="Enter amount (₹)" min="1">

      <div class="tab-buttons">
        <button id="upiTab" class="active">UPI</button>
        <button id="cardTab">Card</button>
      </div>

      <!-- UPI -->
      <div id="upiContent" class="tab-content active">
        <label>Enter UPI ID</label>
        <input type="text" id="upiInput" placeholder="example@upi">
        <button class="verify-btn" onclick="verifyUpi()">Verify & Pay</button>
      </div>

      <!-- Card -->
      <div id="cardContent" class="tab-content">
        <label>Card Number</label>
        <input type="text" maxlength="16" placeholder="1234 5678 9012 3456">
        <label>Expiry Date</label>
        <input type="text" placeholder="MM/YY">
        <label>CVV</label>
        <input type="password" maxlength="3" placeholder="123">
        <label>Card Holder Name</label>
        <input type="text" placeholder="Enter name">
        <button class="verify-btn" onclick="payCard()">Pay Now</button>
      </div>
    </div>
  </div>

  <script>
    const modal = document.getElementById('moneyModal');
    const addBtn = document.getElementById('addMoneyBtn');
    const closeModal = document.getElementById('closeModal');
    const walletBalance = document.getElementById('walletBalance');

    addBtn.onclick = () => modal.style.display = 'flex';
    closeModal.onclick = () => modal.style.display = 'none';
    window.onclick = (e) => {
      if (e.target === modal) modal.style.display = 'none';
    }

    const upiTab = document.getElementById('upiTab');
    const cardTab = document.getElementById('cardTab');
    const upiContent = document.getElementById('upiContent');
    const cardContent = document.getElementById('cardContent');

    upiTab.onclick = () => {
      upiTab.classList.add('active');
      cardTab.classList.remove('active');
      upiContent.classList.add('active');
      cardContent.classList.remove('active');
    };

    cardTab.onclick = () => {
      cardTab.classList.add('active');
      upiTab.classList.remove('active');
      cardContent.classList.add('active');
      upiContent.classList.remove('active');
    };

    function verifyUpi() {
      const upi = document.getElementById('upiInput').value.trim();
      const amount = parseFloat(document.getElementById('amountInput').value);
      if (upi === '' || !upi.includes('@')) {
        alert('Please enter a valid UPI ID');
      } else if (!amount || amount <= 0) {
        alert('Please enter a valid amount');
      } else {
        alert(`₹${amount} added successfully via UPI!`);
        updateWallet(amount);
        modal.style.display = 'none';
      }
    }

    function payCard() {
      const amount = parseFloat(document.getElementById('amountInput').value);
      if (!amount || amount <= 0) {
        alert('Please enter a valid amount');
      } else {
        alert(`₹${amount} added successfully via Card!`);
        updateWallet(amount);
        modal.style.display = 'none';
      }
    }

    function updateWallet(amount) {
      const current = parseFloat(walletBalance.textContent.replace('₹', ''));
      const newTotal = current + amount;
      walletBalance.textContent = `₹${newTotal}`;
    }

    function toggleDropdown(id) {
      const content = document.getElementById(id);
      content.classList.toggle('active');
      content.previousElementSibling.classList.toggle('active');
    }
  </script>
  <script>
    function toggleDropdown(id) {
      var content = document.getElementById(id);
      var arrow = document.querySelector(".arrow-icon");

      if (content.style.display === "block") {
        content.style.display = "none";
        arrow.style.transform = "rotate(0deg)";
      } else {
        content.style.display = "block";
        arrow.style.transform = "rotate(90deg)";
      }
    }
  </script>

</body>

</html>