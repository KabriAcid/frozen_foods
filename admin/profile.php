<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Frozen Foods Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-50 font-sans">
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <?php include 'header.php'; ?>

        <!-- Profile Content -->
        <main class="p-6">
            <!-- Profile Header -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
                <div class="relative">
                    <!-- Cover Photo -->
                    <div class="h-48 bg-gradient-to-r from-orange-400 to-orange-600 rounded-t-lg relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <button class="absolute top-4 right-4 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-2 rounded-lg transition-all duration-200">
                            <i data-lucide="camera" class="w-5 h-5"></i>
                        </button>
                    </div>

                    <!-- Profile Info -->
                    <div class="relative px-6 pb-6">
                        <div class="flex flex-col sm:flex-row sm:items-end sm:space-x-6">
                            <!-- Avatar -->
                            <div class="relative -mt-16 mb-4 sm:mb-0">
                                <img src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="Profile"
                                    class="w-32 h-32 rounded-full border-4 border-white shadow-lg object-cover">
                                <button class="absolute bottom-2 right-2 bg-orange-500 hover:bg-orange-600 text-white p-2 rounded-full shadow-lg transition-colors">
                                    <i data-lucide="camera" class="w-4 h-4"></i>
                                </button>
                            </div>

                            <!-- User Info -->
                            <div class="flex-1">
                                <h1 class="text-2xl font-bold text-gray-900">Kabri Acid</h1>
                                <p class="text-gray-600 mb-2">Administrator</p>
                                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <i data-lucide="mail" class="w-4 h-4 mr-1"></i>
                                        john.doe@frozenfood.com
                                    </div>
                                    <div class="flex items-center">
                                        <i data-lucide="phone" class="w-4 h-4 mr-1"></i>
                                        +1 (555) 123-4567
                                    </div>
                                    <div class="flex items-center">
                                        <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>
                                        New York, NY
                                    </div>
                                    <div class="flex items-center">
                                        <i data-lucide="calendar" class="w-4 h-4 mr-1"></i>
                                        Joined Jan 2023
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center space-x-3 mt-4 sm:mt-0">
                                <button id="editProfileBtn" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                                    <i data-lucide="edit" class="w-4 h-4 mr-2"></i>
                                    Edit Profile
                                </button>
                                <button class="border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg transition-colors flex items-center">
                                    <i data-lucide="settings" class="w-4 h-4 mr-2"></i>
                                    Settings
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
                                <button class="text-orange-600 hover:text-orange-700 text-sm font-medium">Edit</button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                    <input type="text" value="John" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                    <input type="text" value="Doe" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" value="john.doe@frozenfood.com" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" value="+1 (555) 123-4567" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                                    <textarea rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>Experienced administrator with over 5 years in food service management. Passionate about delivering quality frozen food products and exceptional customer service.</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Work Information -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800">Work Information</h3>
                                <button class="text-orange-600 hover:text-orange-700 text-sm font-medium">Edit</button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Job Title</label>
                                    <input type="text" value="Administrator" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                                    <input type="text" value="Operations" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Employee ID</label>
                                    <input type="text" value="EMP-001" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                                    <input type="text" value="January 15, 2023" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Manager</label>
                                    <input type="text" value="Sarah Johnson" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Work Location</label>
                                    <input type="text" value="New York Office" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="check" class="w-4 h-4 text-green-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">Updated order #ORD-1234 status to "Delivered"</p>
                                        <p class="text-xs text-gray-500">2 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="plus" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">Added new product "Frozen Shrimp" to inventory</p>
                                        <p class="text-xs text-gray-500">5 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="edit" class="w-4 h-4 text-orange-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">Modified user permissions for Jane Smith</p>
                                        <p class="text-xs text-gray-500">1 day ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="bar-chart" class="w-4 h-4 text-purple-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">Generated monthly sales report</p>
                                        <p class="text-xs text-gray-500">2 days ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Quick Stats -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Quick Stats</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="shopping-cart" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Orders Processed</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">1,247</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="package" class="w-4 h-4 text-green-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Products Added</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">89</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="users" class="w-4 h-4 text-orange-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Users Managed</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">156</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="clock" class="w-4 h-4 text-purple-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Hours Worked</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">2,340</span>
                            </div>
                        </div>
                    </div>

                    <!-- Permissions -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Permissions</h3>
                        </div>
                        <div class="p-6 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Manage Orders</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Manage Products</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">View Analytics</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Manage Users</span>
                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">System Settings</span>
                                <div class="w-4 h-4 bg-red-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="x" class="w-3 h-3 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Security</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Two-Factor Authentication</p>
                                    <p class="text-xs text-gray-500">Add an extra layer of security</p>
                                </div>
                                <button class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">
                                    Enabled
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Password</p>
                                    <p class="text-xs text-gray-500">Last changed 30 days ago</p>
                                </div>
                                <button class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                    Change
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Login Sessions</p>
                                    <p class="text-xs text-gray-500">3 active sessions</p>
                                </div>
                                <button class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                    Manage
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <!-- Edit Profile Modal -->
    <div id="editProfileModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">Edit Profile</h3>
                    <button id="closeEditModal" class="text-gray-400 hover:text-gray-600">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <form id="editProfileForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                            <input type="text" value="John" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                            <input type="text" value="Doe" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" value="john.doe@frozenfood.com" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" value="+1 (555) 123-4567" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                            <textarea rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">Experienced administrator with over 5 years in food service management. Passionate about delivering quality frozen food products and exceptional customer service.</textarea>
                        </div>
                    </div>
                    <div class="flex items-center justify-end space-x-3 mt-6">
                        <button type="button" id="cancelEdit" class="border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg transition-colors">
                            Cancel
                        </button>
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        // Profile page specific JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const editProfileBtn = document.getElementById('editProfileBtn');
            const editProfileModal = document.getElementById('editProfileModal');
            const closeEditModal = document.getElementById('closeEditModal');
            const cancelEdit = document.getElementById('cancelEdit');
            const editProfileForm = document.getElementById('editProfileForm');

            // Open edit modal
            editProfileBtn.addEventListener('click', function() {
                editProfileModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });

            // Close edit modal
            function closeModal() {
                editProfileModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            closeEditModal.addEventListener('click', closeModal);
            cancelEdit.addEventListener('click', closeModal);

            // Close modal when clicking outside
            editProfileModal.addEventListener('click', function(e) {
                if (e.target === editProfileModal) {
                    closeModal();
                }
            });

            // Handle form submission
            editProfileForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Show loading state
                const submitBtn = e.target.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i data-lucide="loader-2" class="w-4 h-4 mr-2 animate-spin inline"></i>Saving...';
                submitBtn.disabled = true;

                // Simulate API call
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    closeModal();

                    // Show success notification
                    showNotification('Profile updated successfully!', 'success');
                }, 2000);
            });
        });

        // Notification function
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;

            const bgColor = type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500';
            notification.className += ` ${bgColor} text-white`;

            notification.innerHTML = `
                <div class="flex items-center space-x-2">
                    <i data-lucide="${type === 'success' ? 'check-circle' : type === 'error' ? 'x-circle' : 'info'}" class="w-5 h-5"></i>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(notification);
            lucide.createIcons();

            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Animate out and remove
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
    </script>
</body>

</html>