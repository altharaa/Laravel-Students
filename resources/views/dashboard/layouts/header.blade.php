<header class="navbar sticky-top bg-primary flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white bg-primary" href="#">altharaa</a>

    <form action="/dashboard/student">
        <div>
            <input class="form-control w-100 rounded-0 border-0 bg-primary" type="text" placeholder="Search" name="search" aria-label="Search" value="{{request('search')}}">
        </div>
    </form>

    <div class="navbar-nav">
        <div class="navbar-item text-nowrap">
            <div class="nav-link px-3 " href="#">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link px">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>