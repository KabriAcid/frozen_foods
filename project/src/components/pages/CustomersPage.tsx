import React, { useState } from 'react';
import { Search, Filter, Download, Eye, Edit, Trash2, Plus, Mail, Phone, MapPin, Calendar, Star } from 'lucide-react';

interface Customer {
  id: string;
  name: string;
  email: string;
  phone: string;
  address: string;
  joinDate: string;
  totalOrders: number;
  totalSpent: number;
  lastOrder: string;
  status: 'active' | 'inactive';
  rating: number;
  avatar: string;
}

const customers: Customer[] = [
  {
    id: 'CUST-001',
    name: 'John Doe',
    email: 'john@example.com',
    phone: '+1 (555) 123-4567',
    address: '123 Main St, New York, NY 10001',
    joinDate: '2023-06-15',
    totalOrders: 24,
    totalSpent: 1247.85,
    lastOrder: '2024-01-15',
    status: 'active',
    rating: 4.8,
    avatar: 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=100'
  },
  {
    id: 'CUST-002',
    name: 'Jane Smith',
    email: 'jane@example.com',
    phone: '+1 (555) 987-6543',
    address: '456 Oak Ave, Brooklyn, NY 11201',
    joinDate: '2023-08-22',
    totalOrders: 18,
    totalSpent: 892.40,
    lastOrder: '2024-01-12',
    status: 'active',
    rating: 4.9,
    avatar: 'https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=100'
  },
  {
    id: 'CUST-003',
    name: 'Mike Johnson',
    email: 'mike@example.com',
    phone: '+1 (555) 456-7890',
    address: '789 Pine St, Queens, NY 11375',
    joinDate: '2023-04-10',
    totalOrders: 31,
    totalSpent: 1654.20,
    lastOrder: '2024-01-08',
    status: 'active',
    rating: 4.7,
    avatar: 'https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=100'
  },
  {
    id: 'CUST-004',
    name: 'Sarah Wilson',
    email: 'sarah@example.com',
    phone: '+1 (555) 321-0987',
    address: '321 Elm St, Manhattan, NY 10002',
    joinDate: '2023-11-05',
    totalOrders: 7,
    totalSpent: 324.75,
    lastOrder: '2023-12-20',
    status: 'inactive',
    rating: 4.5,
    avatar: 'https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=100'
  },
  {
    id: 'CUST-005',
    name: 'David Brown',
    email: 'david@example.com',
    phone: '+1 (555) 654-3210',
    address: '654 Maple Dr, Bronx, NY 10451',
    joinDate: '2023-09-18',
    totalOrders: 15,
    totalSpent: 678.90,
    lastOrder: '2024-01-14',
    status: 'active',
    rating: 4.6,
    avatar: 'https://images.pexels.com/photos/1681010/pexels-photo-1681010.jpeg?auto=compress&cs=tinysrgb&w=100'
  }
];

export function CustomersPage() {
  const [selectedCustomer, setSelectedCustomer] = useState<Customer | null>(null);
  const [statusFilter, setStatusFilter] = useState<string>('all');

  const filteredCustomers = statusFilter === 'all' 
    ? customers 
    : customers.filter(customer => customer.status === statusFilter);

  return (
    <div className="space-y-6">
      {/* Header */}
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-2xl font-bold text-gray-900">Customer Management</h1>
          <p className="text-gray-600">Manage customer relationships and track engagement</p>
        </div>
        <button className="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center space-x-2">
          <Plus className="w-4 h-4" />
          <span>Add Customer</span>
        </button>
      </div>

      {/* Stats Cards */}
      <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Total Customers</p>
              <p className="text-2xl font-bold text-gray-900">892</p>
            </div>
            <div className="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
              <Mail className="w-6 h-6 text-purple-600" />
            </div>
          </div>
        </div>
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Active Customers</p>
              <p className="text-2xl font-bold text-green-600">743</p>
            </div>
            <div className="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
              <Star className="w-6 h-6 text-green-600" />
            </div>
          </div>
        </div>
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">New This Month</p>
              <p className="text-2xl font-bold text-blue-600">47</p>
            </div>
            <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
              <Calendar className="w-6 h-6 text-blue-600" />
            </div>
          </div>
        </div>
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Avg. Rating</p>
              <p className="text-2xl font-bold text-yellow-600">4.7</p>
            </div>
            <div className="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
              <Star className="w-6 h-6 text-yellow-600" />
            </div>
          </div>
        </div>
      </div>

      {/* Filters and Search */}
      <div className="bg-white rounded-xl border border-gray-200 p-6">
        <div className="flex flex-col sm:flex-row gap-4">
          <div className="flex-1">
            <div className="relative">
              <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
              <input
                type="text"
                placeholder="Search customers by name, email, or phone..."
                className="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              />
            </div>
          </div>
          <select 
            value={statusFilter}
            onChange={(e) => setStatusFilter(e.target.value)}
            className="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
          >
            <option value="all">All Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
          <button className="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors flex items-center space-x-2">
            <Filter className="w-4 h-4" />
            <span>Filter</span>
          </button>
          <button className="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center space-x-2">
            <Download className="w-4 h-4" />
            <span>Export</span>
          </button>
        </div>
      </div>

      {/* Customers Grid */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {filteredCustomers.map((customer) => (
          <div key={customer.id} className="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow">
            <div className="flex items-start justify-between mb-4">
              <div className="flex items-center space-x-3">
                <img
                  src={customer.avatar}
                  alt={customer.name}
                  className="w-12 h-12 rounded-full object-cover"
                />
                <div>
                  <h3 className="font-medium text-gray-900">{customer.name}</h3>
                  <p className="text-sm text-gray-500">{customer.id}</p>
                </div>
              </div>
              <span className={`px-2 py-1 text-xs font-semibold rounded-full ${
                customer.status === 'active' 
                  ? 'bg-green-100 text-green-800' 
                  : 'bg-gray-100 text-gray-800'
              }`}>
                {customer.status}
              </span>
            </div>

            <div className="space-y-2 mb-4">
              <div className="flex items-center space-x-2 text-sm text-gray-600">
                <Mail className="w-4 h-4" />
                <span>{customer.email}</span>
              </div>
              <div className="flex items-center space-x-2 text-sm text-gray-600">
                <Phone className="w-4 h-4" />
                <span>{customer.phone}</span>
              </div>
              <div className="flex items-center space-x-2 text-sm text-gray-600">
                <MapPin className="w-4 h-4" />
                <span className="truncate">{customer.address}</span>
              </div>
            </div>

            <div className="grid grid-cols-2 gap-4 mb-4">
              <div className="text-center">
                <p className="text-lg font-bold text-gray-900">{customer.totalOrders}</p>
                <p className="text-xs text-gray-500">Orders</p>
              </div>
              <div className="text-center">
                <p className="text-lg font-bold text-gray-900">${customer.totalSpent.toFixed(0)}</p>
                <p className="text-xs text-gray-500">Spent</p>
              </div>
            </div>

            <div className="flex items-center justify-between mb-4">
              <div className="flex items-center space-x-1">
                <Star className="w-4 h-4 text-yellow-400 fill-current" />
                <span className="text-sm font-medium">{customer.rating}</span>
              </div>
              <span className="text-xs text-gray-500">Last order: {customer.lastOrder}</span>
            </div>

            <div className="flex items-center space-x-2">
              <button 
                onClick={() => setSelectedCustomer(customer)}
                className="flex-1 bg-blue-600 text-white py-2 px-3 rounded-lg hover:bg-blue-700 transition-colors text-sm flex items-center justify-center space-x-1"
              >
                <Eye className="w-4 h-4" />
                <span>View</span>
              </button>
              <button className="p-2 text-gray-400 hover:text-green-600 transition-colors border border-gray-300 rounded-lg">
                <Edit className="w-4 h-4" />
              </button>
              <button className="p-2 text-gray-400 hover:text-red-600 transition-colors border border-gray-300 rounded-lg">
                <Trash2 className="w-4 h-4" />
              </button>
            </div>
          </div>
        ))}
      </div>

      {/* Customer Detail Modal */}
      {selectedCustomer && (
        <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
          <div className="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div className="p-6 border-b border-gray-200">
              <div className="flex items-center justify-between">
                <div className="flex items-center space-x-3">
                  <img
                    src={selectedCustomer.avatar}
                    alt={selectedCustomer.name}
                    className="w-16 h-16 rounded-full object-cover"
                  />
                  <div>
                    <h2 className="text-xl font-bold text-gray-900">{selectedCustomer.name}</h2>
                    <p className="text-gray-500">{selectedCustomer.id}</p>
                  </div>
                </div>
                <button 
                  onClick={() => setSelectedCustomer(null)}
                  className="text-gray-400 hover:text-gray-600"
                >
                  ×
                </button>
              </div>
            </div>
            <div className="p-6 space-y-6">
              <div className="grid grid-cols-2 gap-6">
                <div>
                  <h3 className="font-medium text-gray-900 mb-3">Contact Information</h3>
                  <div className="space-y-2 text-sm">
                    <div className="flex items-center space-x-2">
                      <Mail className="w-4 h-4 text-gray-400" />
                      <span>{selectedCustomer.email}</span>
                    </div>
                    <div className="flex items-center space-x-2">
                      <Phone className="w-4 h-4 text-gray-400" />
                      <span>{selectedCustomer.phone}</span>
                    </div>
                    <div className="flex items-start space-x-2">
                      <MapPin className="w-4 h-4 text-gray-400 mt-0.5" />
                      <span>{selectedCustomer.address}</span>
                    </div>
                  </div>
                </div>
                <div>
                  <h3 className="font-medium text-gray-900 mb-3">Customer Stats</h3>
                  <div className="space-y-2 text-sm">
                    <div className="flex justify-between">
                      <span className="text-gray-500">Join Date:</span>
                      <span>{selectedCustomer.joinDate}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Total Orders:</span>
                      <span className="font-medium">{selectedCustomer.totalOrders}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Total Spent:</span>
                      <span className="font-medium">${selectedCustomer.totalSpent.toFixed(2)}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Rating:</span>
                      <div className="flex items-center space-x-1">
                        <Star className="w-4 h-4 text-yellow-400 fill-current" />
                        <span className="font-medium">{selectedCustomer.rating}</span>
                      </div>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Last Order:</span>
                      <span>{selectedCustomer.lastOrder}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}