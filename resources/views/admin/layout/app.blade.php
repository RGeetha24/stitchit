<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>AlterHub</title>

    <link href='{{url("admin/assets/css/main.css")}}' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @yield('head-scripts')
    @yield('styles')
</head>
<body>
@include('admin.layout.partials.sidebar')


@yield('content')


<!-- Sidebar Toggle Script -->
<script>
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("sidebar-open");
        });
    }
</script>


<!-- Pagination Script -->
<script>
    let rowsPerPage = 10;
    let table = document.querySelector("table tbody");
    let pagination = document.getElementById("pagination");

    if (table && pagination) {
        let rows = table.querySelectorAll("tr");

        function displayTable(page) {
            let start = (page - 1) * rowsPerPage;
            let end = start + rowsPerPage;

            rows.forEach((row, index) => {
                row.style.display = (index >= start && index < end) ? "" : "none";
            });
        }

        function setupPagination() {
            let pageCount = Math.ceil(rows.length / rowsPerPage);

            pagination.innerHTML = "";
            for (let i = 1; i <= pageCount; i++) {
                let btn = document.createElement("button");
                btn.innerText = i;

                btn.addEventListener("click", function() {
                    document.querySelectorAll(".pagination button").forEach(b => b.classList.remove("active"));
                    this.classList.add("active");
                    displayTable(i);
                });

                if (i === 1) btn.classList.add("active");
                pagination.appendChild(btn);
            }
        }

        displayTable(1);
        setupPagination();
    }
</script>


<!-- 3 Dots Dropdown Script -->
<script>
    const dotsBtn = document.getElementById("dotsMenuBtn");
    const dotsDropdown = document.getElementById("dotsDropdown");

    if (dotsBtn && dotsDropdown) {
        dotsBtn.addEventListener("click", () => {
            dotsDropdown.style.display =
                dotsDropdown.style.display === "block" ? "none" : "block";
        });

        // close on outside click
        document.addEventListener("click", (e) => {
            if (!dotsBtn.contains(e.target) && !dotsDropdown.contains(e.target)) {
                dotsDropdown.style.display = "none";
            }
        });
    }
</script>
<script>
    const userInfo = document.getElementById('userInfo');
    const userDropdown = document.getElementById('userDropdown');

    if (userInfo && userDropdown) {
        userInfo.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.style.display =
                userDropdown.style.display === "block" ? "none" : "block";
        });

        document.addEventListener('click', function() {
            userDropdown.style.display = "none";
        });
    }
</script>

@yield('scripts')
</body>
</html>