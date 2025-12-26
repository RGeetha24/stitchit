<link href='{{url("admin/assets/css/main.css")}}' rel="stylesheet">
<div class="login-wrapper">
    <div class="login-left">
        <img src='{{url("admin/assets/images/logo/logo.png")}}' class="logo" alt="Stitch It Logo">

        <h2 style="text-align: center;">Log in</h2>

        @if ($errors->any())
            <div class="alert alert-danger" style="margin-bottom: 10px; color:#b91c1c;">
                <ul style="margin:0; padding-left:18px; font-size:13px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required>

            <label>Password</label>
            <div class="password-box">
                <input type="password" id="password" name="password" placeholder="**********" required>
                <span class="toggle-eye" onclick="togglePassword()">
                    <i id="eyeIcon" class="ri-eye-off-line"></i>
                </span>
            </div>

            <button type="submit" class="login-btn">Log in</button>
        </form>

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
