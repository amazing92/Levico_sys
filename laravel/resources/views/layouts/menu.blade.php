<li class="nav-item {{ Request::is('labs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('labs.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Labs</span>
    </a>
</li>
<li class="nav-item {{ Request::is('mis*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('mis.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Mis</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('bds.index') }}"
       class="nav-link {{ Request::is('bds*') ? 'active' : '' }}">
        <p>Bds</p>
    </a>
</li>


