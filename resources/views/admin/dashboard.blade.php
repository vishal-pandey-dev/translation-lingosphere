@extends('admin.layouts.adminHeader')

@section('content')
    <div class="admin-dashboard">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 admin-sidebar">
                <div class="sidebar-menu">
                    <div class="sidebar-header">
                        <h3>Admin Panel</h3>
                    </div>

                    <ul class="list-unstyled">
                        <li class="active">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-header">Products</li>
                        <li>
                            <a href="{{ route('products.create') }}">
                                <i class="fas fa-plus"></i>
                                <span>Add Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products.admin') }}">
                                <i class="fas fa-list"></i>
                                <span>All Products</span>
                            </a>
                        </li>

                        <li class="menu-header">Finance</li>
                        <li>
                            <a href="{{ route('currency.index') }}">
                                <i class="fas fa-money-bill"></i>
                                <span>Currency Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('coupon.index') }}">
                                <i class="fas fa-ticket-alt"></i>
                                <span>Coupons</span>
                            </a>
                        </li>

                        <li class="menu-header">System</li>
                        <li>
                            <a href="/admin/logs">
                                <i class="fas fa-history"></i>
                                <span>System Logs</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 admin-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-icon">
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="stats-info">
                                <h4>Total Products</h4>
                                <p>{{ \App\Models\Product::getPublishedProducts() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stats-info">
                                <h4>Total Users</h4>
                                <p>{{ \App\Models\User::count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="stats-info">
                                <h4>Total Orders</h4>
                                <p>{{ \App\Models\Order::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>User Management</h4>
                                <span class="badge bg-primary">Total Users: {{ \App\Models\User::count() }}</span>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\App\Models\User::latest()->get() as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->user_type }}</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            data-user-id="{{ $user->id }}"
                                                            {{ $user->is_active ? 'checked' : '' }}
                                                            onchange="toggleUserStatus(this)">
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="deleteUser({{ $user->id }})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .admin-dashboard {
            padding: 20px;
        }

        .admin-sidebar {
            background: #2c3e50;
            min-height: 100vh;
            color: #fff;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #34495e;
        }

        .sidebar-menu ul li {
            padding: 10px 20px;
        }

        .sidebar-menu ul li a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar-menu ul li.active {
            background: #34495e;
        }

        .menu-header {
            font-size: 12px;
            text-transform: uppercase;
            padding: 10px 20px;
            color: #95a5a6;
        }

        .stats-card {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .stats-icon {
            float: left;
            font-size: 40px;
            color: #3498db;
            margin-right: 20px;
        }

        .stats-info h4 {
            margin: 0;
            font-size: 16px;
            color: #7f8c8d;
        }

        .stats-info p {
            margin: 5px 0 0;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
    <script>
        function toggleUserStatus(element) {
            const userId = element.dataset.userId;
            fetch(`/admin/users/${userId}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showFrontendAlert('success', 'User status updated successfully');
                    }
                });
        }

        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                fetch(`/admin/users/${userId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        }
                    });
            }
        }
    </script>
@endsection
