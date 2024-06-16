{{--head--}}
@include('admin_layouts.head')

<body id="page-top">

<div id="wrapper">

    {{--navbar--}}
    @include('admin_layouts.navbar')

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            {{--topbar--}}
            @include('admin_layouts.topbar')

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Edit Home</h1>
                    <a href="{{ route('admin_panel.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-eye fa-sm text-white-50"></i> Show Houses
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_panel.update', $home->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Logo -->
                            <label class="mb-3 top-label">
                                <input name="logo[]" class="form-control" type="file" accept=".png, .jpg, .jpeg" multiple required>
                            </label>

                            <div class="mb-3">
                                <label for="type" class="form-label">Type:</label><br>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="Sale">Sale</option>
                                    <option value="Rent">Rent</option>
                                </select>
                            </div>

                            <!-- Property Type -->
                            <div class="mb-3">
                                <label for="property_types" class="form-label">Property Types:</label><br>
                                <select class="form-select" id="property_types" name="property_types" required>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Private House">Private House</option>
                                    <option value="Garage">Garage</option>
                                    <option value="Office">Office</option>
                                    <option value="Store">Store</option>
                                </select>
                            </div>

                            <!-- Price -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Price:</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ $home->price }}" required>
                            </div>

                            <!-- Environment -->
                            <div class="mb-3">
                                <label for="room" class="form-label">Room:</label>
                                <input type="number" class="form-control" id="room" name="room" value="{{ $home->room }}" required>
                            </div>

                            <!-- Square Feet -->
                            <div class="mb-3">
                                <label for="square-feet" class="form-label">Square Feet:</label>
                                <input type="number" class="form-control" id="square-feet" name="square_feet" value="{{ $home->square_feet }}" required>
                            </div>

                            <!-- Floor -->
                            <div class="mb-3">
                                <label for="floor" class="form-label">Floor:</label>
                                <input type="number" class="form-control" id="floor" name="floor" value="{{ $home->floor }}" required>
                            </div>

                            <!-- Location City -->
                            <div class="mb-3">
                                <label for="location-city" class="form-label">Location City:</label>
                                <input type="text" class="form-control" id="location-city" name="location_city" value="{{ $home->location_city }}" required>
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="{{ $home->phone }}" required>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $home->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('admin_layouts.js')

</body>
