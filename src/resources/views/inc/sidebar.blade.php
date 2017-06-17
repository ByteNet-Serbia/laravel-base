@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="//placehold.it/160x160/00a65a/ffffff/&text={{ Auth::user()->name[0] }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('bytenet-base::base.online') }}</a>
          </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="{{ trans('bytenet-base::base.search') }}...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form>
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ mb_strtoupper(trans('bytenet-base::base.administration')) }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
            <li class="active">
                <a href="{{ getPath('dashboard', true) }}">
                    {!! config('bytenet.base.icon_main') !!}
                    <span>{{ trans('bytenet-base::base.dashboard') }}</span>
                </a>
            </li>

          <li class="header">{{ mb_strtoupper(trans('bytenet-base::base.header')) }}</li>


            <li class="header">{{ mb_strtoupper(trans('bytenet-rbac::rbac.role_based_access_control')) }}</li>

            <li class="treeview">
                <a href="#">
                    {!! config('bytenet.rbac.icon_main') !!}
                    <span>{{ trans('bytenet-rbac::rbac.roles') }}</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ getPath('rbac/roles', true) }}">
                            {{ trans('bytenet-rbac::rbac.all_roles') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ getPath('rbac/roles/create', true) }}">
                            {{ trans('bytenet-rbac::rbac.create_new') }}
                        </a>
                    </li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    {!! config('bytenet.rbac.icon_main') !!}
                    <span>{{ trans('bytenet-rbac::rbac.assets') }}</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ getPath('rbac/assets', true) }}">
                            {{ trans('bytenet-rbac::rbac.all_assets') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ getPath('rbac/assets/create', true) }}">
                            {{ trans('bytenet-rbac::rbac.create_new') }}
                        </a>
                    </li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    {!! config('bytenet.rbac.icon_main') !!}
                    <span>{{ trans('bytenet-rbac::rbac.actions') }}</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ getPath('rbac/actions', true) }}">
                            {{ trans('bytenet-rbac::rbac.all_actions') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ getPath('rbac/actions/create', true) }}">
                            {{ trans('bytenet-rbac::rbac.create_new') }}
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    {!! config('bytenet.rbac.icon_main') !!}
                    <span>{{ trans('bytenet-rbac::rbac.permissions') }}</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ getPath('rbac/permissions', true) }}">
                            {{ trans('bytenet-rbac::rbac.permissions_active_deactivate') }}
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    {!! config('bytenet.rbac.icon_main') !!}
                    <span>{{ trans('bytenet-rbac::rbac.permissions_by_roles') }}</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ getPath('rbac/permissions-roles', true) }}">
                            {{ trans('bytenet-rbac::rbac.permissions_by_roles') }}
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
