<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
    <title>Measurements - Stitch It</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        /* ===== Base ===== */
        body {
            font-family: sans-serif;
            background: #f6f6f6;
            margin: 0;
            padding: 100px 20px;
            display: flex;
            justify-content: center;
        }

        /* Header layout */
        .header-top {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            flex-wrap: wrap;
            gap: 10px;
        }

        .measurement-header h2 {
            font-size: 1.8rem;
            color: #222;
            margin: 0;
        }

        /* Image style */
        .measurement-img {
            width: 30px;
            height: auto;
            object-fit: contain;
        }

        /* Responsive for mobile */
        @media (max-width: 768px) {
            .measurement-img {
                width: 35px;
                margin-top: 10px;
            }

            .measurement-header h2 {
                font-size: 1.4rem;
            }
        }

        /* ===== Back Icon Styles ===== */
        .back-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #fff;
            color: #333;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            transition: 0.3s ease;
            margin-bottom: 30px;
            margin-top: -50px;
        }

        .back-icon i {
            font-size: 1.2rem;
        }

        .back-icon:hover {
            background: #00897B;
            color: #fff;
        }

        /* ===== Responsive Adjustments ===== */
        @media (max-width: 768px) {
            .back-icon {
                width: 36px;
                height: 36px;
                margin-bottom: 20px;
                margin-top: -20px;

            }

            .back-icon i {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .back-icon {
                width: 32px;
                height: 32px;
                margin-bottom: 15px;
                margin-top: -20px;

            }

            .back-icon i {
                font-size: 0.9rem;
            }
        }


        .measurement-container {
            max-width: 1000px;
            width: 100%;
        }

        /* ===== Header ===== */
        .measurement-header {
            margin-bottom: 30px;
        }

        .measurement-header h2 {
            font-size: 1.8rem;
            color: #222;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
        }

        .measurement-header h2 i {
            color: #00897B;
            font-size: 1.6rem;
        }

        .measurement-header p {
            margin-top: 8px;
            color: #555;
            font-size: 1rem;
        }

        /* ===== Card Grid ===== */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        /* ===== Card ===== */
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 50px;
            transition: 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-3px);
            background: #00897B;
            color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }



        .card h3 {
            font-size: 1.5rem;
            margin: 0 0 10px;
            font-weight: 500;
        }

        .card p {
            font-size: 0.9rem;
            color: inherit;
            margin-bottom: 20px;
            flex: 1;
            line-height: 30px;
        }

        /* ===== Button ===== */
        .card button {
            align-self: end;
            border: 1.5px solid #5C2D91;
            background: #fff;
            color: #5C2D91;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .card button:hover {
            background: #5C2D91;
            color: #fff;
        }

        .card.active button {
            background: #fff;
            color: #5C2D91;
        }

        .card.active button:hover {
            background: #5C2D91;
            color: #fff;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            body {
                padding: 25px 15px;
            }

            .measurement-header h2 {
                font-size: 1.4rem;
            }

            .measurement-header p {
                font-size: 0.9rem;
            }

            .card {
                padding: 20px;
            }

            .card h3 {
                font-size: 1rem;
            }

            .card p {
                font-size: 0.85rem;
            }

            .card-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .card-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Back Icon -->
    <div class="back-icon" onclick="window.history.back()">
        <i class="fas fa-arrow-left"></i>
    </div>

    <div class="measurement-container">
        <!-- Header -->
        <div class="measurement-header">
            <div class="header-top">
                <img src='{{url("site/assets/image/measurement.png")}}' alt="Measurement Illustration" class="measurement-img">

                <h2>Measurements</h2>
            </div>
            <p>Get ready to ensure your clothes fit like a glove!</p>
        </div>



        <!-- Card Grid -->
        <div class="card-grid">
            <div class="card">
                <h3>Get Measured at Home by a Tailor</h3>
                <p>You can now get measured by a tailor of a specific gender at home.</p>
                <button onclick="window.location.href='{{route('garmentDetails')}}'">Continue</button>
            </div>

            <div class="card active">
                <h3>Manual Measurement</h3>
                <p>Let’s go and enter your body measurements by yourself and save it.</p>
                <button onclick="window.location.href='{{route('manualMeasurement')}}'">Continue</button>
            </div>

            <div class="card">
                <h3>Fit by Sample Clothing</h3>
                <p>Send us your best-fitting item, and we’ll match the size and cut accordingly.</p>
                <button onclick="window.location.href='{{route('fitSampleCloth')}}'">Continue</button>
            </div>

            <div class="card">
                <h3>Provide Alteration Instructions</h3>
                <p>Just share specific alteration details, no need to enter full body measurements.</p>
                <button onclick="window.location.href='{{route('alterationInstruction')}}'">Continue</button>
            </div>
        </div>
    </div>
</body>

</html>