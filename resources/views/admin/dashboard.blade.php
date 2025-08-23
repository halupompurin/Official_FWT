<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FELDA - Admin Dashboard</title>
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
                    <a href="#" class="nav-link active">
                        <ion-icon name="document-outline" class="nav-icon"></ion-icon>
                        Manage Posts
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.messages') }}" class="nav-link" >
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
                <h1 class="header-title"> Admin Dashboard</h1>
                <div class="header-actions">
                    <div class="user-info">
                        Welcome, {{ Auth::user()->name ?? Auth::user()->email }}
                    </div>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <ion-icon name="log-out-outline"class ="nav-icon"></ion-icon>
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

                @if($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="content-header">
                    <h2 class="content-title">Posts Management</h2>
                    <p class="content-subtitle">Create, edit, and manage your posts with multiple images</p>
                </div>

                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="showCreateModal()">
                        <ion-icon name="add-circle-outline" class="nav-icon"></ion-icon>
                        Create New Post
                    </button>
                </div>

                <!-- Posts Grid -->
                <div class="posts-grid" id="postsGrid">
                    @if(isset($posts) && $posts->count() > 0)
                        @foreach($posts as $post)
                        <div class="post-card">
                            @if($post->hasImage())
                            <div style="margin-bottom: 1rem;">
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" 
                                     style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                            </div>
                            @endif
                            <h3 class="post-title">{{ $post->title }}</h3>
                            <div class="post-meta">
                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                                <span>By {{ $post->author }}</span>
                            </div>
                            <p class="post-content">{{ Str::limit($post->content, 150) }}</p>
                            <div class="post-actions">
                                <button class="btn btn-secondary btn-sm" 
                                        onclick="editPost({{ $post->id }}, {{ json_encode($post->title) }}, {{ json_encode($post->content) }}, '{{ $post->image ?? '' }}')">
                                    Edit
                                </button>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;" 
                                      onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <h3>No posts yet</h3>
                            <p>Start by creating your first post with multiple images!</p>
                            <button class="btn btn-primary" onclick="showCreateModal()" style="margin-top: 1rem;">
                                Create Your First Post
                            </button>
                        </div>
                    @endif
                </div>

                <!-- Pagination -->
                @if(isset($posts) && $posts->hasPages())
                <div style="margin-top: 2rem; display: flex; justify-content: center;">
                    {{ $posts->links() }}
                </div>
                @endif
            </div>
        </main>
    </div>

    <!-- Create/Edit Post Modal -->
    <div id="postModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Create New Post</h3>
                <button class="close-btn" onclick="closeModal()">&times;</button>
            </div>
            <form id="postForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="postMethod" name="_method" value="">
                
                <!-- Basic Information -->
                <div class="form-group">
                    <label for="postTitle" class="form-label">Post Title *</label>
                    <input type="text" id="postTitle" name="title" class="form-input" required 
                           placeholder="Enter your post title...">
                </div>
                
                <div class="form-group">
                    <label for="postContent" class="form-label">Post Content *</label>
                    <textarea id="postContent" name="content" class="form-textarea" required 
                              placeholder="Write your post content here..."></textarea>
                </div>

                <!-- Head Image Section -->
                <div class="image-section" id="headImageSection">
                    <div class="image-section-title">
                        <ion-icon name="image-outline" style="vertical-align: middle; margin-right: 8px;"></ion-icon>
                        Head Image
                    </div>
                    <div class="image-section-subtitle">
                        This will be the main featured image for your post (shown in listings and at the top of the article)
                    </div>
                    <div class="image-upload-area">
                        <input type="file" id="headImage" name="head_image" class="form-input" 
                               accept="image/*" onchange="previewImage('headImage', 'headImagePreview')">
                        <div id="headImagePreview" class="image-preview" style="display: none;">
                            <img src="" alt="Head image preview">
                            <br>
                            <button type="button" class="remove-image-btn" onclick="removeImagePreview('headImage', 'headImagePreview')">
                                Remove Image
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Article Images Section -->
                <div class="article-images-section">
                    <div class="image-section-title">
                        <ion-icon name="images-outline" style="vertical-align: middle; margin-right: 8px;"></ion-icon>
                        Article Images (Optional)
                    </div>
                    <div class="image-section-subtitle">
                        Add up to 4 images to include within your article content
                    </div>
                    
                    <div class="article-images-container" id="articleImagesContainer">
                        <!-- Initial article image upload will be added here -->
                    </div>
                    
                    <button type="button" class="add-article-image-btn" id="addArticleImageBtn" onclick="addArticleImageField()">
                        <ion-icon name="add-outline"></ion-icon>
                        Add Article Image
                    </button>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">Create Post</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Prevent back button to dashboard after logout
        window.history.pushState(null, null, window.location.href);
        window.onpopstate = function () {
            window.location.replace('/home');
        };

        let isEditing = false;
        let editingPostId = null;
        let articleImageCount = 0;
        const maxArticleImages = 4;

        function showCreateModal() {
            isEditing = false;
            editingPostId = null;
            articleImageCount = 0;
            
            document.getElementById('modalTitle').textContent = 'Create New Post';
            document.getElementById('submitBtn').textContent = 'Create Post';
            document.getElementById('postForm').action = '{{ route("posts.store") }}';
            document.getElementById('postMethod').value = '';
            document.getElementById('postTitle').value = '';
            document.getElementById('postContent').value = '';
            
            // Clear head image
            document.getElementById('headImage').value = '';
            document.getElementById('headImagePreview').style.display = 'none';
            document.getElementById('headImageSection').classList.remove('has-image');
            
            // Clear article images
            document.getElementById('articleImagesContainer').innerHTML = '';
            updateAddButtonState();
            
            document.getElementById('postModal').classList.add('show');
        }

        function editPost(id, title, content, image) {
            isEditing = true;
            editingPostId = id;
            articleImageCount = 0;
            
            document.getElementById('modalTitle').textContent = 'Edit Post';
            document.getElementById('submitBtn').textContent = 'Update Post';
            document.getElementById('postForm').action = '{{ url("posts") }}/' + id;
            document.getElementById('postMethod').value = 'PUT';
            document.getElementById('postTitle').value = title;
            document.getElementById('postContent').value = content;
            
            // Clear file inputs when editing
            document.getElementById('headImage').value = '';
            document.getElementById('headImagePreview').style.display = 'none';
            document.getElementById('headImageSection').classList.remove('has-image');
            
            // Show current head image info if exists
            if (image) {
                const headImageSection = document.getElementById('headImageSection');
                headImageSection.classList.add('has-image');
                const preview = document.getElementById('headImagePreview');
                preview.innerHTML = `
                    <p style="color: #10b981; font-weight: 500; margin: 1rem 0;">
                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                        Current head image will be kept unless you upload a new one
                    </p>
                `;
                preview.style.display = 'block';
            }
            
            // Clear article images
            document.getElementById('articleImagesContainer').innerHTML = '';
            updateAddButtonState();
            
            document.getElementById('postModal').classList.add('show');
        }

        function closeModal() {
            document.getElementById('postModal').classList.remove('show');
        }

        function addArticleImageField() {
            if (articleImageCount >= maxArticleImages) return;
            
            articleImageCount++;
            const container = document.getElementById('articleImagesContainer');
            const imageId = `articleImage${articleImageCount}`;
            const previewId = `articleImagePreview${articleImageCount}`;
            
            const imageItem = document.createElement('div');
            imageItem.className = 'article-image-item';
            imageItem.id = `articleImageItem${articleImageCount}`;
            
            imageItem.innerHTML = `
                <div class="article-image-header">
                    <span class="article-image-label">Article Image ${articleImageCount}</span>
                    <button type="button" class="btn btn-danger btn-xs" onclick="removeArticleImageField(${articleImageCount})">
                        <ion-icon name="trash-outline"></ion-icon>
                    </button>
                </div>
                <input type="file" id="${imageId}" name="article_images[]" class="form-input" 
                       accept="image/*" onchange="previewImage('${imageId}', '${previewId}')">
                <div id="${previewId}" class="image-preview" style="display: none;">
                    <img src="" alt="Article image preview">
                    <br>
                    <button type="button" class="remove-image-btn" onclick="removeImagePreview('${imageId}', '${previewId}')">
                        Remove Image
                    </button>
                </div>
            `;
            
            container.appendChild(imageItem);
            updateAddButtonState();
        }

        function removeArticleImageField(imageNumber) {
            const item = document.getElementById(`articleImageItem${imageNumber}`);
            if (item) {
                item.remove();
                // Recount remaining images
                articleImageCount = document.querySelectorAll('.article-image-item').length;
                updateAddButtonState();
            }
        }

        function updateAddButtonState() {
            const addBtn = document.getElementById('addArticleImageBtn');
            if (articleImageCount >= maxArticleImages) {
                addBtn.disabled = true;
                addBtn.textContent = `Maximum ${maxArticleImages} images reached`;
            } else {
                addBtn.disabled = false;
                addBtn.innerHTML = `
                    <ion-icon name="add-outline"></ion-icon>
                    Add Article Image (${articleImageCount}/${maxArticleImages})
                `;
            }
        }

        function previewImage(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const img = preview.querySelector('img');
                    img.src = e.target.result;
                    preview.style.display = 'block';
                    
                    // Add has-image class if this is the head image
                    if (inputId === 'headImage') {
                        document.getElementById('headImageSection').classList.add('has-image');
                    }
                };
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImagePreview(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            
            input.value = '';
            preview.style.display = 'none';
            
            // Remove has-image class if this is the head image
            if (inputId === 'headImage') {
                document.getElementById('headImageSection').classList.remove('has-image');
            }
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('postModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        // Handle form submission
        document.getElementById('postForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.textContent = isEditing ? 'Updating...' : 'Creating...';
        });

        // Auto-resize textarea
        document.getElementById('postContent').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>