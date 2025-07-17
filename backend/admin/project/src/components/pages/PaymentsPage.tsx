import React, { useState } from 'react';
import { Search, Filter, Download, Eye, CreditCard, DollarSign, TrendingUp, Calendar, CheckCircle, XCircle, Clock } from 'lucide-react';

interface Payment {
  id: string;
  orderId: string;
  customer: string;
  amount: number;
  method: 'credit-card' | 'paypal' | 'cash' | 'bank-transfer';
  status: 'completed' | 'pending' | 'failed' | 'refunded';
  date: string;
  time: string;
  transactionId: string;
  fee: number;
}

const payments: Payment[] = [
  {
    id: 'PAY-001',
    orderId: '#ORD-001',
    customer: 'John Doe',
    amount: 62.48,
    method: 'credit-card',
    status: 'completed',
    date: '2024-01-15',
    time: '12:30 PM',
    transactionId: 'txn_1234567890',
    fee: 2.12
  },
  {
    id: 'PAY-002',
    orderId: '#ORD-002',
    customer: 'Jane Smith',
    amount: 64.97,
    method: 'paypal',
    status: 'completed',
    date: '2024-01-15',
    time: '1:15 PM',
    transactionId: 'pp_9876543210',
    fee: 2.27
  },
  {
    id: 'PAY-003',
    orderId: '#ORD-003',
    customer: 'Mike Johnson',
    amount: 28.99,
    method: 'cash',
    status: 'completed',
    date: '2024-01-15',
    time: '2:00 PM',
    transactionId: 'cash_001',
    fee: 0
  },
  {
    id: 'PAY-004',
    orderId: '#ORD-004',
    customer: 'Sarah Wilson',
    amount: 65.48,
    method: 'credit-card',
    status: 'pending',
    date: '2024-01-15',
    time: '2:30 PM',
    transactionId: 'txn_pending_001',
    fee: 2.22
  },
  {
    id: 'PAY-005',
    orderId: '#ORD-005',
    customer: 'David Brown',
    amount: 45.25,
    method: 'bank-transfer',
    status: 'failed',
    date: '2024-01-14',
    time: '3:45 PM',
    transactionId: 'bt_failed_001',
    fee: 0
  }
];

function getStatusColor(status: Payment['status']) {
  switch (status) {
    case 'completed':
      return 'bg-green-100 text-green-800';
    case 'pending':
      return 'bg-yellow-100 text-yellow-800';
    case 'failed':
      return 'bg-red-100 text-red-800';
    case 'refunded':
      return 'bg-gray-100 text-gray-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
}

function getStatusIcon(status: Payment['status']) {
  switch (status) {
    case 'completed':
      return <CheckCircle className="w-4 h-4" />;
    case 'pending':
      return <Clock className="w-4 h-4" />;
    case 'failed':
      return <XCircle className="w-4 h-4" />;
    case 'refunded':
      return <XCircle className="w-4 h-4" />;
    default:
      return <Clock className="w-4 h-4" />;
  }
}

function getMethodIcon(method: Payment['method']) {
  switch (method) {
    case 'credit-card':
      return <CreditCard className="w-4 h-4" />;
    case 'paypal':
      return <DollarSign className="w-4 h-4" />;
    case 'cash':
      return <DollarSign className="w-4 h-4" />;
    case 'bank-transfer':
      return <DollarSign className="w-4 h-4" />;
    default:
      return <DollarSign className="w-4 h-4" />;
  }
}

export function PaymentsPage() {
  const [selectedPayment, setSelectedPayment] = useState<Payment | null>(null);
  const [statusFilter, setStatusFilter] = useState<string>('all');
  const [methodFilter, setMethodFilter] = useState<string>('all');

  const filteredPayments = payments.filter(payment => {
    const statusMatch = statusFilter === 'all' || payment.status === statusFilter;
    const methodMatch = methodFilter === 'all' || payment.method === methodFilter;
    return statusMatch && methodMatch;
  });

  return (
    <div className="space-y-6">
      {/* Header */}
      <div>
        <h1 className="text-2xl font-bold text-gray-900">Payment Management</h1>
        <p className="text-gray-600">Track payments, refunds, and financial reports</p>
      </div>

      {/* Stats Cards */}
      <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Total Revenue</p>
              <p className="text-2xl font-bold text-gray-900">$45,231</p>
              <div className="flex items-center mt-2">
                <TrendingUp className="w-4 h-4 text-green-500 mr-1" />
                <span className="text-sm font-medium text-green-600">+12.5%</span>
              </div>
            </div>
            <div className="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
              <DollarSign className="w-6 h-6 text-green-600" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Successful Payments</p>
              <p className="text-2xl font-bold text-green-600">1,387</p>
              <div className="flex items-center mt-2">
                <span className="text-sm text-gray-500">98.2% success rate</span>
              </div>
            </div>
            <div className="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
              <CheckCircle className="w-6 h-6 text-green-600" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Pending Payments</p>
              <p className="text-2xl font-bold text-yellow-600">23</p>
              <div className="flex items-center mt-2">
                <span className="text-sm text-gray-500">Awaiting processing</span>
              </div>
            </div>
            <div className="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
              <Clock className="w-6 h-6 text-yellow-600" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Processing Fees</p>
              <p className="text-2xl font-bold text-gray-900">$892</p>
              <div className="flex items-center mt-2">
                <span className="text-sm text-gray-500">2.1% avg fee</span>
              </div>
            </div>
            <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
              <CreditCard className="w-6 h-6 text-blue-600" />
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
                placeholder="Search by payment ID, order ID, or customer..."
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
            <option value="completed">Completed</option>
            <option value="pending">Pending</option>
            <option value="failed">Failed</option>
            <option value="refunded">Refunded</option>
          </select>
          <select 
            value={methodFilter}
            onChange={(e) => setMethodFilter(e.target.value)}
            className="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
          >
            <option value="all">All Methods</option>
            <option value="credit-card">Credit Card</option>
            <option value="paypal">PayPal</option>
            <option value="cash">Cash</option>
            <option value="bank-transfer">Bank Transfer</option>
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

      {/* Payments Table */}
      <div className="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div className="overflow-x-auto">
          <table className="w-full">
            <thead className="bg-gray-50">
              <tr>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment ID</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody className="bg-white divide-y divide-gray-200">
              {filteredPayments.map((payment) => (
                <tr key={payment.id} className="hover:bg-gray-50">
                  <td className="px-6 py-4 whitespace-nowrap">
                    <span className="text-sm font-medium text-gray-900">{payment.id}</span>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <span className="text-sm text-blue-600 hover:text-blue-800 cursor-pointer">{payment.orderId}</span>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <span className="text-sm text-gray-900">{payment.customer}</span>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <div>
                      <span className="text-sm font-medium text-gray-900">${payment.amount.toFixed(2)}</span>
                      {payment.fee > 0 && (
                        <div className="text-xs text-gray-500">Fee: ${payment.fee.toFixed(2)}</div>
                      )}
                    </div>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <div className="flex items-center space-x-2">
                      {getMethodIcon(payment.method)}
                      <span className="text-sm text-gray-900 capitalize">{payment.method.replace('-', ' ')}</span>
                    </div>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <span className={`inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full ${getStatusColor(payment.status)}`}>
                      {getStatusIcon(payment.status)}
                      <span className="ml-1 capitalize">{payment.status}</span>
                    </span>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <div className="text-sm text-gray-900">{payment.date}</div>
                    <div className="text-sm text-gray-500">{payment.time}</div>
                  </td>
                  <td className="px-6 py-4 whitespace-nowrap">
                    <button 
                      onClick={() => setSelectedPayment(payment)}
                      className="p-1 text-gray-400 hover:text-blue-600 transition-colors"
                    >
                      <Eye className="w-4 h-4" />
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>

      {/* Payment Detail Modal */}
      {selectedPayment && (
        <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
          <div className="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div className="p-6 border-b border-gray-200">
              <div className="flex items-center justify-between">
                <h2 className="text-xl font-bold text-gray-900">Payment Details - {selectedPayment.id}</h2>
                <button 
                  onClick={() => setSelectedPayment(null)}
                  className="text-gray-400 hover:text-gray-600"
                >
                  ×
                </button>
              </div>
            </div>
            <div className="p-6 space-y-6">
              <div className="grid grid-cols-2 gap-6">
                <div>
                  <h3 className="font-medium text-gray-900 mb-3">Payment Information</h3>
                  <div className="space-y-2 text-sm">
                    <div className="flex justify-between">
                      <span className="text-gray-500">Payment ID:</span>
                      <span className="font-medium">{selectedPayment.id}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Order ID:</span>
                      <span className="font-medium text-blue-600">{selectedPayment.orderId}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Transaction ID:</span>
                      <span className="font-medium">{selectedPayment.transactionId}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Customer:</span>
                      <span className="font-medium">{selectedPayment.customer}</span>
                    </div>
                  </div>
                </div>
                <div>
                  <h3 className="font-medium text-gray-900 mb-3">Transaction Details</h3>
                  <div className="space-y-2 text-sm">
                    <div className="flex justify-between">
                      <span className="text-gray-500">Amount:</span>
                      <span className="font-medium">${selectedPayment.amount.toFixed(2)}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Processing Fee:</span>
                      <span className="font-medium">${selectedPayment.fee.toFixed(2)}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Net Amount:</span>
                      <span className="font-medium">${(selectedPayment.amount - selectedPayment.fee).toFixed(2)}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Method:</span>
                      <span className="font-medium capitalize">{selectedPayment.method.replace('-', ' ')}</span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div>
                <h3 className="font-medium text-gray-900 mb-3">Status & Timing</h3>
                <div className="grid grid-cols-2 gap-4">
                  <div className="text-sm">
                    <span className="text-gray-500">Status:</span>
                    <span className={`ml-2 inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full ${getStatusColor(selectedPayment.status)}`}>
                      {getStatusIcon(selectedPayment.status)}
                      <span className="ml-1 capitalize">{selectedPayment.status}</span>
                    </span>
                  </div>
                  <div className="text-sm">
                    <span className="text-gray-500">Date & Time:</span>
                    <span className="ml-2 font-medium">{selectedPayment.date} at {selectedPayment.time}</span>
                  </div>
                </div>
              </div>

              {selectedPayment.status === 'completed' && (
                <div className="flex space-x-3">
                  <button className="flex-1 bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors">
                    Issue Refund
                  </button>
                  <button className="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                    Send Receipt
                  </button>
                </div>
              )}
            </div>
          </div>
        </div>
      )}
    </div>
  );
}