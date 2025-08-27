<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FELDA - Admin Messages</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">

</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <img src="/img/logo-putih-new.png" alt="FELDA Logo">
                    <div>
                        <div class="site-title">FWT</div>
                        <div class="site-subtitle">Admin Dashboard</div>
                    </div>
                </div>
            </div>
            <nav class="sidebar-nav">
                <div class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <ion-icon name="document-outline" class="nav-icon"></ion-icon>
                        Manage Posts
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.messages') }}" class="nav-link active">
                        <ion-icon name="mail-outline" class="nav-icon"></ion-icon>
                        View Messages
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <h1 class="header-title">Messages Management</h1>
                <div class="header-actions">
                    <div class="user-info">
                        Welcome, {{ Auth::user()->name ?? Auth::user()->email }}
                    </div>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <ion-icon name="log-out-outline" class="nav-icon"></ion-icon>
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Content -->
            <div class="content">
                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="content-header">
                    <h2 class="content-title">Contact Messages</h2>
                    <p class="content-subtitle">View and manage messages from website visitors</p>
                </div>

                <!-- Statistics Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number">{{ $totalMessages ?? 0 }}</div>
                        <div class="stat-label">Total Messages</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $todayMessages ?? 0 }}</div>
                        <div class="stat-label">Today's Messages</div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="filter-section">
                    <form method="GET" action="{{ route('admin.messages') }}">
                        <div class="filter-row">
                            <div class="form-group">
                                <label class="form-label">Search Messages</label>
                                <input type="text" name="search" class="form-input" placeholder="Search by name, email, or message..." value="{{ request('search') }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <ion-icon name="search-outline"></ion-icon>
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Messages Table -->
                @if(isset($messages) && $messages->count() > 0)
                    <div class="table-container">
                        <table class="messages-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                                <tr>
                                    <td>
                                        <strong>{{ $message->name }}</strong>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $message->email }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $message->email }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="message-content" title="{{ $message->message }}">
                                            {{ Str::limit($message->message, 80) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="message-date">
                                            {{ $message->created_at->format('M d, Y') }}<br>
                                            <small>{{ $message->created_at->format('h:i A') }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: flex; gap: 0.5rem;">
                                            <button class="btn btn-secondary btn-sm" onclick="viewMessage('{{ addslashes($message->name) }}', '{{ addslashes($message->email) }}', {{ json_encode($message->message) }}, '{{ $message->created_at->format('M d, Y h:i A') }}')">
                                                <ion-icon name="eye-outline"></ion-icon>
                                                View
                                            </button>
                                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" style="display: inline;" 
                                                  onsubmit="return confirm('Are you sure you want to delete this message?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($messages->hasPages())
                    <div class="pagination-wrapper">
                        {{ $messages->appends(request()->query())->links() }}
                    </div>
                    @endif
                @else
                    <div class="empty-state">
                        <ion-icon name="mail-outline" style="font-size: 4rem; color: #d1d5db; margin-bottom: 1rem;"></ion-icon>
                        <h3>No messages yet</h3>
                        <p>When visitors submit the contact form, their messages will appear here.</p>
                    </div>
                @endif
            </div>
        </main>
    </div>

    <!-- Message View Modal -->
    <div id="messageModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Message Details</h3>
                <button class="close-btn" onclick="closeModal()">&times;</button>
            </div>
            <div class="message-details">
                <div class="detail-row">
                    <div class="detail-label">From:</div>
                    <div class="detail-value" id="modalName"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Email:</div>
                    <div class="detail-value">
                        <a href="#" id="modalEmailLink">
                            <span id="modalEmail"></span>
                        </a>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Date:</div>
                    <div class="detail-value" id="modalDate"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Message:</div>
                    <div class="detail-value" id="modalMessage" style="white-space: pre-wrap; line-height: 1.6;"></div>
                </div>
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 1rem;">
                <button class="btn btn-secondary" onclick="closeModal()">Close</button>
                
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        function viewMessage(name, email, message, date) {
            document.getElementById('modalName').textContent = name;
            document.getElementById('modalEmail').textContent = email;
            document.getElementById('modalEmailLink').href = 'mailto:' + email;
            document.getElementById('modalDate').textContent = date;
            document.getElementById('modalMessage').textContent = message;
            
            document.getElementById('messageModal').classList.add('show');
            
        }

        function closeModal() {
            document.getElementById('messageModal').classList.remove('show');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('messageModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>