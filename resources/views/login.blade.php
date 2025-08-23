<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWT - Admin Login</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
    <div class="split-container" data-aos="fade-right" data-aos-delay="100">
        <!-- Left Side - Logo Section -->
        <div class="logo-section">
            <div class="logo-container">
                
                <div class="logo">
                    <a href="/home" style="text-decoration:none; curser: pointer;">
                    <img src="/img/Logo_FELDA (1).png" alt="FELDA Logo">
                </div>
                <h1 class="site-title">FELDA</h1>
                <p class="site-subtitle">Wilayah Trolak</p>
            </a>
            </div>
        </div>

        <!-- Right Side - Form Section -->
        <div class="form-section" data-aos="fade-left" data-aos-delay="100">
            <div class="login-container">
                <div class="login-header">
                    <h2 class="login-title">Welcome Back</h2>
                    <p class="login-subtitle">Sign in to your admin dashboard</p>
                </div>

                <form class="login-form" id="loginForm" action="{{ route('login.process') }}" method="POST">
                    @csrf
                    
                    <!-- Laravel Validation Errors -->
                    @if ($errors->any())
                        <div class="error-message">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    <!-- Session Error Messages -->
                    @if (session('error'))
                        <div class="error-message">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-input @error('email') error @enderror" 
                            placeholder="admin@felda.com"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                        >
                        @error('email')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="password-group">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="form-input @error('password') error @enderror" 
                                placeholder="Enter your password"
                                required
                                
                            >
                            <button type="button" class="password-toggle">
                                
                            </button>
                        </div>
                        @error('password')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="login-button" id="loginBtn">
                        Sign In
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        
        // Enhanced form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const loginBtn = document.getElementById('loginBtn');
            
            // Add loading state
            loginBtn.classList.add('loading');
            loginBtn.textContent = 'Signing In...';
            loginBtn.disabled = true;
            
        });

        window.addEventListener('load', function() {
            document.body.style.opacity = '1';
        });

        // Reset button state if there are validation errors (page reload)
        @if ($errors->any() || session('error'))
            document.addEventListener('DOMContentLoaded', function() {
                const loginBtn = document.getElementById('loginBtn');
                loginBtn.classList.remove('loading');
                loginBtn.textContent = 'Sign In';
                loginBtn.disabled = false;
            });
        @endif
    </script>
</body>
</html>