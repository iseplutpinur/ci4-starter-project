<aside class="main-sidebar <?= config('Application')->theme['sidebar']['border'] ? 'border-right' : '' ?> sidebar-<?= config('Application')->theme['sidebar']['type'] ?>-<?= config('Application')->theme['sidebar']['links']['bg'] ?> elevation-<?= config('Application')->theme['sidebar']['shadow'] ?>">
    <a href="<?= route_to('/') ?>" class="brand-link <?= !empty(config('Application')->theme['sidebar']['brand']['bg']) ? 'bg-' . config('Application')->theme['sidebar']['brand']['bg'] : '' ?>">
        <img src="<?= base_url(config('Application')->theme['sidebar']['brand']['logo']['icon']) ?>" class="brand-image img-circle elevation-<?= config('Application')->theme['sidebar']['brand']['logo']['shadow'] ?>" style="opacity: .8">
        <span class="brand-text"><?= config('Application')->theme['sidebar']['brand']['logo']['text'] ?></span>
    </a>
    <div class="sidebar">
        <?php if (config('Application')->theme['sidebar']['user']['visible']) { ?>
            <div class="user-panel d-flex">
                <div class="info">
                    <a href="<?= route_to('user-profile') ?>" class="d-block"><?= user()->full_name ?></a>
                    <small class="form-text text-muted"><?= user_string_role() ?></small>
                </div>
            </div>
        <?php } ?>
        <?php if (config('Application')->theme['sidebar']['search']) { ?>
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent <?= config('Application')->theme['sidebar']['compact'] ? 'nav-compact' : '' ?>" data-widget="treeview" role="menu" data-accordion="false">
                <?php {
                    $menu_rows = [];
                    $sidebar_route = isset($sidebar) ? $sidebar : uri_string();
                    foreach (menu() as $parent) {
                        if ($parent->active == '1') {
                            $childs = [];
                            $parent_active = false;
                            if (count($parent->children)) {
                                foreach ($parent->children as $child) {
                                    if ($child->active == '1') {
                                        $active = $child->route == $sidebar_route;
                                        if ($active) {
                                            $parent_active = true;
                                        }
                                        $childs[] = (object)[
                                            'active' => $active,
                                            'title' => $child->title,
                                            'icon' => $child->icon,
                                            'route' => $child->route,
                                        ];
                                    }
                                }
                            }

                            $active =  $parent->route == $sidebar_route;
                            $menu_rows[] = (object)[
                                'active' => $active || $parent_active,
                                'title' => $parent->title,
                                'icon' => $parent->icon,
                                'route' => $parent->route,
                                'children' => $childs
                            ];
                        }
                    }

                    $html = '';
                    foreach ($menu_rows as $parent) {
                        $open = $parent->active ? 'menu-open' : '';
                        $active = $parent->active ? 'active' : '';
                        $link = base_url($parent->route);

                        $html .= "<li class='nav-item has-treeview {$open}'>";
                        $html .= "<a href='{$link}' class='nav-link {$active}'>";
                        $html .= "<i class='nav-icon {$parent->icon}'></i>";
                        $html .= '<p>';
                        $html .= $parent->title;
                        if (count($parent->children)) {
                            $html .= "<i class='right fas fa-angle-left'></i>";
                        }
                        $html .= '</p>';
                        $html .= '</a>';
                        if (count($parent->children)) {
                            $html .= "<ul class='nav nav-treeview'>";
                            foreach ($parent->children as $child) {
                                $link_child = base_url($child->route);
                                $active_child = $child->active ? 'active' : '';
                                $html .= "<li class='nav-item has-treeview'>";
                                $html .= "<a href='{$link_child}'";
                                $html .= "class='nav-link {$active_child}'>";
                                $html .= "<i class='nav-icon {$child->icon}'></i>";
                                $html .= "<p>{$child->title}</p>";
                                $html .= '</a>';
                                $html .= '</li>';
                            }
                            $html .= '</ul>';
                        }
                        $html .= '</li>';
                    }
                    echo $html;
                } ?>
                <li class="nav-item btn-logout">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>