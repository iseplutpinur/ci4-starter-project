<aside class="main-sidebar <?= config('Boilerplate')->theme['sidebar']['border'] ? 'border-right' : '' ?> sidebar-<?= config('Boilerplate')->theme['sidebar']['type'] ?>-<?= config('Boilerplate')->theme['sidebar']['links']['bg'] ?> elevation-<?= config('Boilerplate')->theme['sidebar']['shadow'] ?>">
    <a href="<?= route_to('/') ?>" class="brand-link <?= !empty(config('Boilerplate')->theme['sidebar']['brand']['bg']) ? 'bg-' . config('Boilerplate')->theme['sidebar']['brand']['bg'] : '' ?>">
        <img src="<?= base_url(config('Boilerplate')->theme['sidebar']['brand']['logo']['icon']) ?>" class="brand-image img-circle elevation-<?= config('Boilerplate')->theme['sidebar']['brand']['logo']['shadow'] ?>" style="opacity: .8">
        <span class="brand-text"><?= config('Boilerplate')->theme['sidebar']['brand']['logo']['text'] ?></span>
    </a>
    <div class="sidebar">
        <?php if (config('Boilerplate')->theme['sidebar']['user']['visible']) { ?>
            <div class="user-panel py-3 d-flex">
                <div class="image">
                    <img src="/assets/images/logo-tp.png" class="img-circle elevation-<?= config('Boilerplate')->theme['sidebar']['user']['shadow'] ?>" alt="User Image">
                </div>
                <div class="info">
                    <a href="<?= route_to('user-profile') ?>" class="d-block"><?= user()->username ?></a>
                </div>
            </div>
        <?php } ?>
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent <?= config('Boilerplate')->theme['sidebar']['compact'] ? 'nav-compact' : '' ?>" data-widget="treeview" role="menu" data-accordion="false">
                <?php {
                    $menu_rows = [];
                    foreach (menu() as $parent) {
                        if ($parent->active == '1') {
                            $url = $parent->route;
                            $new_base_url = base_url($url) . ($url == '/' ? '/' : '');
                            $rows_temp = [];
                            $rows_uri = [];
                            $from_uri = explode('/', uri_string());

                            for ($i = 0; $i < count($from_uri); $i++) {
                                $rows_temp[$i] = ($i > 0 ? $rows_temp[$i - 1] . '/' : '') . $from_uri[$i];
                                if ($rows_temp[$i] != '') {
                                    $rows_uri[] = base_url($rows_temp[$i]) . ($rows_temp[$i] == '/' ? '/' : '');
                                }
                            }

                            $childs = [];
                            $parent_active = false;
                            if (count($parent->children)) {
                                foreach ($parent->children as $child) {
                                    if ($child->active == '1') {
                                        $active = in_array(base_url($child->route), $rows_uri);
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

                            $active = in_array($new_base_url, $rows_uri);
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
            </ul>
        </nav>
    </div>
</aside>