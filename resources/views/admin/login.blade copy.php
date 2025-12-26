<link href='{{url("admin/assets/css/main.css")}}' rel="stylesheet">
<div class="login-wrapper">
    <div class="login-left">
        <img src='{{url("admin/assets/images/logo/logo.png")}}' class="logo" alt="Stitch It Logo">

        <h2 style="text-align: center;">Log in</h2>

        <form>
            <label>Email Address</label>
            <input type="email" placeholder="example@gmail.com">

            <label>Password</label>
            <div class="password-box">
                <input type="password" id="password" placeholder="**********">
                <span class="toggle-eye" onclick="togglePassword()">
                    <i id="eyeIcon" class="ri-eye-off-line"></i>
                </span>
            </div>


            <div class="remember-row">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Reset Password?</a>
            </div>

            <label>Job Role</label>
            <select>
                <option>Studio Manager</option>
                <option>Master Tailor</option>
                <option>Receptionist</option>
            </select>

            <button type="submit" class="login-btn">Log in</button>
        </form>

        <p class="new">Don't have an account yet? <a href="#" style="color: #11776D;">New Account</a></p>
    </div>

    <div class="login-right">
        <img src='{{url("admin/assets/images/bg/bg1.png")}}' class="hero-img" alt="Illustration">
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

<script>
function togglePassword() {
    const pass = document.getElementById("password");
    const icon = document.getElementById("eyeIcon");

    if (pass.type === "password") {
        pass.type = "text";
        icon.className = "ri-eye-line"; // open eye
    } else {
        pass.type = "password";
        icon.className = "ri-eye-off-line"; // closed eye
    }
}
</script>
