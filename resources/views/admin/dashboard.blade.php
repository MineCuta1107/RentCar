<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --secondary: #06b6d4;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --text: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f3f4f6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text);
        }

        .sidebar {
            height: 100vh;
            background: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            position: fixed;
            width: 280px;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .sidebar-header h5 {
            color: var(--primary);
            font-weight: 600;
            margin: 0;
        }

        .nav-link {
            padding: 0.8rem 1.5rem;
            color: var(--text);
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0.3rem 1rem;
        }

        .nav-link i {
            width: 24px;
            margin-right: 0.8rem;
            font-size: 1.1rem;
        }

        .nav-link:hover {
            background: var(--bg-light);
            color: var(--primary);
        }

        .nav-link.active {
            background: var(--primary);
            color: white;
        }

        .main-content {
            margin-left: 280px;
            padding: 2rem;
            min-height: 100vh;
        }

        .content-header {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text);
            margin: 0;
        }

        .btn-logout {
            background: var(--danger);
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .stat-card .icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-card.primary .icon {
            background: rgba(79, 70, 229, 0.1);
            color: var(--primary);
        }

        .stat-card.success .icon {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .stat-card.warning .icon {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .stat-card h3 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            color: var(--text-light);
            margin: 0;
            font-size: 0.9rem;
        }

        .welcome-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-top: 2rem;
        }

        .welcome-card h5 {
            color: var(--text);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .welcome-card p {
            color: var(--text-light);
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.show {
                width: 280px;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h5>Admin Dashboard</h5>
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link active" href="/admin/dashboard">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/vehicles">
                    <i class="fas fa-car"></i>
                    Kelola Kendaraan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/transactions">
                    <i class="fas fa-exchange-alt"></i>
                    Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/users">
                    <i class="fas fa-users"></i>
                    Kelola Anggota
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="content-header">
            <h1>Selamat Datang, {{ auth()->user()->name }}</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('member.dashboard') }}" class="btn btn-primary">
                    <i class="fas fa-sign-out-alt me-2"></i>Exit Admin Panel
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="stat-card primary">
                    <div class="icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h3>{{ $availableVehicles }}</h3>
                    <p>Kendaraan Tersedia</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card success">
                    <div class="icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h3>{{ $totalTransactions }}</h3>
                    <p>Total Transaksi</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card warning">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>{{ $totalUsers }}</h3>
                    <p>Anggota Terdaftar</p>
                </div>
            </div>
        </div>

        <div class="welcome-card">
            <h5>Selamat Datang di Dashboard Admin</h5>
        </div>

        <!-- Statistics Section -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-primary text-white rounded-circle p-3 me-3">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Transaksi</h6>
                            <h3 class="mb-0">{{ $totalTransactions }}</h3>
                            <small class="text-muted">
                                {{ $completedTransactions }} Selesai | {{ $ongoingTransactions }} Aktif
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-success text-white rounded-circle p-3 me-3">
                            <i class="fas fa-car"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Kendaraan</h6>
                            <h3 class="mb-0">{{ $totalVehicles }}</h3>
                            <small class="text-muted">
                                {{ $availableVehicles }} Tersedia | {{ $borrowedVehicles }} Dipinjam
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-info text-white rounded-circle p-3 me-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Anggota</h6>
                            <h3 class="mb-0">{{ $totalUsers }}</h3>
                            <small class="text-muted">
                                Anggota Terdaftar
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistik Transaksi</h5>
                        <div id="transaction-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistik Kendaraan</h5>
                        <div id="vehicle-chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ApexCharts Script -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
        <script>
            // Transaction Chart
            const transactionOptions = {
                series: [{
                    name: 'Transaksi',
                    data: [{{ $completedTransactions }}, {{ $ongoingTransactions }}]
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: false,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['Selesai', 'Aktif'],
                },
                colors: ['#10b981', '#f59e0b']
            };

            const transactionChart = new ApexCharts(document.querySelector("#transaction-chart"), transactionOptions);
            transactionChart.render();

            // Vehicle Chart
            const vehicleOptions = {
                series: [{{ $availableVehicles }}, {{ $borrowedVehicles }}],
                chart: {
                    type: 'donut',
                    height: 350
                },
                labels: ['Tersedia', 'Dipinjam'],
                colors: ['#10b981', '#f59e0b'],
                legend: {
                    position: 'bottom'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontSize: '22px',
                                    fontFamily: 'Helvetica, Arial, sans-serif',
                                    fontWeight: 600,
                                    offsetY: -10,
                                },
                                value: {
                                    show: true,
                                    fontSize: '16px',
                                    fontFamily: 'Helvetica, Arial, sans-serif',
                                    fontWeight: 400,
                                    offsetY: 16,
                                },
                                total: {
                                    show: true,
                                    label: 'Total',
                                    fontSize: '16px',
                                    fontWeight: 600,
                                    color: '#373d3f',
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            console.log('Vehicle Data:', {
                available: {{ $availableVehicles }},
                borrowed: {{ $borrowedVehicles }}
            });

            const vehicleChart = new ApexCharts(document.querySelector("#vehicle-chart"), vehicleOptions);
            vehicleChart.render();
        </script>

        <style>
            .stat-card {
                background: white;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                transition: transform 0.3s ease;
            }
            .stat-card:hover {
                transform: translateY(-5px);
            }
            .stat-icon {
                width: 50px;
                height: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .stat-icon i {
                font-size: 1.5rem;
            }
            .bg-primary {
                background-color: #4f46e5 !important;
            }
            .bg-success {
                background-color: #10b981 !important;
            }
            .bg-info {
                background-color: #06b6d4 !important;
            }
            .card {
                background: white;
                border-radius: 10px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                margin-bottom: 20px;
            }
            .card-body {
                padding: 20px;
            }
            .card-title {
                color: #1f2937;
                font-weight: 600;
                margin-bottom: 20px;
            }
        </style>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>