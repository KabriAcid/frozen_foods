import React from 'react';
import { MoreHorizontal, Eye, Edit, Trash2 } from 'lucide-react';

interface Order {
  id: string;
  customer: string;
  email: string;
  total: number;
  status: 'pending' | 'processing' | 'completed' | 'cancelled';
  date: string;
  items: number;
}

const orders: Order[] = [
  {
    id: '#ORD-001',
    customer: 'John Doe',
    email: 'john@example.com',
    total: 89.99,
    status: 'completed',
    date: '2024-01-15',
    items: 3
  },
  {
    id: '#ORD-002',
    customer: 'Jane Smith',
    email: 'jane@example.com',
    total: 156.50,
    status: 'processing',
    date: '2024-01-15',
    items: 5
  },
  {
    id: '#ORD-003',
    customer: 'Mike Johnson',
    email: 'mike@example.com',
    total: 45.25,
    status: 'pending',
    date: '2024-01-14',
    items: 2
  },
  {
    id: '#ORD-004',
    customer: 'Sarah Wilson',
    email: 'sarah@example.com',
    total: 234.75,
    status: 'completed',
    date: '2024-01-14',
    items: 7
  },
  {
    id: '#ORD-005',
    customer: 'David Brown',
    email: 'david@example.com',
    total: 67.80,
    status: 'cancelled',
    date: '2024-01-13',
    items: 4
  }
];

function getStatusColor(status: Order['status']) {
  switch (status) {
    case 'completed':
      return 'bg-green-100 text-green-800';
    case 'processing':
      return 'bg-blue-100 text-blue-800';
    case 'pending':
      return 'bg-yellow-100 text-yellow-800';
    case 'cancelled':
      return 'bg-red-100 text-red-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
}

export function RecentOrders() {
  return (
    <div className="bg-white rounded-xl border border-gray-200">
      <div className="p-6 border-b border-gray-200">
        <div className="flex items-center justify-between">
          <h2 className="text-xl font-bold text-gray-900">Recent Orders</h2>
          <button className="text-blue-600 hover:text-blue-700 font-medium text-sm">
            View All
          </button>
        </div>
      </div>
      
      <div className="overflow-x-auto">
        <table className="w-full">
          <thead className="bg-gray-50">
            <tr>
              <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Order ID
              </th>
              <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Customer
              </th>
              <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Items
              </th>
              <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Total
              </th>
              <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
              </th>
              <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date
              </th>
              <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
              </th>
            </tr>
          </thead>
          <tbody className="bg-white divide-y divide-gray-200">
            {orders.map((order) => (
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
                <td className="px-6 py-4 whitespace-nowrap">
                  <span className="text-sm text-gray-900">{order.items} items</span>
                </td>
                <td className="px-6 py-4 whitespace-nowrap">
                  <span className="text-sm font-medium text-gray-900">${order.total.toFixed(2)}</span>
                </td>
                <td className="px-6 py-4 whitespace-nowrap">
                  <span className={`inline-flex px-2 py-1 text-xs font-semibold rounded-full ${getStatusColor(order.status)}`}>
                    {order.status.charAt(0).toUpperCase() + order.status.slice(1)}
                  </span>
                </td>
                <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {order.date}
                </td>
                <td className="px-6 py-4 whitespace-nowrap">
                  <div className="flex items-center space-x-2">
                    <button className="p-1 text-gray-400 hover:text-blue-600 transition-colors">
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
  );
}