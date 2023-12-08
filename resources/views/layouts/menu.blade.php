<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('cashier') }}" class="nav-link {{ Request::is('cashier') ? 'active' : '' }}">
        <i class="nav-icon far fa-chart-bar"></i>
        <p>Cashier</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('transactions') }}" class="nav-link {{ Request::is('transactions') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-pie "></i>
        <p>Transactions</p>
    </a>
</li>
{{-- 
<li class="nav-item">
    <a href="{{ route('address_districts.index') }}" class="nav-link {{ Request::is('address_districts*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Address Districts</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('address_provinces.index') }}" class="nav-link {{ Request::is('address_provinces*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Address Provinces</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('address_neighborhoods.index') }}" class="nav-link {{ Request::is('address_neighborhoods*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Address Neighborhoods</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('companies.index') }}" class="nav-link {{ Request::is('companies*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Companies</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('customers.index') }}" class="nav-link {{ Request::is('customers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Customers</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('customer_banks.index') }}" class="nav-link {{ Request::is('customer_banks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Customer Banks</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('customer_temp_readings.index') }}" class="nav-link {{ Request::is('customer_temp_readings*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Customer Temp Readings</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('invoice_category_infos.index') }}" class="nav-link {{ Request::is('invoice_category_infos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Invoice Category Infos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('invoice_contacts.index') }}" class="nav-link {{ Request::is('invoice_contacts*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Invoice Contacts</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('invoice_infos.index') }}" class="nav-link {{ Request::is('invoice_infos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Invoice Infos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('login_fingers.index') }}" class="nav-link {{ Request::is('login_fingers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Login Fingers</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('messages.index') }}" class="nav-link {{ Request::is('messages*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Messages</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('message_balances.index') }}" class="nav-link {{ Request::is('message_balances*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Message Balances</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('payments.index') }}" class="nav-link {{ Request::is('payments*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Payments</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('payment_types.index') }}" class="nav-link {{ Request::is('payment_types*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Payment Types</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('payment_waters.index') }}" class="nav-link {{ Request::is('payment_waters*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Payment Waters</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('products.index') }}" class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Products</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tariffs.index') }}" class="nav-link {{ Request::is('tariffs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tariffs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tariff_scales.index') }}" class="nav-link {{ Request::is('tariff_scales*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tariff Scales</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('taxes.index') }}" class="nav-link {{ Request::is('taxes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Taxes</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('version_dbs.index') }}" class="nav-link {{ Request::is('version_dbs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Version Dbs</p>
    </a>
</li> --}}
