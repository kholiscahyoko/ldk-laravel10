<ul class="metismenu" id="menu">
    <li>
        <a href="/" aria-expanded="false">
            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
        </a>
    </li>
    @if (in_array(Auth::user()->role, ['super']))
    <li>
        <a href="/user" aria-expanded="false">
            <i class="icon-user menu-icon"></i><span class="nav-text">User Data</span>
        </a>
    </li>
    @endif
    @if (in_array(Auth::user()->role, ['super', 'ehs']))
    <li>
        <a href="/characteristic" aria-expanded="false">
            <i class="icon-shield menu-icon"></i><span class="nav-text">Characteristic</span>
        </a>
    </li>
    @endif
    <li>
        <a href="/master_bk" aria-expanded="false">
            <i class="icon-chemistry menu-icon"></i><span class="nav-text">Master Bahan Kimia</span>
        </a>
    </li>
    @if (in_array(Auth::user()->role, ['super', 'waho', 'purchasing']))
    <li>
        <a href="/ldk" aria-expanded="false">
            <i class="icon-list menu-icon"></i><span class="nav-text">Lembar Data Keselamatan</span>
        </a>
    </li>
    @endif
    @if (in_array(Auth::user()->role, ['super', 'waho', 'ehs']))
    <li>
        <a href="/location" aria-expanded="false">
            <i class="icon-location-pin menu-icon"></i><span class="nav-text">Locations</span>
        </a>
    </li>
    @endif
</ul>
