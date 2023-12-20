<ul class="metismenu" id="menu">
    <li>
        <a class="has-arrow" href="/home" aria-expanded="false">
            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
        </a>
    </li>
    @if (in_array(Auth::user()->role, ['super']))
    <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-user menu-icon"></i><span class="nav-text">User Data</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="/user">View Data</a></li>
            <li><a href="#">Create New</a></li>
        </ul>
    </li>
    @endif
    @if (in_array(Auth::user()->role, ['super', 'ehs']))
    <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-shield menu-icon"></i><span class="nav-text">Characteristic</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="/characteristic">View Data</a></li>
            <li><a href="#">Create New</a></li>
        </ul>
    </li>
    @endif
    <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-chemistry menu-icon"></i><span class="nav-text">Master Bahan Kimia</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="/master_bk">View Data</a></li>
            <li><a href="#">Create New</a></li>
        </ul>
    </li>
    @if (in_array(Auth::user()->role, ['super', 'waho', 'purchasing']))
    <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-list menu-icon"></i><span class="nav-text">Lembar Data Keselamatan</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="#">View Data</a></li>
            <li><a href="#">Create New</a></li>
        </ul>
    </li>
    @endif
    @if (in_array(Auth::user()->role, ['super', 'waho', 'ehs']))
    <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-location-pin menu-icon"></i><span class="nav-text">Locations</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="#">View Data</a></li>
            <li><a href="#">Create New</a></li>
        </ul>
    </li>
    @endif
</ul>
