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
            <form id="measurementForm">
            @csrf
            <div class="measurement-grid">

                <!-- Left Column 1 -->
                <div class="measure-column">
                    <label>Neck</label>
                       <select
                        name="neck"
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
                <button type="button" class="edit-btn" onclick="window.history.back()">Go Back</button>
                <button type="button" id="saveMeasurementBtn" class="save-btn">Save Measurements</button>
            </div>
            </form>


        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('Page loaded');
            
            // Populate all selects with 0.5 increment options
            $('.measure-select').each(function() {
                const $select = $(this);
                $select.empty(); // Clear existing options
                $select.append('<option value="">Select</option>');
                
                // Generate options from 1 to 50 with 0.5 increments
                for (let i = 1; i <= 50; i += 0.5) {
                    $select.append(`<option value="${i}">${i}"</option>`);
                }
            });
            
            // Add name attributes to all select fields based on their labels
            const fieldMapping = {
                'Neck': 'neck',
                'Shoulder': 'shoulder',
                'Front Bodice': 'front_bodice',
                'Upper Bust': 'upper_bust',
                'Back Bodice': 'back_bodice',
                'Bust': 'bust',
                'Lower Bust': 'lower_bust',
                'Waist': 'waist',
                'Full Arm Length': 'full_arm_length',
                'Arm Size': 'arm_size',
                'Half Arm Length': 'half_arm_length',
                'Wrist': 'wrist',
                'Thigh': 'thigh',
                'Knee': 'knee',
                'Waist to Ankle Length': 'waist_to_ankle_length',
                'Inside Leg Length': 'inside_leg_length',
                'Hip to Knee Length': 'hip_to_knee_length',
                'Ankle': 'ankle',
                'Hip to Ankle Length': 'hip_to_ankle_length',
                'Arm Hole': 'arm_hole',
                'Hip': 'hip'
            };

            // Assign name attributes to selects based on their preceding label
            $('.measure-column').each(function() {
                $(this).find('label').each(function(index) {
                    const labelText = $(this).text().trim();
                    const fieldName = fieldMapping[labelText];
                    if (fieldName) {
                        $(this).next('select').attr('name', fieldName);
                    }
                });
            });

            console.log('Name attributes assigned & options populated with 0.5 increments');

            // Load existing measurements if available
            @if(isset($defaultMeasurement) && $defaultMeasurement)
                console.log('Loading saved measurements...');
                const measurements = @json($defaultMeasurement);
                const measurementFields = ['neck', 'shoulder', 'front_bodice', 'upper_bust', 'back_bodice', 
                    'bust', 'lower_bust', 'waist', 'full_arm_length', 'arm_size', 'half_arm_length', 
                    'wrist', 'thigh', 'knee', 'waist_to_ankle_length', 'inside_leg_length', 
                    'hip_to_knee_length', 'ankle', 'hip_to_ankle_length', 'arm_hole', 'hip'];
                
                let loadedCount = 0;
                // Wait a bit to ensure name attributes are set
                setTimeout(function() {
                    measurementFields.forEach(key => {
                        if (measurements[key] && measurements[key] !== null) {
                            const $select = $(`select[name="${key}"]`);
                            if ($select.length > 0) {
                                // Parse as number to match dropdown values (4.00 -> 4, 14.50 -> 14.5)
                                const numValue = parseFloat(measurements[key]);
                                $select.val(numValue);
                                loadedCount++;
                            }
                        }
                    });
                    console.log(`✓ Loaded ${loadedCount} measurements from "${measurements.measurement_name}"`);
                }, 100);
            @else
                console.log('No saved measurements found - please save your measurements first');
            @endif

            // Handle form submission
            $('#saveMeasurementBtn').click(function(e) {
                e.preventDefault();
                
                const $btn = $(this);
                $btn.prop('disabled', true).text('Saving...');

                const formData = new FormData($('#measurementForm')[0]);
                formData.append('is_default', 1);
                formData.append('measurement_name', 'My Measurements - ' + new Date().toLocaleDateString());

                $.ajax({
                    url: '{{ route("measurement.save") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        }
                    },
                    error: function(xhr) {
                        $btn.prop('disabled', false).text('Save Measurements');
                        
                        if (xhr.status === 401) {
                            alert('Please login to save measurements');
                            window.location.href = '{{ route("login") }}';
                        } else if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            let errorMsg = 'Please fix the following errors:\n';
                            Object.keys(errors).forEach(key => {
                                errorMsg += '- ' + errors[key][0] + '\n';
                            });
                            alert(errorMsg); 
                        } else {
                            alert('An error occurred. Please try again.');
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>