<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full sidenav-active-rounded">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img src="newTemp/app-assets/images/logo/materialize-logo.png" alt="materialize logo" /><span class="logo-text hide-on-med-and-down">Materialize</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">

        <li class="navigation-header"><a class="navigation-header-text">M3U Editor</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan @if (\Request::is('test')) active  @endif" href="test"><i class="material-icons">format_list_bulleted</i><span class="menu-title" data-i18n="Playlists">Playlists</span>
                {{--                    <span class="badge new badge pill pink accent-2 float-right mr-2">5</span>--}}
            </a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan " href="{{url('epg')}}"><i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Chat">EPG</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan " href="app-todo.html"><i class="material-icons">mail_outline</i><span class="menu-title" data-i18n="ToDo">Support</span></a>
        </li>

        <li class="bold @if (\Request::is('sub') || \Request::is('payment-method') || \Request::is('invoice') || \Request::is('detailed-invoice')) active  @endif"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">receipt</i><span class="menu-title" data-i18n="Invoice">Subscription</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li ><a href="sub" class="@if (\Request::is('sub')) active  @endif"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Invoice List">Subscribe</span></a>
                    </li>
                    <li><a href="payment-method" class="@if (\Request::is('payment-method')) active  @endif"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Invoice View">Payment methods</span></a>
                    </li>
                    <li><a href="invoice" class="@if (\Request::is('invoice') || \Request::is('detailed-invoice')) active  @endif"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Invoice Edit">Invoices</span></a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
