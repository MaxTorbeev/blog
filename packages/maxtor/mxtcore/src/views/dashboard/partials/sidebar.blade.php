<nav class="sidebar">
    <div class="sidebar_logo">
        MXTCore
    </div>
    <ul class="sidebar_menu">
        @each('mxtcore::dashboard.partials.sidebar.menu', $dashboardMenu, 'item', '')
    </ul>
</nav>