<div class="account-page-body">
    <ul>
        <li class="pt-3">
            <a data-bs-toggle="offcanvas" href="#account-settings" role="button" class="text-dark">
                <div class="me-3 icon">
                    <i class="fa-regular fa-address-card fa-lg "></i>
                </div>
                <div class="d-flex align-items-center justify-content-between w-100 border-bottom  pb-3">
                    <h6>My Profile</h6>
                    <i class="fas fa-chevron-right fa-lg"></i>
                </div>
            </a>
        </li>
        <li class="pt-3">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();  document.getElementById('logout-form').submit();"
                class="  text-dark">
                <div class="me-3 icon">
                    <i class="fa-solid fa-right-from-bracket  fa-lg"></i>

                </div>
                <div class="d-flex align-items-center justify-content-between w-100 border-bottom  pb-3">
                    <h6>Log out</h6>
                    <i class="fas fa-chevron-right fa-lg"></i>
                </div>
            </a>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
