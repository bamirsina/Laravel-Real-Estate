{{--head--}}
@include('admin_layouts.head')

<body id="page-top">


<div id="wrapper">

{{--navbar--}}
@include('admin_layouts.navbar')



    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->

                <form method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input
                            type="text"
                            name="search"
                            value="{{ request()->get('search') }}"
                            class="form-control bg-light border-0 small"
                            placeholder="Search for..."
                            aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <form class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @auth
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                            @endauth
                            <img class="img-profile rounded-circle" src="{{asset('https://source.unsplash.com/QAB-WJcbgJk/60x60')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/profile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </form>

                        </div>
                    </form>


                </ul>

            </nav>


                <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Houses</h1>
            <a href="{{route('admin_panel.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Add Home</a>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Price</th>
                <th scope="col">Type</th>
                <th scope="col">Property Type</th>
                <th scope="col">Number</th>
                <th scope="col">Square Feet</th>
                <th scope="col">Location City</th>
                <th scope="col">Status</th>
                <th scope="col">Action </th>
            </tr>
            </thead>
            @foreach($homes as $home)
                <tbody>
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $home->price }}</td>
                    <td>{{ $home->type }}</td>
                    <td>{{ $home->property_types }}</td>
                    <td>{{ $home->phone }}</td>
                    <td>{{ $home->square_feet }}</td>
                    <td>{{ $home->location_city }}</td>
                    <td>
                        <a href="{{ $home->id }}/status" class="btn btn-sm {{ $home->status ? 'btn-outline-success' : 'btn-outline-danger' }}">
                            <i class="fas {{ $home->status ? 'fa-toggle-on text-success' : 'fa-toggle-off text-danger' }}"></i>
                            {{ $home->status ? '' : '' }}
{{--                            {{ $home->status ? 'Enabled' : 'Disabled' }}--}}
                        </a>
                    </td>

                    <td>
                        <div class="row ml-2">
                            <a href="{{ route('admin_panel.edit', $home) }}" class="btn btn-success btn-sm mr-2">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('admin_panel.show',['id' => $home->id])}}" class="btn btn-warning btn-sm mr-2">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form method="POST" action="{{ route('admin_panel.destroy', $home->id) }}" onsubmit="return confirm('Are you sure you want to delete this home?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>


                </tr>
                @endforeach

                </tbody>

        </table>
    </div>
</div>
    </div>
</div>

@include('admin_layouts.js')

</body>
