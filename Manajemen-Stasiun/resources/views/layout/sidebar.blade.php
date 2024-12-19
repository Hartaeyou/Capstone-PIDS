<aside id="sidebar">
    <div class="d-flex ">
        <a href="#" class="btn" id="toggle-btn">
            <img src="{{ URL('img/LogoBuddy.png') }}" width="32px" height="32px"alt="">
        </a>
        <div class="sidebar-logo">
            <a href="/dashboardUser" >Manajemen Stasiun</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="/showStasiun" class="sidebar-link">
                <img src="{{ URL('img/icon/Vector.svg') }}" alt="" srcset="">
                <span>Stasiun</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="/rute" class="sidebar-link">
            <i class="fa-solid fa-route"></i>
                <span>Rute</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="/kereta" class="sidebar-link">
            <i class="fa-solid fa-train"></i>
                <span>Kereta</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
            <a href="/logout" class="sidebar-link">
                <img src="{{ URL('img/icon/Logout.svg') }}" alt="" srcset="">   
                <span>LogOut</span>
            </a>
    </div>
</aside>
