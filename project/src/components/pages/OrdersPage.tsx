import React, { useState } from 'react';
import { Search, Filter, Download, Eye, Edit, Trash2, Package, Clock, CheckCircle, XCircle, Plus } from 'lucide-react';

interface Order {
  id: string;
  customer: string;
  email: string;
  phone: string;
  items: { name: string; quantity: number; price: number }[];
  total: number;
  status: 'pending' | 'preparing' | 'ready' | 'delivered' | 'cancelled';
  date: string;
  time: string;
  paymentMethod: string;
  address: string;
}

const orders: Order[] = [
  {
    id: '#ORD-001',
    customer: 'John Doe',
    email: 'john@example.com',
    phone: '+1 (555) 123-4567',
    items: [
      { name: 'Easy Greek Salad', quantity: 2, price: 21.99 },
      { name: 'Mediterranean Pasta', quantity: 1, price: 18.50 }
    ],
    total: 62.48,
    status: 'delivered',
    date: '2024-01-15',
    time: '12:30 PM',
    paymentMethod: 'Credit Card',
    address: '123 Main St, New York, NY 10001'
  },
  {
    id: '#ORD-002',
    customer: 'Jane Smith',
    email: 'jane@example.com',
    phone: '+1 (555) 987-6543',
    items: [
      { name: 'Grilled Chicken Bowl', quantity: 1, price: 24.99 },
      { name: 'Quinoa Power Bowl', quantity: 2, price: 19.99 }
    ],
    total: 64.97,
    status: 'preparing',
    date: '2024-01-15',
    time: '1:15 PM',
    paymentMethod: 'PayPal',
    address: '456 Oak Ave, Brooklyn, NY 11201'
  },
  {
    id: '#ORD-003',
    customer: 'Mike Johnson',
    email: 'mike@example.com',
    phone: '+1 (555) 456-7890',
    items: [
      { name: 'Salmon Teriyaki', quantity: 1, price: 28.99 }
    ],
    total: 28.99,
    status: 'ready',
    date: '2024-01-15',
    time: '2:00 PM',
    paymentMethod: 'Cash',
    address: '789 Pine St, Queens, NY 11375'
  },
  {
    id: '#ORD-004',
    customer: 'Sarah Wilson',
    email: 'sarah@example.com',
    phone: '+1 (555) 321-0987',
    items: [
      { name: 'Easy Greek Salad', quantity: 1, price: 21.99 },
      { name: 'Mediterranean Pasta', quantity: 1, price: 18.50 },
      { name: 'Grilled Chicken Bowl', quantity: 1, price: 24.99 }
    ],
    total: 65.48,
    status: 'pending',
    date: '2024-01-15',
    time: '2:30 PM',
    paymentMethod: 'Credit Card',
    address: '321 Elm St, Manhattan, NY 10002'
  }
];

function getStatusColor(status: Order['status']) {
  switch (status) {
    case 'delivered':
      return 'bg-green-100 text-green-800';
    case 'preparing':
      return 'bg-blue-100 text-blue-800';
    case 'ready':
      return 'bg-yellow-100 text-yellow-800';
    case 'pending':
      return 'bg-orange-100 text-orange-800';
    case 'cancelled':
      return 'bg-red-100 text-red-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
}

function getStatusIcon(status: Order['status']) {
  switch (status) {
    case 'delivered':
      return <CheckCircle className="w-4 h-4" />;
    case 'preparing':
      return <Package className="w-4 h-4" />;
    case 'ready':
      return <Clock className="w-4 h-4" />;
    case 'pending':
      return <Clock className="w-4 h-4" />;
    case 'cancelled':
      return <XCircle className="w-4 h-4" />;
    default:
      return <Clock className="w-4 h-4" />;
  }
}

export function OrdersPage() {
  const [selectedOrder, setSelectedOrder] = useState<Order | null>(null);
  const [statusFilter, setStatusFilter] = useState<string>('all');

  const filteredOrders = statusFilter === 'all' 
    ? orders 
    : orders.filter(order => order.status === statusFilter);

  return (
    <div className="space-y-6">
      {/* Header */}
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-2xl font-bold text-gray-900">Orders Management</h1>
          <p className="text-gray-600">Track and manage all customer orders</p>
        </div>
        <button className="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center space-x-2">
          <Plus className="w-4 h-4" />
          <span>New Order</span>
        </button>
      </div>

      {/* Stats Cards */}
      <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Total Orders</p>
              <p className="text-2xl font-bold text-gray-900">1,429</p>
            </div>
            <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
              <Package className="w-6 h-6 text-blue-600" />
            </div>
          </div>
        </div>
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Pending</p>
              <p className="text-2xl font-bold text-orange-600">23</p>
            </div>
            <div className="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
              <Clock className="w-6 h-6 text-orange-600" />
            </div>
          </div>
        </div>
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">In Progress</p>
              <p className="text-2xl font-bold text-blue-600">45</p>
            </div>
            <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
              <Package className="w-6 h-6 text-blue-600" />
            </div>
          </div>
        </div>
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Completed</p>
              <p className="text-2xl font-bold text-green-600">1,361</p>
            </div>
            <div className="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
              <CheckCircle className="w-6 h-6 text-green-600" />
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
                placeholder="Search orders by ID, customer name, or email..."
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
            <option value="pending">Pending</option>
            <option value="preparing">Preparing</option>
            <option value="ready">Ready</option>
            <option value="delivered">Delivered</option>
            <option value="cancelled">Cancelled</option>
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

      {/* Orders Table */}
      <div className="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div className="overflow-x-auto">
          <table className="w-full">
            <thead className="bg-gray-50">
              <tr>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody className="bg-white divide-y divide-gray-200">
              {filteredOrders.map((order) => (
                <tr key={order.id} className="hover:bg-gray-50">
                  <td className="px-6 py-4 whitespace-nowrap">
                    <span className="text-sm font-medium text-gray-900">{order.id}</span>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <div>
                      <div className="text-sm font-medium text-gray-900">{order.customer}</div>
                      <div className="text-sm text-gray-500">{order.email}</div>
                    </div>
                  </td>
                  <td className="px-6 py-4">
                    <div className="text-sm text-gray-900">
                      {order.items.map((item, index) => (
                        <div key={index}>
                          {item.quantity}x {item.name}
                        </div>
                      ))}
                    </div>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <span className="text-sm font-medium text-gray-900">${order.total.toFixed(2)}</span>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <span className={`inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full ${getStatusColor(order.status)}`}>
                      {getStatusIcon(order.status)}
                      <span className="ml-1">{order.status.charAt(0).toUpperCase() + order.status.slice(1)}</span>
                    </span>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <div className="text-sm text-gray-900">{order.date}</div>
                    <div className="text-sm text-gray-500">{order.time}</div>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <div className="flex items-center space-x-2">
                      <button 
                        onClick={() => setSelectedOrder(order)}
                        className="p-1 text-gray-400 hover:text-blue-600 transition-colors"
                      >
                        <Eye className="w-4 h-4" />
                      </button>
                      <button className="p-1 text-gray-400 hover:text-green-600 transition-colors">
                        <Edit className="w-4 h-4" />
                      </button>
                      <button className="p-1 text-gray-400 hover:text-red-600 transition-colors">
                        <Trash2 className="w-4 h-4" />
                      </button>
                    </div>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>

      {/* Order Detail Modal */}
      {selectedOrder && (
        <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
          <div className="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div className="p-6 border-b border-gray-200">
              <div className="flex items-center justify-between">
                <h2 className="text-xl font-bold text-gray-900">Order Details - {selectedOrder.id}</h2>
                <button 
                  onClick={() => setSelectedOrder(null)}
                  className="text-gray-400 hover:text-gray-600"
                >
                  <XCircle className="w-6 h-6" />
                </button>
              </div>
            </div>
            <div className="p-6 space-y-6">
              <div className="grid grid-cols-2 gap-6">
                <div>
                  <h3 className="font-medium text-gray-900 mb-2">Customer Information</h3>
                  <div className="space-y-1 text-sm">
                    <p><span className="text-gray-500">Name:</span> {selectedOrder.customer}</p>
                    <p><span className="text-gray-500">Email:</span> {selectedOrder.email}</p>
                    <p><span className="text-gray-500">Phone:</span> {selectedOrder.phone}</p>
                  </div>
                </div>
                <div>
                  <h3 className="font-medium text-gray-900 mb-2">Order Information</h3>
                  <div className="space-y-1 text-sm">
                    <p><span className="text-gray-500">Date:</span> {selectedOrder.date}</p>
                    <p><span className="text-gray-500">Time:</span> {selectedOrder.time}</p>
                    <p><span className="text-gray-500">Payment:</span> {selectedOrder.paymentMethod}</p>
                  </div>
                </div>
              </div>
              
              <div>
                <h3 className="font-medium text-gray-900 mb-2">Delivery Address</h3>
                <p className="text-sm text-gray-600">{selectedOrder.address}</p>
              </div>

              <div>
                <h3 className="font-medium text-gray-900 mb-2">Order Items</h3>
                <div className="space-y-2">
                  {selectedOrder.items.map((item, index) => (
                    <div key={index} className="flex justify-between items-center py-2 border-b border-gray-100">
                      <div>
                        <span className="text-sm font-medium">{item.name}</span>
                        <span className="text-sm text-gray-500 ml-2">x{item.quantity}</span>
                      </div>
                      <span className="text-sm font-medium">${(item.price * item.quantity).toFixed(2)}</span>
                    </div>
                  ))}
                  <div className="flex justify-between items-center pt-2 font-medium">
                    <span>Total</span>
                    <span>${selectedOrder.total.toFixed(2)}</span>
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