<li class="nav-item">
    <a href="{{ route('home.edit') }}"
    class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
        <i class="fa fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('blog_list_page.edit') }}"
    class="nav-link {{ Request::is('blog_list_page*') ? 'active' : '' }}">
        <i class="fa fa-home"></i>
        <p>Blog Listing Page</p>
    </a>
</li>

<li class="nav-item {{ Request::is('*marketplace*') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Marketplace
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" @if(Request::is('*marketplace*')) style="display: block;" @endif>
        <li class="nav-item">
            <a href="{{ route('marketplace.edit', 'forex') }}" class="nav-link {{ Request::is('*forex') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Forex</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('marketplace.edit', 'indices') }}" class="nav-link {{ Request::is('*indices') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Indices</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('marketplace.edit', 'shares') }}" class="nav-link {{ Request::is('*shares') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Shares</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('marketplace.edit', 'commodities_energies') }}" class="nav-link {{ Request::is('*commodities_energies') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">Commodities & Energies</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {{ Request::is('*trading*') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Trading
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" @if(Request::is('*trading*')) style="display: block;" @endif>
        <li class="nav-item">
            <a href="{{ route('trading.edit', 'account_types') }}" class="nav-link {{ Request::is('*account_types') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Account Types</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('trading.edit', 'payment_methods') }}" class="nav-link {{ Request::is('*payment_methods') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Payment Methods</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('trading.edit', 'withdrawals') }}" class="nav-link {{ Request::is('*withdrawals') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Withdrawals</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('trading.edit', 'deposits') }}" class="nav-link {{ Request::is('*deposits') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Deposits</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {{ Request::is('*partner*') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Partner
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" @if(Request::is('*partner*')) style="display: block;" @endif>
        <li class="nav-item">
            <a href="{{ route('partner.edit', 'affiliate') }}" class="nav-link {{ Request::is('*affiliate') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Affiliates</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('partner.edit', 'white_label') }}" class="nav-link {{ Request::is('*white_label') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>White Label</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {{ Request::is('*support*') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Support
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <!-- 'get_help', 'faq', 'about_us', 'legal_documents', 'subscribe', 'contact_us' -->
    <ul class="nav nav-treeview" @if(Request::is('*support*')) style="display: block;" @endif>
        <li class="nav-item">
            <a href="{{ route('support.edit', 'get_help') }}" class="nav-link {{ Request::is('*get_help') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Get Help</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('support.edit', 'faq') }}" class="nav-link {{ Request::is('*faq') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>FAQ</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('support.edit', 'about_us') }}" class="nav-link {{ Request::is('*about_us') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>About Us</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('support.edit', 'legal_documents') }}" class="nav-link {{ Request::is('*legal_documents') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Legal Documents</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('support.edit', 'subscribe_newsletter') }}" class="nav-link {{ Request::is('*subscribe_newsletter') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Subscribe</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('support.edit', 'contact_us') }}" class="nav-link {{ Request::is('*contact_us') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact Us</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {{ Request::is('*layout_part*') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Layout Parts
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" @if(Request::is('*layout_part*')) style="display: block;" @endif>
        <li class="nav-item">
            <a href="{{ route('layout_part.edit', 'header') }}" class="nav-link {{ Request::is('*header') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Header</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('layout_part.edit', 'pre_footer') }}" class="nav-link {{ Request::is('*pre_footer') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pre Footer</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('layout_part.edit', 'footer') }}" class="nav-link {{ Request::is('*layout_part/footer') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Footer</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('departments.index') }}"
    class="nav-link {{ Request::is('departments*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>Departments</p>
    </a>
</li>

<li class="nav-item {{ Request::is('*user_requests*') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
            User Requests
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" @if(Request::is('*user_requests*')) style="display: block;" @endif>
        <li class="nav-item">
            <a href="{{ route('user_requests.index') }}?type=deposit" class="nav-link {{ Request::is('*user_requests*') && Request::get('type') == 'deposit' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Deposit</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user_requests.index') }}?type=withdrawal" class="nav-link {{ Request::is('*user_requests*') && Request::get('type') == 'withdrawal' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Withdrawal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user_requests.index') }}?type=subscribe_newsletter" class="nav-link {{ Request::is('*user_requests*') && Request::get('type') == 'subscribe_newsletter' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Subscribe Newsletter</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user_requests.index') }}?type=contact_us" class="nav-link {{ Request::is('*user_requests*') && Request::get('type') == 'contact_us' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact us</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('data_lists.index') }}" class="nav-link {{ Request::is('data_lists*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>Data Lists</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('account_types.index') }}" class="nav-link {{ Request::is('account_types*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>Account Types</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('trading_options.index') }}"
    class="nav-link {{ Request::is('trading_options*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>Trading Options</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('testimonials.index') }}"
    class="nav-link {{ Request::is('testimonials*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>Testimonials</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('learning_videos.index') }}"
    class="nav-link {{ Request::is('learning_videos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>Learning Videos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('legal_documents.index') }}"
    class="nav-link {{ Request::is('legal_documents*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>Legal Documents</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('payment_methods.index') }}"
    class="nav-link {{ Request::is('payment_methods*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>Payment Method</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('blogs.index') }}"
    class="nav-link {{ Request::is('blogs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>Blogs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('faqs.index') }}" class="nav-link {{ Request::is('faqs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>Faqs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('white_labels.index') }}" class="nav-link {{ Request::is('white_labels*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-table"></i>
        <p>White Labels</p>
    </a>
</li>
