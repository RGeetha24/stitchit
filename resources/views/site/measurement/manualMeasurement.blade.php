<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
    <title>Measurements - Stitch It</title>
    <link rel="stylesheet" href='{{url("site/assets/css/style.css")}}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .measurement-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 15px;
            position: relative;
        }

        .back-button {
            width: 40px;
            height: 40px;
            background: #ffffffff;
            color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 25px;
            position: absolute;
            left: 0;
            top: 20px;
            transform: translateY(-10px);
            /* slight upward */
        }

        .header-left {
            margin-left: 55px;
            /* space so heading doesn't overlap icon */
        }

        .back-button i {
            color: #000000ff;
        }
    </style>
</head>

<body>

    <section class="measurement-section">

        <div class="measurement-container">
            <div class="measurement-header">

                <!-- BACK BUTTON ON TOP -->
                <div class="back-button" onclick="window.history.back()">
                    <i class="fas fa-arrow-left"></i>
                </div>

                <div class="header-left">
                    <div class="header-text">
                        <h2>Manual Measurements</h2>
                        <p>To ensure the perfect fit, please enter the following measurements.</p>
                    </div>
                </div>

                <button class="video-btn">Watch Tutorial Video →</button>

            </div>




            <!-- Measurement Grid -->
            <div class="measurement-grid">

                <!-- Left Column 1 -->
                <div class="measure-column">
                    <label>Neck</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Shoulder</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Front Bodice</label>
                    <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>

                    <label>Upper Bust</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Back Bodice</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>

                </div>

                <!-- Left Column 2 -->
                <div class="measure-column">
                    <label>Bust</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Lower Bust</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Waist</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Full Arm Length</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Arm Size</label>   <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>

                </div>

                <!-- Center Image -->
                <div class="measure-image">
                    <img src='{{url("site/assets/image/Group 1000002557.png")}}' alt="Measurement Diagram">
                </div>

                <!-- Right Column 1 -->
                <div class="measure-column">
                    <label>Half Arm Length</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Wrist</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Thigh</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Knee</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Waist to Ankle Length</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>

                </div>

                <!-- Right Column 2 -->
                <div class="measure-column">
                    <label>Inside Leg Length</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Hip to Knee Length</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Ankle</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Hip to Ankle Length</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Arm Hole</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                    <label>Hip</label>
                       <select
                        class="measure-select"
                        style="
        width: 70%;
        padding: 10px;
        font-size: 14px;

        /* Remove default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Custom arrow */
        background-image: url('.site/assets/image/icon/arrow.png');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;

        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
    ">
                        <option value="">Select</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            echo "<option value='{$i}'>{$i}\"</option>";
                        }
                        ?>
                    </select>
                </div>

            </div>



            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="edit-btn" onclick="window.location.href='edit-measurement.php'">Edit Measurements</button>
                <button class="save-btn" onclick="window.location.href='{{route('checkout')}}'">Save Measurements</button>
            </div>


        </div>
    </section>
    <script>
        const selects = document.querySelectorAll('.measure-select');

        selects.forEach(select => {
            for (let i = 1; i <= 50; i++) {
                let option = document.createElement("option");
                option.value = i;
                option.textContent = i + '"';
                select.appendChild(option);
            }
        });
    </script>

</body>

</html>