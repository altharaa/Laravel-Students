<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">altharaa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto mw-100 sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('/dashboard/student') ? 'active' : ''}}" aria-current="page" href="/dashboard">
                        <i class="bi bi-house-fill" style="color: black ;"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('/dashboard/student') ? 'active' : ''}}" aria-current="page" href="/dashboard/student">
                        <i class="bi bi-table" style="color: black;"></i>
                        Students
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard/grade">
                        <i class="bi bi-table" style="color: black;"></i>
                        Grades
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>