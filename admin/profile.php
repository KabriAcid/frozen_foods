<?php require __DIR__ . '/partials/headers.php'; ?>

<body class="bg-gray-50 font-sans">
    <?php require __DIR__ . '/partials/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="main-content lg:ml-64">
        <!-- Top Navigation -->
        <?php require __DIR__ . '/partials/top-navbar.php'; ?>
        <!-- Profile Content -->
        <main class="py-6 max-w-7xl mx-auto">
            <!-- Profile Header -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
                <div class="relative">
                    <!-- Cover Photo -->
                    <div class="h-48 bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700 rounded-t-lg relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        <button class="absolute top-4 right-4 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-2 rounded-lg transition-all duration-200 backdrop-blur-sm">
                            <i data-lucide="camera" class="w-5 h-5"></i>
                        </button>
                    </div>

                    <!-- Profile Info -->
                    <div class="relative px-6 py-4 pb-6">
                        <div class="flex flex-col sm:flex-row sm:items-end sm:space-x-6">
                            <!-- Avatar -->
                            <div class="relative -mt-16 mb-4 sm:mb-0">
                                <img src="./img/avatar.jpg"
                                    alt="Admin Profile"
                                    class="w-32 h-32 rounded-full border-4 border-white shadow-lg object-cover">
                                <!-- <div class="absolute bottom-0 right-0 w-8 h-8 bg-green-500 rounded-full border-2 border-white flex items-center justify-center">
                                    <div class="w-3 h-3 bg-white rounded-full"></div>
                                </div> -->
                                <button class="absolute bottom-2 right-2 bg-orange-500 hover:bg-orange-600 text-white p-2 rounded-full shadow-lg transition-colors">
                                    <i data-lucide="camera" class="w-4 h-4"></i>
                                </button>
                            </div>

                            <!-- User Info -->
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <h1 class="text-2xl font-bold text-gray-900" id="fullName">Kabri Acid</h1>
                                    <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">
                                        Super Admin
                                    </span>
                                </div>
                                <p class="text-gray-600 mb-2" id="roleTitle">System Administrator & Lead Developer</p>
                                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <i data-lucide="mail" class="w-4 h-4 mr-1"></i>
                                        <span id="emailDisplay">admin@frozenfood.com</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i data-lucide="phone" class="w-4 h-4 mr-1"></i>
                                        <span id="phoneDisplay">+1 (555) 987-6543</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>
                                        San Francisco, CA
                                    </div>
                                    <div class="flex items-center">
                                        <i data-lucide="calendar" class="w-4 h-4 mr-1"></i>
                                        Admin since March 2022
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center space-x-3 mt-4 sm:mt-0">
                                <button id="editProfileBtn" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center shadow-sm">
                                    <i data-lucide="edit" class="w-4 h-4 mr-2"></i>
                                    Edit Profile
                                </button>
                                <button id="adminSettingsBtn" class="border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg transition-colors flex items-center">
                                    <i data-lucide="settings" class="w-4 h-4 mr-2"></i>
                                    Admin Settings
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Personal Information -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800">Personal Information</h3>
                                <button id="editPersonalBtn" class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                    Edit
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                    <input type="text" id="firstNameDisplay" value="Alexandra" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                    <input type="text" id="lastNameDisplay" value="Mitchell" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" id="emailFieldDisplay" value="admin@frozenfood.com" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" id="phoneFieldDisplay" value="+1 (555) 987-6543" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                                    <textarea rows="3" id="bioDisplay" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>Experienced system administrator with expertise in enterprise-level food service management platforms. Specialized in database optimization, security protocols, and team leadership. Passionate about leveraging technology to improve operational efficiency and customer experience.</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Administrative Information -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800">Administrative Information</h3>
                                <button id="editAdminBtn" class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                    Edit
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                                    <input type="text" id="roleDisplay" value="System Administrator" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                                    <input type="text" id="departmentDisplay" value="Information Technology" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Admin ID</label>
                                    <input type="text" value="ADM-001" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Access Level</label>
                                    <input type="text" value="Level 9 - Super Admin" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Supervisor</label>
                                    <input type="text" id="supervisorDisplay" value="Michael Chen - CTO" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Primary Location</label>
                                    <input type="text" id="locationDisplay" value="San Francisco HQ - Data Center" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Administrative Activity -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800">Recent Administrative Activity</h3>
                                <button class="text-orange-600 hover:text-orange-700 text-sm font-medium flex items-center">
                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                    View All
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="check" class="w-4 h-4 text-green-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">Approved 15 new vendor registrations</p>
                                        <p class="text-xs text-gray-500">30 minutes ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="shield" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">Updated security policies for user authentication</p>
                                        <p class="text-xs text-gray-500">2 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="database" class="w-4 h-4 text-purple-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">Performed system backup and maintenance</p>
                                        <p class="text-xs text-gray-500">4 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="users" class="w-4 h-4 text-orange-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">Bulk imported 250 customer records</p>
                                        <p class="text-xs text-gray-500">6 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="bar-chart" class="w-4 h-4 text-indigo-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">Generated quarterly business intelligence report</p>
                                        <p class="text-xs text-gray-500">1 day ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="alert-triangle" class="w-4 h-4 text-red-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">Resolved critical system alert for payment gateway</p>
                                        <p class="text-xs text-gray-500">1 day ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- System Overview -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">System Overview</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="users" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Total Users</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">2,847</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="shopping-cart" class="w-4 h-4 text-green-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Orders Today</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">156</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="package" class="w-4 h-4 text-purple-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Products Live</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">892</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="trending-up" class="w-4 h-4 text-orange-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Revenue Today</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">$12.4K</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="activity" class="w-4 h-4 text-red-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">System Uptime</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">99.9%</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="bell" class="w-4 h-4 text-yellow-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Pending Tasks</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">8</span>
                            </div>
                        </div>
                    </div>

                    <!-- Admin Permissions -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Admin Permissions</h3>
                        </div>
                        <div class="p-6 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">User Management</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Financial Reports</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">System Configuration</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Database Administration</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Security Settings</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">API Management</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Backup & Recovery</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Audit Logs</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Super Admin Access</span>
                                <div class="w-4 h-4 bg-red-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="x" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security & Access -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Security & Access</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Multi-Factor Authentication</p>
                                    <p class="text-xs text-gray-500">Enhanced security enabled</p>
                                </div>
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">
                                    Active
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Admin Password</p>
                                    <p class="text-xs text-gray-500">Last changed 15 days ago</p>
                                </div>
                                <button id="changePasswordBtn" class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                    Change
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">API Access Keys</p>
                                    <p class="text-xs text-gray-500">5 active keys</p>
                                </div>
                                <button class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                    Manage
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Active Sessions</p>
                                    <p class="text-xs text-gray-500">2 devices logged in</p>
                                </div>
                                <button class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                    Review
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
                        </div>
                        <div class="p-6 space-y-3">
                            <button class="w-full flex items-center justify-center space-x-2 bg-orange-50 hover:bg-orange-100 text-orange-700 py-2 px-4 rounded-lg transition-colors">
                                <i data-lucide="database" class="w-4 h-4"></i>
                                <span class="text-sm font-medium">System Backup</span>
                            </button>
                            <button class="w-full flex items-center justify-center space-x-2 bg-green-50 hover:bg-green-100 text-green-700 py-2 px-4 rounded-lg transition-colors">
                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                <span class="text-sm font-medium">Generate Report</span>
                            </button>
                            <button class="w-full flex items-center justify-center space-x-2 bg-blue-50 hover:bg-blue-100 text-blue-700 py-2 px-4 rounded-lg transition-colors">
                                <i data-lucide="zap" class="w-4 h-4"></i>
                                <span class="text-sm font-medium">Clear Cache</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Edit Profile Modal -->
        <div id="editProfileModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-40 hidden">
            <div class="bg-white rounded-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-900">Edit Profile</h2>
                        <button id="closeEditProfile" class="text-gray-400 hover:text-gray-600">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <form id="editProfileForm">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                <input type="text" id="firstName" name="firstName" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                <input type="text" id="lastName" name="lastName" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                                <input type="text" id="role" name="role" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                                <input type="text" id="department" name="department" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Supervisor</label>
                                <input type="text" id="supervisor" name="supervisor" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Primary Location</label>
                                <input type="text" id="location" name="location" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                            <textarea rows="4" id="bio" name="bio" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button" id="cancelEditProfile" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors flex items-center">
                                <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Admin Settings Modal -->
        <div id="adminSettingsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-40 hidden">
            <div class="bg-white rounded-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-900">Admin Settings</h2>
                        <button id="closeAdminSettings" class="text-gray-400 hover:text-gray-600">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <form id="adminSettingsForm">
                        <!-- Password Change Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <i data-lucide="lock" class="w-5 h-5 mr-2"></i>
                                Change Password
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                    <input type="password" id="oldPassword" name="oldPassword" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Enter current password">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                    <input type="password" id="newPassword" name="newPassword" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Enter new password">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                    <input type="password" id="confirmPassword" name="confirmPassword" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Confirm new password">
                                </div>
                            </div>
                        </div>

                        <!-- Security Settings -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <i data-lucide="shield" class="w-5 h-5 mr-2"></i>
                                Security Settings
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Two-Factor Authentication</p>
                                        <p class="text-xs text-gray-500">Add an extra layer of security to your account</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="twoFactor" name="twoFactor" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Login Notifications</p>
                                        <p class="text-xs text-gray-500">Get notified when someone logs into your account</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="loginNotifications" name="loginNotifications" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Session Timeout</p>
                                        <p class="text-xs text-gray-500">Automatically log out after inactivity</p>
                                    </div>
                                    <select id="sessionTimeout" name="sessionTimeout" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                                        <option value="30">30 minutes</option>
                                        <option value="60">1 hour</option>
                                        <option value="120">2 hours</option>
                                        <option value="240">4 hours</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Notification Preferences -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <i data-lucide="bell" class="w-5 h-5 mr-2"></i>
                                Notification Preferences
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">System Alerts</p>
                                        <p class="text-xs text-gray-500">Critical system notifications</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="systemAlerts" name="systemAlerts" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">User Activity</p>
                                        <p class="text-xs text-gray-500">New user registrations and activities</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="userActivity" name="userActivity" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" id="cancelAdminSettings" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors flex items-center">
                                <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                                Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Confirmation Dialog -->
        <div id="confirmDialog" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Confirm Changes</h3>
                <p class="text-gray-600 mb-6">
                    Are you sure you want to save these changes? This action cannot be undone.
                </p>
                <div class="flex justify-end space-x-3">
                    <button id="cancelConfirm" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button id="confirmSubmit" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <script src="script.js"></script>
    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Profile data object
        const profileData = {
            firstName: 'Alexandra',
            lastName: 'Mitchell',
            email: 'admin@frozenfood.com',
            phone: '+1 (555) 987-6543',
            bio: 'Experienced system administrator with expertise in enterprise-level food service management platforms. Specialized in database optimization, security protocols, and team leadership. Passionate about leveraging technology to improve operational efficiency and customer experience.',
            role: 'System Administrator',
            department: 'Information Technology',
            supervisor: 'Michael Chen - CTO',
            location: 'San Francisco HQ - Data Center'
        };

        // Password data object
        const passwordData = {
            oldPassword: '',
            newPassword: '',
            confirmPassword: ''
        };

        // Modal elements
        const editProfileModal = document.getElementById('editProfileModal');
        const adminSettingsModal = document.getElementById('adminSettingsModal');
        const confirmDialog = document.getElementById('confirmDialog');

        // Button elements
        const editProfileBtn = document.getElementById('editProfileBtn');
        const adminSettingsBtn = document.getElementById('adminSettingsBtn');
        const editPersonalBtn = document.getElementById('editPersonalBtn');
        const editAdminBtn = document.getElementById('editAdminBtn');
        const changePasswordBtn = document.getElementById('changePasswordBtn');

        // Close button elements
        const closeEditProfile = document.getElementById('closeEditProfile');
        const closeAdminSettings = document.getElementById('closeAdminSettings');
        const cancelEditProfile = document.getElementById('cancelEditProfile');
        const cancelAdminSettings = document.getElementById('cancelAdminSettings');

        // Form elements
        const editProfileForm = document.getElementById('editProfileForm');
        const adminSettingsForm = document.getElementById('adminSettingsForm');

        // Confirmation dialog elements
        const cancelConfirm = document.getElementById('cancelConfirm');
        const confirmSubmit = document.getElementById('confirmSubmit');

        // Current form being submitted
        let currentForm = null;

        // Function to populate edit profile form
        function populateEditProfileForm() {
            document.getElementById('firstName').value = profileData.firstName;
            document.getElementById('lastName').value = profileData.lastName;
            document.getElementById('email').value = profileData.email;
            document.getElementById('phone').value = profileData.phone;
            document.getElementById('bio').value = profileData.bio;
            document.getElementById('role').value = profileData.role;
            document.getElementById('department').value = profileData.department;
            document.getElementById('supervisor').value = profileData.supervisor;
            document.getElementById('location').value = profileData.location;
        }

        // Function to update profile display
        function updateProfileDisplay() {
            document.getElementById('fullName').textContent = `${profileData.firstName} ${profileData.lastName}`;
            document.getElementById('emailDisplay').textContent = profileData.email;
            document.getElementById('phoneDisplay').textContent = profileData.phone;
            document.getElementById('firstNameDisplay').value = profileData.firstName;
            document.getElementById('lastNameDisplay').value = profileData.lastName;
            document.getElementById('emailFieldDisplay').value = profileData.email;
            document.getElementById('phoneFieldDisplay').value = profileData.phone;
            document.getElementById('bioDisplay').value = profileData.bio;
            document.getElementById('roleDisplay').value = profileData.role;
            document.getElementById('departmentDisplay').value = profileData.department;
            document.getElementById('supervisorDisplay').value = profileData.supervisor;
            document.getElementById('locationDisplay').value = profileData.location;
        }

        // Function to show modal
        function showModal(modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Function to hide modal
        function hideModal(modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Function to show confirmation dialog
        function showConfirmDialog() {
            confirmDialog.classList.remove('hidden');
        }

        // Function to hide confirmation dialog
        function hideConfirmDialog() {
            confirmDialog.classList.add('hidden');
        }

        // Event listeners for opening modals
        editProfileBtn.addEventListener('click', () => {
            populateEditProfileForm();
            showModal(editProfileModal);
        });

        editPersonalBtn.addEventListener('click', () => {
            populateEditProfileForm();
            showModal(editProfileModal);
        });

        editAdminBtn.addEventListener('click', () => {
            populateEditProfileForm();
            showModal(editProfileModal);
        });

        adminSettingsBtn.addEventListener('click', () => {
            showModal(adminSettingsModal);
        });

        changePasswordBtn.addEventListener('click', () => {
            showModal(adminSettingsModal);
        });

        // Event listeners for closing modals
        closeEditProfile.addEventListener('click', () => {
            hideModal(editProfileModal);
        });

        closeAdminSettings.addEventListener('click', () => {
            hideModal(adminSettingsModal);
        });

        cancelEditProfile.addEventListener('click', () => {
            hideModal(editProfileModal);
        });

        cancelAdminSettings.addEventListener('click', () => {
            hideModal(adminSettingsModal);
        });

        // Event listeners for form submissions
        editProfileForm.addEventListener('submit', (e) => {
            e.preventDefault();
            currentForm = 'profile';
            showConfirmDialog();
        });

        adminSettingsForm.addEventListener('submit', (e) => {
            e.preventDefault();
            currentForm = 'settings';
            showConfirmDialog();
        });

        // Event listeners for confirmation dialog
        cancelConfirm.addEventListener('click', () => {
            hideConfirmDialog();
            currentForm = null;
        });

        confirmSubmit.addEventListener('click', () => {
            if (currentForm === 'profile') {
                // Update profile data
                profileData.firstName = document.getElementById('firstName').value;
                profileData.lastName = document.getElementById('lastName').value;
                profileData.email = document.getElementById('email').value;
                profileData.phone = document.getElementById('phone').value;
                profileData.bio = document.getElementById('bio').value;
                profileData.role = document.getElementById('role').value;
                profileData.department = document.getElementById('department').value;
                profileData.supervisor = document.getElementById('supervisor').value;
                profileData.location = document.getElementById('location').value;

                // Update display
                updateProfileDisplay();

                // Hide modals
                hideModal(editProfileModal);
                hideConfirmDialog();

                // Show success message (optional)
                alert('Profile updated successfully!');
            } else if (currentForm === 'settings') {
                // Update password data
                passwordData.oldPassword = document.getElementById('oldPassword').value;
                passwordData.newPassword = document.getElementById('newPassword').value;
                passwordData.confirmPassword = document.getElementById('confirmPassword').value;

                // Validate passwords
                if (passwordData.newPassword !== passwordData.confirmPassword) {
                    alert('New passwords do not match!');
                    hideConfirmDialog();
                    return;
                }

                // Clear password fields
                document.getElementById('oldPassword').value = '';
                document.getElementById('newPassword').value = '';
                document.getElementById('confirmPassword').value = '';

                // Hide modals
                hideModal(adminSettingsModal);
                hideConfirmDialog();

                // Show success message (optional)
                alert('Settings updated successfully!');
            }

            currentForm = null;
        });

        // Close modals when clicking outside
        editProfileModal.addEventListener('click', (e) => {
            if (e.target === editProfileModal) {
                hideModal(editProfileModal);
            }
        });

        adminSettingsModal.addEventListener('click', (e) => {
            if (e.target === adminSettingsModal) {
                hideModal(adminSettingsModal);
            }
        });

        confirmDialog.addEventListener('click', (e) => {
            if (e.target === confirmDialog) {
                hideConfirmDialog();
            }
        });

        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            updateProfileDisplay();
            lucide.createIcons();
        });
    </script>
</body>

</html>