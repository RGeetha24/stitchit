<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #fff;
        color: #064c4c;
    }

    .feedback-wrapper {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .feedback-card {
        background: #fff;
        max-width: 800px;
        width: 100%;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .logo-area img {
        height: 55px;
    }

    .title {
        font-size: 24px;
        margin-top: 15px;
    }

    .subtitle {
        color: #666;
        font-size: 14px;
    }

    .divider {
        margin: 20px 0;
        border: none;
        border-bottom: 1px solid #e0e0e0;
    }

    .section-label {
        font-weight: bold;
        margin-bottom: 10px;
        display: block;
    }

    .emoji-rating {
        display: flex;
        justify-content: space-between;
        text-align: center;
        flex-wrap: wrap;
    }

    .emoji-rating div img {
        width: 60px;
        height: 60px;
    }

    .question-block {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 12px 0;
    }

    .question-block {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 15px 0;
    }

    .question-block label {
        font-size: 15px;
        font-weight: 500;
        width: 70%;
    }

    .star-rating span {
        font-size: 26px;
        cursor: pointer;
        color: #dcdcdc;
        /* Gray */
        margin-right: 4px;
    }

    .star-rating span.active {
        color: #f7c226;
        /* Yellow */
    }

    /* mobile */
    @media (max-width: 600px) {
        .question-block {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }

    .feedback-input {
        width: 100%;
        height: 140px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        resize: none;
        font-size: 14px;
        box-sizing: border-box;
        margin-top: 10px;
    }

    .btn-row {
        margin-top: 15px;
        display: flex;
        justify-content: space-between;
        /* LEFT + RIGHT */
        align-items: center;
    }

    .clear-btn {
        background: transparent;
        border: none;
        font-weight: bold;
        color: #444;
        cursor: pointer;
    }

    .submit-btn {
        background: #00695c;
        color: #fff;
        padding: 10px 28px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
    }

    /* MOBILE RESPONSIVE */
    @media (max-width: 600px) {
        .btn-row {
            flex-direction: column;
            gap: 12px;
            width: 100%;
        }

        .submit-btn {
            width: 100%;
        }

        .clear-btn {
            align-self: flex-start;
        }
    }
</style>

<div class="feedback-wrapper">
    <div class="feedback-card">

        <!-- LOGO -->
        <div class="logo">
            <a href="{{route('home')}}">
                <img src='{{url("site/assets/image/logo (2).png")}}' alt="Stitch It Logo">
            </a>
        </div>

        <!-- TITLE -->
        <h2 class="title">Customer Feedback Form</h2>
        <p class="subtitle">
            Thank you for choosing Stitch It! We'd love to hear about your experience with our alteration
            services. Your feedback helps us improve and serve you better.
        </p>
        <p style="color: red;">* Required</p>
        <hr class="divider">

        <!-- OVERALL RATING -->
        <label class="section-label">How would you rate your overall satisfaction with the service? <span>*</span></label>

        <div class="emoji-rating">
            <div>
                <img src='{{url("site/assets/image/icon/sad.png")}}' alt="">
                <p>Very Dissatisfied</p>
            </div>
            <div>
                <img src='{{url("site/assets/image/icon/fear.png")}}' alt="">
                <p>Dissatisfied</p>
            </div>
            <div>
                <img src='{{url("site/assets/image/icon/normal.png")}}' alt="">
                <p>Neutral</p>
            </div>
            <div>
                <img src='{{url("site/assets/image/icon/smile.png")}}' alt="">
                <p>Satisfied</p>
            </div>
            <div>
                <img src='{{url("site/assets/image/icon/love.png")}}' alt="">
                <p>Very Happy</p>
            </div>
        </div>

        <hr class="divider">

        <!-- STAR RATINGS -->
        <div class="question-block">
            <label>How would you rate the quality of alteration work? <span>*</span></label>
            <div class="star-rating" data-rating="0">
                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
            </div>
        </div>

        <div class="question-block">
            <label>How was the pickup and delivery service?</label>
            <div class="star-rating" data-rating="0">
                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
            </div>
        </div>

        <div class="question-block">
            <label>How would you rate the timeliness of delivery?</label>
            <div class="star-rating" data-rating="0">
                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
            </div>
        </div>

        <div class="question-block">
            <label>How was the service regarding communication and updates?</label>
            <div class="star-rating" data-rating="0">
                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
            </div>
        </div>



        <hr class="divider">
        <!-- FEEDBACK TEXT -->
        <label>Please share your overall feedback</label>
        <textarea class="feedback-input" placeholder="The service was very good..."></textarea>

        <!-- BUTTONS -->
        <div class="btn-row">
            <button class="clear-btn">CLEAR FORM</button>
            <button class="submit-btn">SUBMIT</button>
        </div>

    </div>
</div>
<script>
    document.querySelectorAll('.star-rating').forEach(function(starRating) {

        const stars = starRating.querySelectorAll('span');

        stars.forEach((star, index) => {

            // CLICK SELECT
            star.addEventListener('click', () => {
                starRating.setAttribute('data-rating', index + 1);

                stars.forEach((s, i) => {
                    s.classList.toggle('active', i <= index);
                });
            });

            // HOVER EFFECT (optional)
            star.addEventListener('mouseover', () => {
                stars.forEach((s, i) => {
                    s.classList.toggle('active', i <= index);
                });
            });

            // REMOVE HOVER & RESTORE SELECTED VALUE
            starRating.addEventListener('mouseleave', () => {
                const rating = parseInt(starRating.getAttribute('data-rating'));
                stars.forEach((s, i) => {
                    s.classList.toggle('active', i < rating);
                });
            });

        });

    });
</script>