<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('cars.index') }}" class="nav-link {{ Request::is('cars*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-car"></i>
        <p>Cars</p>
    </a>
</li>

@role('admin')
<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Users</p>
    </a>
</li>
@endrole

<li class="nav-item">
    <a href="{{ route('calculationRents.index') }}" class="nav-link {{ Request::is('calculationRents*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-calculator"></i>
        <p>Calculation Rents</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('rents.index') }}" class="nav-link {{ Request::is('rents*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-box"></i>
        <p>Rents</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('informasiUsers.edit', Auth::user()->id) }}" class="nav-link {{ Request::is('informasiUsers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-info"></i>
        <p>Informasi Users</p>
    </a>
</li>
